<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicketsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "event_id" => "required|exists:events,id",
            "ticket_code" => "required|string",
            "attendee_name" => "required|string",
            "attendee_email" => "required|string",
            "price" => "required|numeric",
            "status" => "required|in:open,closed",
            "user_id" => "required|exists:users,id",
            "purchase_at" => "required|date",
            "used_at" => "required|date",
        ];
    }
}
