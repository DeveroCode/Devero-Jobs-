<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Candidato extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'users_id',
        'job_postings_id',
        'cv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class, 'job_postings_id');
    }

}
