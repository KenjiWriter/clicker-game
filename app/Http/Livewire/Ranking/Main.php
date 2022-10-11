<?php

namespace App\Http\Livewire\Ranking;

use App\Models\User;
use Livewire\Component;

class Main extends Component
{
    public $ranking = 'clicks', $users, $score;

    public function Ranking($mode)
    {
        $this->ranking = $mode;
    }

    public function render()
    {
        switch($this->ranking) {
            case ('clicks'):
                $users = User::orderBy('total_clicks', 'desc')->limit(50)->get();
                $this->title = "Clicks";
                $this->score = 'total_clicks';
                $this->users = $users;
                break;
            case ('money'):
                $users = User::orderBy('total_money', 'desc')->limit(50)->get();
                $this->title = "Money";
                $this->score = 'total_money';
                $this->users = $users;
                break;
            case ('cp'):
                $users = User::orderBy('click_power', 'desc')->limit(50)->get();
                $this->title = "Click power";
                $this->score = 'click_power';
                $this->users = $users;
                break;
            case ('dungeon'):
                $users = User::orderBy('dungeon_lvl', 'desc')->limit(50)->get();
                $this->title = "Floor";
                $this->score = 'dungeon_lvl';
                $this->users = $users;
                break;
            case ('level'):
                $users = User::orderBy('level', 'desc')->limit(50)->get();
                $this->title = "Level";
                $this->score = 'level';
                $this->users = $users;
                break;
        }
        return view('livewire.ranking.main');
    }
}
