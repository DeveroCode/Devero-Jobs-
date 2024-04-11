<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimeCollection;
use App\Models\Time;

class TimeController extends Controller
{
    public function index()
    {
        return new TimeCollection(Time::all());
    }
}
