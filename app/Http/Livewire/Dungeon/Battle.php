<?php

namespace App\Http\Livewire\Dungeon;

use session;
use App\Models\User;
use App\Models\monster;
use Livewire\Component;

class Battle extends Component
{
    public $monster;

    public function clickFunction()
    {
        $monster_hp = session()->get('monster_hp');
        $monster_hp -= auth()->user()->click_power;
        session()->put('monster_hp', $monster_hp);
        if($monster_hp <= 0) {
            session()->flash('message', "sucess");
            $user = User::find(auth()->user()->id);
            $user->money += $this->monster->reward;
            $user->dungeon_lvl += 1;
            $user->save();
            session()->forget('time');
            session()->forget('monster_hp');
            return redirect()->route('dungeon');

        }
    }

    public function time()
    {
        $is_time = session()->get('time');
        if(!isset($is_time)) {
            $time = 30;
            session()->put('time', 30);
        } else {
            $time = session()->get('time');
        }
        if($time > 0) {
            $time = $time - 1;
            session()->put('time', $time);
        } else {
            session()->forget('time');
            session()->forget('monster_hp');
            session()->flash('message', "fail");
            return redirect()->route('dungeon');
        }
    }
    public function render()
    {
        $monster = monster::where('floor', auth()->user()->dungeon_lvl)->get();
        $monster_hp = session()->get('monster_hp');
        if(!isset($monster_hp)) {
            $monster_hp = $monster[0]->hp;
            session()->put('monster_hp', $monster[0]->hp);
        } else {
            $monster_hp = session()->get('monster_hp');
        }

        $this->monster = $monster[0];
        return view('livewire.dungeon.battle');
    }
}
