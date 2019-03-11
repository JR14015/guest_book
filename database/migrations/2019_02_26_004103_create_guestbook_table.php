<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_books', function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->nullable($value = false);
            $table->string('email')->nullable($value = false);
            $table->string('web')->nullable($value = true);
            $table->string('comment')->nullable($value = false);
            $table->string('ip');
            $table->string('browser');
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
        //
    }
}
