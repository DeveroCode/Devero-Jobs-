<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imagePath = '/projects/' . $this->image;
        $imageUrl = asset('/storage' . $imagePath);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'empresa' => $this->empresa,
            'description' => $this->description,
            'image' => $imageUrl,
        ];
    }
}