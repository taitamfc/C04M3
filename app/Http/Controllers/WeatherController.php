<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function show_form(){

        return view('weathers.show_form');
    }
}
