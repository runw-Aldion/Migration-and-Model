<?php

namespace App\Http\Controllers;

class GreetController extends Controller
{
    public function index()
    {
        return view('greet');
    }
}