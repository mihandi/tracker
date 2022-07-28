<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habit_id');
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();


            $table->foreign('habit_id')->references('id')->on('habits');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('date')->references('dt')->on('calendar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
