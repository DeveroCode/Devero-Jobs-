<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterProjectRequest;
use App\Http\Resources\ProjectsCollection;
use App\Models\JobPosting;

class JobPostingController extends Controller
{
    public function register(RegisterProjectRequest $request)
    {
        $data = $request->validated();

        // FacadesLog::info('Datos recibidos en el controlador:', $data);

        $project = JobPosting::create([
            'name' => $data['name'],
            'time_id' => $data['time_id'],
            'description' => $data['description'],
            'honorarios' => $data['honorarios'],
            // 'image' => $data['image'],
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
