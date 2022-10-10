<?php

namespace Database\Seeders;

use DB;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,500) as $index) {
            $user = new User;
            $user->name = $faker->username;
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->money = rand(100,9999999999);
            $user->level = rand(1,2452);
            $user->click_power = rand(1,10000);
            $user->dungeon_lvl = rand(1,400);
            $user->total_clicks = rand(1,999999);
            $user->total_money = rand(1,99999999);
            $user->click_achievement = rand(1,3);
            $user->money_achievement = rand(1,3);
            $user->cp_achievement = rand(1,3);
            $user->cps_achievement = rand(1,3);
            $user->dungeon_achievement = rand(1,3);
            $user->level_achievement = rand(1,3);
            $user->save();
        }
    }
}
