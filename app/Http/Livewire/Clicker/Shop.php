<?php

namespace App\Http\Livewire\Clicker;

use App\Models\User;
use Livewire\Component;

class Shop extends Component
{
    public $click_power, $money;
    public $b_cursor, $b_cprice, $s_ccursor, $s_cprice, $g_ccursor, $g_cprice, $message,
            $b_autoClicker, $s_autoClicker, $g_autoClicker, $b_aprice, $s_aprice, $g_aprice, $autoclicker_message,
            $ac_timer_lvl, $ac_timer_price, $upgrade_message;

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

    public function autoClicker($grade)
    {
        $user = User::find(auth()->user()->id);
        switch($grade){
            case 'b':
                if($user->money >= $this->b_aprice) {
                    $user->money_per_time += 0.5;
                    $user->money -= $this->b_aprice;
                    $user->b_autoClicker += 1;
                    $user->save();
                } else {
                    return $this->message = "You don't have enought money to afford this!";
                }
                break;
            case 's':
                if($user->money >= $this->s_aprice) {
                    $user->money_per_time += 2;
                    $user->money -= $this->s_aprice;
                    $user->s_autoClicker += 1;
                    $user->save();
                } else {
                    return $this->message = "You don't have enought money to afford this!";
                }
                break;
                break;
            case 'g':
                if($user->money >= $this->g_aprice) {
                    $user->money_per_time += 5;
                    $user->money -= $this->g_aprice;
                    $user->g_autoClicker += 1;
                    $user->save();
                } else {
                    return $this->message = "You don't have enought money to afford this!";
                }
                break;
        }
    }

    public function ac_timer()
    {
        $user = User::find(auth()->user()->id);
        $money = $user->money;
        if($this->ac_timer_lvl != 'MAX') {
            if($money >= $this->ac_timer_price) {
                $user->clicker_timer -= 2;
                $user->money -= $this->ac_timer_price;
                $user->save();
            } else {
                $this->upgrade_message = "You don't have enought money to afford this!";
            }
        } else {
            $this->upgrade_message = "You already reached max level of this upgrade!";
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

        $this->b_autoClicker = $user->b_autoClicker;
        $this->s_autoClicker = $user->s_autoClicker;
        $this->g_autoClicker = $user->g_autoClicker;

        $ac_timer = $user->clicker_timer;

        if($user->b_cursor == 0) {
            $this->b_cprice = 20;
        } else {
            $this->b_cprice = (20*$user->b_cursor);
        }

        if($user->s_cursor == 0) {
            $this->s_cprice = 500;
        } else {
            $this->s_cprice = (500*$user->s_cursor)*1.2;
        }

        if($user->g_cursor == 0) {
            $this->g_cprice = 1000;
        } else {
            $this->g_cprice = (1000*$user->g_cursor)*1.5 ;
        }

        if($user->b_autoClicker == 0) {
            $this->b_aprice = 50;
        } else {
            $this->b_aprice = (50*$user->b_autoClicker)*2;
        }

        if($user->s_autoClicker == 0) {
            $this->s_aprice = 1000;
        } else {
            $this->s_aprice = (1000*$user->s_autoClicker)*2;
        }

        if($user->g_autoClicker == 0) {
            $this->g_aprice = 3000;
        } else {
            $this->g_aprice = (3000*$user->g_autoClicker)*2 ;
        }

        switch($ac_timer) {
            case 5:
                $this->ac_timer_lvl = '1';
                $this->ac_timer_price = 10000;
                break;
            case 3:
                $this->ac_timer_lvl = '2';
                $this->ac_timer_price = 15000;
                break;
            case 1:
                $this->ac_timer_lvl = 'MAX';
                $this->ac_timer_price = 'MAX';
                break;
            default:
                break;
                
        }
        return view('livewire.clicker.shop');
    }
}
