<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(EventRequest $request): JsonResponse
    {
        $event = Event::create($request->validated());
        return response()->json(
            ['event' => new EventResource($event)],
            201
        );
    }

    public function updateEvent(EventRequest, $request, $id): JsonResponse
    {
        $event = Event::findOrFail($id);
        $event->update($request->validated());

        return response->json(
            ['event' => new EventResource($event)],
            201
        );
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response->response(
            ["message" => "event deleted"],
            201);
    }
}
