<?php

namespace App\Http\Livewire\Clicker;

use App\Models\User;
use Livewire\Component;

class Main extends Component
{
    public $click_power, $money;
    public function clickFunction()
    {
        $user = User::find(auth()->user()->id);
        $user->money += $this->click_power;
        $user->save();
    }
    public function render()
    {
        $user = User::find(auth()->user()->id);
        $this->click_power = $user->click_power;
        $this->money = $user->money;
        return view('livewire.clicker.main');
    }
}
