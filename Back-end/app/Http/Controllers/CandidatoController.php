<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatoRequest;
use App\Models\Candidato;
use App\Models\JobPosting;
use App\Models\User;
use App\Notifications\NuevoVacante;
use Illuminate\Support\Facades\Notification;

class CandidatoController extends Controller
{

    // public $vacante;

    // public function mount(JobPosting $vacante)
    // {
    //     $this->vacante = $vacante;
    // }

    public function postularme(CandidatoRequest $request)
    {
        // validar
        $data = $request->validated();

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv')->store('public/cv');
            $name_cv = str_replace('public/cv/', '', $cv);
            $data['cv'] = $name_cv;
        }

        // Show the user a success message

        // Save CV in DB
        $candidato = Candidato::create([
            'cv' => $data['cv'],
            'job_postings_id' => $data['job_posting_id'],
            'users_id' => $data['user_id'],
        ]);

        // Send email and Notification
        $usersToNotify = User::whereHas('type_user', function ($query) {
            $query->where('name', 'ideamaker');
        })->get();

        $title = JobPosting::find($data['job_posting_id'])->name;

        Notification::send($usersToNotify, new NuevoVacante(
            $candidato->job_postings_id,
            $candidato->users_id,
            $title
        ));

        return [
            'candidato' => $candidato,
        ];
    }
}
