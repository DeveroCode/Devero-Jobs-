<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterProjectRequest;
use App\Http\Resources\ProjectsCollection;
use App\Models\JobPosting;

class JobPostingController extends Controller
{
    public function store(RegisterProjectRequest $request)
    {
        $data = $request->validated();

        // info($request->all());

        if ($request->hasFile('image')) {
            $imagen = $request->file('image')->store('public/projects');
            $name_image = str_replace('public/projects/', '', $imagen);
        }

        $project = JobPosting::create([
            'name' => $data['name'],
            'time_id' => $data['time_id'],
            'empresa' => $data['empresa'],
            'description' => $data['description'],
            'honorarios' => $data['honorarios'],
            'image' => $name_image,
            'user_id' => auth()->user()->id,
        ]);

        return [
            'project' => $project,
        ];
    }

    public function show()
    {
        return new ProjectsCollection(JobPosting::all());
    }
}