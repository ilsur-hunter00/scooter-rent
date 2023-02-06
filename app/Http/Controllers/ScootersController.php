<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScootersController extends Controller
{
    public function scooters() {
        return view('layouts.index');
    }
}
