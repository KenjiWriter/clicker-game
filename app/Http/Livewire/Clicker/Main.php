<?php

namespace App\Http\Livewire\Clicker;

use App\Models\User;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class Main extends Component
{
    public $click_power, $money, $money_per_time, $clicker_timer, $level, $exp, $exp_needed,
            $clicker_skill_multiplier, $pasive_skill_multiplier, $clicker_skill_lvl, $pasive_skill_lvl, $clicker_skill_status = false, $pasive_skill_status = false;

    public function money_convertion($num, $precision = 1)
    {
        if ($num < 1000){
            $num_format = number_format($num, $precision);
            $suffix = '';
        } else if($num > 1000000000000000000) {
            $num_format = number_format($num / 1000000000000000000, $precision);
            $suffix = 'Qi';
        }else if ($num > 1000000000000000) {
            $num_format = number_format($num / 1000000000000000, $precision);
            $suffix = 'Qa';
        } else if ($num > 1000000000000) {
            $num_format = number_format($num / 1000000000000, $precision);
            $suffix = 't';
        } else if ($num > 1000000000) {
            $num_format = number_format($num / 1000000000, $precision);
            $suffix = 'b';
        } else if ($num > 1000000) {
            $num_format = number_format($num / 1000000, $precision);
            $suffix = 'm';
        } else if ($num > 1000) {
            $num_format = number_format($num / 1000, $precision);
            $suffix = 'k';
        }
        return $num_format.$suffix;
    }

    public function clickFunction()
    {
        if($this->clicker_skill_status == true) {
            $this->click_power *= $this->clicker_skill_multiplier;
        }
        $user = User::find(auth()->user()->id);
        $rand = mt_rand(1,100);
        if($rand <= 20) {
            $rand_exp = mt_rand(1,3);
            $user->exp += $rand_exp;
        }
        $user->money += $this->click_power;
        $user->total_clicks += 1;
        $user->total_money += $this->click_power;
        $user->save();
    }
    public function auto_clicker()
    {
        if($this->pasive_skill_status == true) {
            $this->money_per_time *= $this->pasive_skill_multiplier;
        }
        $user = User::find(auth()->user()->id);
        $rand = mt_rand(1,100);
        if($rand <= 5) {
            $rand_exp = mt_rand(1,3);
            $user->exp += $rand_exp;
        }
        $user->money += $this->money_per_time;
        $user->total_money += $this->money_per_time;
        $user->save();
    }

    public function clicker_timer()
    {
        $timer = session()->get('clicker_timer');
        $active_timer = session()->get('clicker_active_timer');
        if($active_timer != 0) {
            $this->clicker_skill_status = true;
            session()->put('clicker_active_timer', $active_timer-1);
        } else {
            $this->clicker_skill_status = false;
            session()->forget('clicker_active_timer');
        }

        if($timer != 0) {
            session()->put('clicker_timer', $timer-1);
        } else {
            session()->forget('clicker_timer');
        }
    }

    public function pasive_timer()
    {
        $timer = session()->get('pasive_timer');
        $active_timer = session()->get('pasive_active_timer');
        if($active_timer != 0) {
            $this->pasive_skill_status = true;
            session()->put('pasive_active_timer', $active_timer-1);
        } else {
            $this->pasive_skill_status = false;
            session()->forget('pasive_active_timer');
        }

        if($timer != 0) {
            session()->put('pasive_timer', $timer-1);
        } else {
            session()->forget('pasive_timer');
        }
    }
    public function skill($skill)
    {
        if($skill == 'clicker') {
            $timer = session()->get('clicker_timer');
            if(!empty($timer)) {

            } else {
                session()->put('clicker_timer', 600);
                session()->put('clicker_active_timer', 30);
                $this->clicker_skill_status = true;
            }
        } elseif ('pasive') {
            $timer = session()->get('pasive_timer');
            if(!empty($timer)) {

            } else {
                session()->put('pasive_timer', 600);
                session()->put('pasive_active_timer', 30);
                $this->pasive_skill_status = true;
            }
        }
    }


    public function render()
    {
        $user = User::find(auth()->user()->id);
        $this->click_power = $user->click_power;
        $this->money = $this->money_convertion($user->money);
        $this->money_per_time = $user->money_per_time;
        $this->clicker_timer = $user->clicker_timer;
        $this->level = $user->level;
        $this->exp = $user->exp;

        if($user->level <= 10) {
            $this->exp_needed = $user->level*10;
        } else {
            $this->exp_needed = $user->level*8.5;
        }
        
        while($user->exp >= $this->exp_needed) {
            $user->exp -= $this->exp_needed;
            $user->level += 1;
            $user->save();
        }

        $this->clicker_skill_lvl = $user->click_skill;
        $this->pasive_skill_lvl = $user->time_skill;

        $this->clicker_skill_multiplier = 1+(0.1*$this->clicker_skill_lvl);
        $this->pasive_skill_multiplier = 1+(0.1*$this->pasive_skill_lvl);
        return view('livewire.clicker.main');
    }
}
