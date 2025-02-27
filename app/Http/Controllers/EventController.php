<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    use ApiResponseHelpers;

    public function allEvents(): JsonResponse
    {
        $events = Event::where('created_by', Auth::id())->get();

        return $this->respondWithSuccess(
            ['events' => EventResource::collection($events)]
        );
    }

    public function createEvent(EventRequest $request): JsonResponse
    {
        $event = Event::create(array_merge(
            $request->validated(),
            [
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]
        ));

        return $this->respondWithSuccess(
            ['event' => new EventResource($event)]
        );
    }

    public function updateEvent(EventRequest $request, $id): JsonResponse
    {
        $event = Event::findOrFail($id);
        $event->update($request->validated());

        return $this->respondWithSuccess(
            ['event' => new EventResource($event)]
        );
    }

    public function deleteEvent($id): JsonResponse
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return $this->respondWithSuccess();
    }
}
