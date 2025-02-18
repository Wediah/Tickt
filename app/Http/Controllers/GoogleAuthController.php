<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle(): RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            // Log the error for debugging purposes
            \Log::error('Google authentication failed: ' . $e->getMessage());
            return redirect('/')->with('error', 'Google authentication failed. Please try again.');
        }

        // Check if the user already exists
        $existingUser = User::where('email', $googleUser->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser, true);
        } else {
            // Create a new user
            $newUser = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name,
                'password' => bcrypt(Str::random(12)),
                'email_verified_at' => now(),
            ]);

            // Log in the new user
            Auth::login($newUser, true);
        }

        // Redirect to the intended page or dashboard
        return redirect()->intended('/dashboard');
    }
}
