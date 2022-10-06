<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class achievementsController extends Controller
{
    public function click_achievement($achievement_stage)
    {
        switch($achievement_stage) {
            case(0):
                $click_achievement_needed = 1000;
                $click_achievement_reward = 5000;
                break;
            case(1):
                $click_achievement_needed = 10000;
                $click_achievement_reward = 20000;
                break;
            case(2):
                $click_achievement_needed = 100000;
                $click_achievement_reward = 50000;
                break;
            case(3):
                $click_achievement_needed = 100000;
                $click_achievement_reward = 1000000;
                break;
        }
        $data = ['click_achievement_needed' => $click_achievement_needed, 'click_achievement_reward' => $click_achievement_reward];
        return $data;
    }

    public function money_achievement($achievement_stage)
    {
        switch($achievement_stage) {
            case(0):
                $money_achievement_needed = 10000;
                $money_achievement_reward = 50;
                break;
            case(1):
                $money_achievement_needed = 10000;
                $money_achievement_reward = 50;
                break;
            case(2):
                $money_achievement_needed = 50000;
                $money_achievement_reward = 100;
                break;
            case(3):
                $money_achievement_needed = 100000;
                $money_achievement_reward = 100;
                break;
        }
        $data = ['money_achievement_needed' => $money_achievement_needed, 'money_achievement_reward' => $money_achievement_reward];
        return $data;
    }

    public function cp_achievement($achievement_stage)
    {
        switch($achievement_stage) {
            case(0):
                $cp_achievement_needed = 50;
                $cp_achievement_reward = 10;
                break;
            case(1):
                $cp_achievement_needed = 150;
                $cp_achievement_reward = 30;
                break;
            case(2):
                $cp_achievement_needed = 300;
                $cp_achievement_reward = 30;
                break;
            case(3):
                $cp_achievement_needed = 600;
                $cp_achievement_reward = 50;
                break;
        }
        $data = ['cp_achievement_needed' => $cp_achievement_needed, 'cp_achievement_reward' => $cp_achievement_reward];
        return $data;
    }

    public function cps_achievement($achievement_stage)
    {
        switch($achievement_stage) {
            case(0):
                $cps_achievement_needed = 50;
                $cps_achievement_reward = 5000;
                break;
            case(1):
                $cps_achievement_needed = 150;
                $cps_achievement_reward = 15000;
                break;
            case(2):
                $cps_achievement_needed = 300;
                $cps_achievement_reward = 50000;
                break;
            case(3):
                $cps_achievement_needed = 600;
                $cps_achievement_reward = 100000;
                break;
        }
        $data = ['cps_achievement_needed' => $cps_achievement_needed, 'cps_achievement_reward' => $cps_achievement_reward];
        return $data;
    }

    public function dungeon_achievement($achievement_stage)
    {
        switch($achievement_stage) {
            case(0):
                $dungeon_achievement_needed = 10;
                $dungeon_achievement_reward = 10;
                break;
            case(1):
                $dungeon_achievement_needed = 20;
                $dungeon_achievement_reward = 50;
                break;
            case(2):
                $dungeon_achievement_needed = 30;
                $dungeon_achievement_reward = 50;
                break;
            case(3):
                $dungeon_achievement_needed = 40;
                $dungeon_achievement_reward = 100;
                break;
        }
        $data = ['dungeon_achievement_needed' => $dungeon_achievement_needed, 'dungeon_achievement_reward' => $dungeon_achievement_reward];
        return $data;
    }

    public function index()
    {
        $user = User::find(auth()->user()->id);
        $click_achievement = $user->click_achievement; 
        $click_achievement_values = $this->click_achievement($click_achievement);
        $click_achievement_needed = $click_achievement_values['click_achievement_needed'];
        $click_achievement_reward = $click_achievement_values['click_achievement_reward'];

        $money_achievement = $user->money_achievement; 
        $money_achievement_values = $this->money_achievement($money_achievement);
        $money_achievement_needed = $money_achievement_values['money_achievement_needed'];
        $money_achievement_reward = $money_achievement_values['money_achievement_reward'];

        $cp_achievement = $user->cp_achievement;
        $cp_achievement_values = $this->cp_achievement($cp_achievement);
        $cp_achievement_needed = $cp_achievement_values['cp_achievement_needed'];
        $cp_achievement_reward = $cp_achievement_values['cp_achievement_reward'];

        $cps_achievement = $user->cps_achievement;
        $cps_achievement_values = $this->cps_achievement($cps_achievement);
        $cps_achievement_needed = $cps_achievement_values['cps_achievement_needed'];
        $cps_achievement_reward = $cps_achievement_values['cps_achievement_reward'];

        $dungeon_achievement = $user->dungeon_achievement;
        $dungeon_achievement_values = $this->dungeon_achievement($dungeon_achievement);
        $dungeon_achievement_needed = $dungeon_achievement_values['dungeon_achievement_needed'];
        $dungeon_achievement_reward = $dungeon_achievement_values['dungeon_achievement_reward'];

        return view('achievements.index', [
            'click_achievement' => $click_achievement,
            'click_achievement_needed' => $click_achievement_needed,
            'total_clicks' => $user->total_clicks,
            'click_achievement_reward' => $click_achievement_reward,

            'money_achievement' => $money_achievement,
            'money_achievement_needed' => $money_achievement_needed,
            'total_money' => $user->total_money,
            'money_achievement_reward' => $money_achievement_reward,

            'cp_achievement' => $cp_achievement,
            'cp_achievement_needed' => $cp_achievement_needed,
            'cp' => $user->click_power,
            'cp_achievement_reward' => $cp_achievement_reward,

            'cps_achievement' => $cps_achievement,
            'cps_achievement_needed' => $cps_achievement_needed,
            'cps' => $user->money_per_time,
            'cps_achievement_reward' => $cps_achievement_reward,

            'dungeon_achievement' => $dungeon_achievement,
            'dungeon_achievement_needed' => $dungeon_achievement_needed,
            'dungeon' => $user->dungeon_lvl-1,
            'dungeon_achievement_reward' => $dungeon_achievement_reward,
        ]);
    }

    public function reward($reward)
    {
        $user = User::find(auth()->user()->id);
        if($reward === 'clicks') {
            $click_achievement = $user->click_achievement; 
            if($click_achievement != 4) {
                $click_achievement_values = $this->click_achievement($click_achievement);
                $click_achievement_needed = $click_achievement_values['click_achievement_needed'];
                $click_achievement_reward = $click_achievement_values['click_achievement_reward'];
                if($user->total_clicks >= $click_achievement_needed) {
                    $user->click_achievement += 1;
                    $user->money += $click_achievement_reward;
                    $user->total_money += $click_achievement_reward;
                    $user->save();
                    return back();
                } else {
                    return back()->with('message', "You don't have enought clicks yet!");
                }
            } else {
                return back()->with('message', "You already completed all clicks achivments!");
            }
        } elseif ($reward === 'money') {
            $money_achievement = $user->money_achievement; 
            if($money_achievement != 4) {
                $money_achievement_values = $this->money_achievement($money_achievement);
                $money_achievement_needed = $money_achievement_values['money_achievement_needed'];
                $money_achievement_reward = $money_achievement_values['money_achievement_reward'];
                if($user->total_money >= $money_achievement_needed) {
                    $user->money_achievement += 1;
                    $user->click_power += $money_achievement_reward;
                    $user->save();
                    return back();
                } else {
                    return back()->with('message', "You didn't colect enought money yet!");
                }
            } else {
                return back()->with('message', "You already completed all money achivments!");
            }
        } elseif ($reward === 'cp') {
            $cp_achievement = $user->cp_achievement; 
            if($cp_achievement != 4) {
                $cp_achievement_values = $this->cp_achievement($cp_achievement);
                $cp_achievement_needed = $cp_achievement_values['cp_achievement_needed'];
                $cp_achievement_reward = $cp_achievement_values['cp_achievement_reward'];
                if($user->click_power >= $cp_achievement_needed) {
                    $user->cp_achievement += 1;
                    $user->money_per_time += $cp_achievement_reward;
                    $user->save();
                    return back();
                } else {
                    return back()->with('message', "You don't have enough click power yet!");
                }
            } else {
                return back()->with('message', "You already completed all CP achivments!");
            }
        } elseif ($reward === 'cps') {
            $cps_achievement = $user->cps_achievement; 
            if($cps_achievement != 4) {
                $cps_achievement_values = $this->cps_achievement($cps_achievement);
                $cps_achievement_needed = $cps_achievement_values['cps_achievement_needed'];
                $cps_achievement_reward = $cps_achievement_values['cps_achievement_reward'];
                if($user->money_per_time >= $cps_achievement_needed) {
                    $user->cps_achievement += 1;
                    $user->money += $cps_achievement_reward;
                    $user->save();
                    return back();
                } else {
                    return back()->with('message', "You don't have enough CPS yet!");
                }
            } else {
                return back()->with('message', "You already completed all CPS achivments!");
            }
        } elseif ($reward === 'dungeon') {
            $dungeon_achievement = $user->cps_achievement; 
            if($dungeon_achievement != 4) {
                $dungeon_achievement_values = $this->dungeon_achievement($dungeon_achievement);
                $dungeon_achievement_needed = $dungeon_achievement_values['dungeon_achievement_needed'];
                $dungeon_achievement_reward = $dungeon_achievement_values['dungeon_achievement_reward'];
                if($user->money_per_time >= $dungeon_achievement_needed) {
                    $user->dungeon_achievement += 1;
                    $user->click_power += $dungeon_achievement_reward;
                    $user->save();
                    return back();
                } else {
                    return back()->with('message', "You didn't pass this floor yet!");
                }
            } else {
                return back()->with('message', "You already completed all dungeon achivments!");
            }
        }
    }
}
