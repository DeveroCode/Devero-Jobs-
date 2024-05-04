<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imagePath = '/users/' . $this->image;
        $imageUrl = asset('/storage' . $imagePath);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $imageUrl,
            'type_user' => $this->type_user,
            'apellidos' => $this->apellidos,
        ];
    }
}
