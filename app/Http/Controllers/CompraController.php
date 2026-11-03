<?php

namespace App\Http\Controllers;

use App\Models\Sorvete;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $sorvetes = Sorvete::orderBy('sabor')->get();

        return view('compras.create', compact('sorvetes'));
    }

    public function store(Request $request)
    {
        //
    }
}
