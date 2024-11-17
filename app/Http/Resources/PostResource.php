<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cover_image' => $this->cover_image,
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'description' => $this->description,
            'type' => $this->type->name,
            'status' => $this->status->name,
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
