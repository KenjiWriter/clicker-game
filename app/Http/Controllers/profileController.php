<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function num_convertion($num, $precision = 1)
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

    public function index($id)
    {
        if(empty($id)) {
            $id = auth()->user()->id;
            $user = User::find($id);
        } else {
            $user = User::find($id);
        }

        if(!$user) {
            return redirect()->route('profile', auth()->user()->id);
        }

        $money = $this->num_convertion($user->total_money);
        $clicks = $this->num_convertion($user->total_clicks);

        return view('profile.profile', [
            'user' => $user,
            'money' => $money,
            'clicks' => $clicks,
        ]);
    }
}
