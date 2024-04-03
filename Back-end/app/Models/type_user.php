<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relationship with users

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
