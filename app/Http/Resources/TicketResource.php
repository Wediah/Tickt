<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "event_id" => $this->event_id,
            "user_id" => $this->user_id,
            "ticket_code" => $this->ticket_code,
            "attendee_name" => $this->attendee_name,
            "attendee_email" => $this->attendee_email,
            "status" => $this->status,
            "price" => $this->price,
            "purchased_at" => $this->purchased_at,
            "used_at" => $this->used_at
        ];
    }
}
