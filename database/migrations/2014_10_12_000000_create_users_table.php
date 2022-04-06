<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->enum('level',['admin','user'])->default('user');
            $table->enum('active',['yes','no'])->default('no');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name' => 'رامین روزدار',
            'email' => 'raminroozdar@gmail.com',
            'mobile' => '9337288808',
            'level' => 'admin',
            'active' => 'yes',
            'password' => Hash::make('********'),
        ]);
        DB::table('users')->insert([
            'name' => 'فرزاد روزدار',
            'email' => 'farzadroozdar@gmail.com',
            'mobile' => '9129342383',
            'level' => 'admin',
            'active' => 'yes',
            'password' => Hash::make('********'),
        ]);
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
}
