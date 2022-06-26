<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->text('location');
            $table->string('coordinates')->nullable();
            $table->string('radius')->nullable();
            $table->string('scenario');
            $table->text('message');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('strat_time');
            $table->string('end_time');
            $table->string('days');
            $table->integer('count');
            $table->enum('status',['ok','nok','done']);
            $table->integer('message_count');
            $table->decimal('amount', 15, 0);
            $table->string('language');
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
        Schema::dropIfExists('lbs');
    }
}
