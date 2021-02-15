<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillasController extends Controller
{
    public function newVilla()
    {
        return view("new-villa");
    }
}
