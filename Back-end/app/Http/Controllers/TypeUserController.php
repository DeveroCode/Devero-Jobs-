<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeUserCollection;
use App\Models\type_user;

class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return new TypeUserCollection(type_user::all());
    }
}
