<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CallResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'requirements' => $this->requirements,
            'status' => $this->status->name,
            'application_url' => $this->application_url,
            'contact_person' => $this->contact_person,
            'id' => $this->id,
        ];
    }
}
