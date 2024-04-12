<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $rules = [
        'title' => 'required',
        'time_id' => 'required',
        'description' => 'required',
        'honorarios' => 'integer',
        'imagen' => 'nullable',
        'user_id' => 'required',
    ];

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}