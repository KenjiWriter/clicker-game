<?php

namespace App\Http\Livewire\Clicker;

use App\Models\User;
use Livewire\Component;

class Main extends Component
{
    public $click_power, $money, $money_per_time, $clicker_timer;
    public function clickFunction()
    {
        $user = User::find(auth()->user()->id);
        $user->money += $this->click_power;
        $user->save();
    }
    public function auto_clicker()
    {
        $user = User::find(auth()->user()->id);
        $user->money += $this->money_per_time;
        $user->save();
    }
    public function render()
    {
        $user = User::find(auth()->user()->id);
        $this->click_power = $user->click_power;
        $this->money = $user->money;
        $this->money_per_time = $user->money_per_time;
        $this->clicker_timer = $user->clicker_timer;
        return view('livewire.clicker.main');
    }
}
