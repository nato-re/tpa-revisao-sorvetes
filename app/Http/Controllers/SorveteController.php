<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SorveteController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('sorvetes.create');
    }

    public function store(Request $request)
    {
        //
    }
}
