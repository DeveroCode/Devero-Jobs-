<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidatoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Get CV from storage
        $cvPath = '/cv/' . $this->cv;
        $cvUrl = asset('/storage' . $cvPath);

        // Return user to postulate the job
        $user = User::find($this->users_id);

        return [
            'job_postings_id' => $this->job_postings_id,
            'users_id' => $user->name . ' ' . $user->apellidos,
            'cv' => $cvUrl,
        ];
    }
}
