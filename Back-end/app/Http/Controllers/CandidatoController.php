<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatoRequest;
use App\Models\Candidato;

class CandidatoController extends Controller
{
    public function postularme(CandidatoRequest $request)
    {
        // validar
        $data = $request->validated();

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv')->store('public/cv');
            $name_cv = str_replace('public/cv/', '', $cv);
            $data['cv'] = $name_cv;
        }

        // Save CV in DB
        $candidato = Candidato::create([
            'cv' => $data['cv'],
            'job_postings_id' => $data['job_posting_id'],
            'users_id' => $data['user_id'],
        ]);

        return [
            'candidato' => $candidato,
        ];
        //  Create postulation

        // Send email

        // Show the user a success message
    }
}
