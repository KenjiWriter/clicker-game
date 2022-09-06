<?php

namespace App\Http\Livewire\Clicker;

use App\Models\User;
use Livewire\Component;

class Shop extends Component
{
    public $click_power, $money;
    public $b_cursor, $b_price, $s_cursor, $s_price, $g_cursor, $g_price, $message;

    public function cursor($grade)
    {
        $user = User::find(auth()->user()->id);
        switch($grade){
            case 'b':
                if($user->money >= $this->b_price) {
                    $user->click_power += 1;
                    $user->money -= $this->b_price;
                    $user->b_cursor += 1;
                    $user->save();
                } else {
                    return $this->message = "You don't have enought money to afford this!";
                }
                break;
            case 's':
                if($user->money >= $this->s_price) {
                    $user->click_power += 20;
                    $user->money -= $this->s_price;
                    $user->s_cursor += 1;
                    $user->save();
                } else {
                    return $this->message = "You don't have enought money to afford this!";
                }
                break;
                break;
            case 'g':
                if($user->money >= $this->g_price) {
                    $user->click_power += 50;
                    $user->money -= $this->g_price;
                    $user->g_cursor += 1;
                    $user->save();
                } else {
                    return $this->message = "You don't have enought money to afford this!";
                }
                break;
        }
    }

    public function render()
    {
        $user = User::find(auth()->user()->id);
        $this->click_power = $user->click_power;
        $this->money = $user->money;
        $this->b_cursor = $user->b_cursor;
        $this->s_cursor = $user->s_cursor;
        $this->g_cursor = $user->g_cursor;

        if($user->b_cursor == 0) {
            $this->b_price = 20;
        } else {
            $this->b_price = (20*$user->b_cursor);
        }

        if($user->s_cursor == 0) {
            $this->s_price = 500;
        } else {
            $this->s_price = (500*$user->s_cursor)*1.2;
        }

        if($user->g_cursor == 0) {
            $this->g_price = 1000;
        } else {
            $this->g_price = (1000*$user->g_cursor)*1.5 ;
        }
        return view('livewire.clicker.shop');
    }
}
