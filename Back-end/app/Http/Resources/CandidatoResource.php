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
        $user = User::find($this->user_id);

        return [
            'id' => $this->id,
            'cv' => $cvUrl,
            'job_posting_id' => $this->job_posting_id,
            'user_id' => $user,
        ];
    }
}
