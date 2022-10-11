<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rankingController extends Controller
{
    public function index()
    {
        return view('ranking.index');
    }
}
