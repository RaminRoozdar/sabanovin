<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('link')->nullable();
            $table->longText('text')->nullable();
            $table->enum('access',['public','private'])->default('public');
            $table->timestamps();
        });
        DB::table('pages')->insert([
            'title' => 'صبا نوین جام جم',
            'text' => 'Index',
            'access' => 'public',
        ]);
        DB::table('pages')->insert([
            'title' => 'درباره ما',
            'text' => 'About US',
            'access' => 'public',
        ]);
        DB::table('pages')->insert([
            'title' => 'تماس با ما',
            'text' => 'Contact US',
            'access' => 'public',
        ]);

        DB::table('pages')->insert([
            'title' => 'قوانین و مقررات',
            'text' => 'Law TOS',
            'access' => 'public',
        ]);
        DB::table('pages')->insert([
            'title' => 'ثبت شکایت',
            'text' => 'Complaint',
            'access' => 'public',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
