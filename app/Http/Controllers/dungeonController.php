<?php

namespace App\Http\Controllers;

use App\Models\monster;
use Illuminate\Http\Request;

class dungeonController extends Controller
{
    public function index()
    {
        $monster = monster::where('floor', auth()->user()->dungeon_lvl)->get();
        return view('dungeon.index')->with('monster', $monster);
    }

    public function battle()
    {
        return view('dungeon.battle');
    }
}
