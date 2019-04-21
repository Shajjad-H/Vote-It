<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatagorieController extends Controller
{
    public function index()
    {
        return view('catagorie.index');
    }
}
