<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'time_id',
        'empresa',
        'description',
        'honorarios',
        'image',
        'user_id',
    ];

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
