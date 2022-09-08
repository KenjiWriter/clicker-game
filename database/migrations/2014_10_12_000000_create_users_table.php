<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->float('money', 8, 2)->nullable()->default(0);
            $table->float('total_money', 8, 2)->nullable()->default(0);
            $table->int('total_clicks')->nullable()->default(0);
            $table->integer('click_power')->default(1);
            $table->integer('money_timer')->default(5);
            $table->float('money_per_time', 8, 2)->default(0);
            $table->integer('b_cursor')->default(0);
            $table->integer('s_cursor')->default(0);
            $table->integer('g_cursor')->default(0);
            $table->integer('b_autoClicker')->default(0);
            $table->integer('s_autoClicker')->default(0);
            $table->integer('g_autoClicker')->default(0);
            $table->integer('click_skill')->default(0);
            $table->integer('time_skill')->default(0);
            $table->integer('click_achievement')->default(0);
            $table->integer('money_achievement')->default(0);
            $table->integer('cp_achievement')->default(0);
            $table->integer('cps_achievement')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
