<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'position' => $this->position,
            'biography' => $this->biography,
            'photo' => $this->photo,
            'email' => $this->socialLinks->where('name', 'email')->first()->url,
            'facebook' => $this->socialLinks->where('name', 'facebook')->first()->url,
            'instagram' => $this->socialLinks->where('name', 'instagram')->first()->url,
        ];
    }
}
