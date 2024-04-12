<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterProject;
use App\Models\JobPosting;

class JobPostingController extends Controller
{
    public function register(RegisterProject $request)
    {
        $data = $request->validated();

        $project = JobPosting::create([
            'title' => $data['name'],
            'time_id' => $data['time_id'],
            'description' => $data['description'],
            'honorarios' => $data['honorarios'],
            'user_id' => auth()->user()->id,
        ]);

        return [
            'project' => $project,
        ];
    }
}