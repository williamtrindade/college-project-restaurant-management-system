<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestHasDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_has_dish', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Request
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')
                ->references('id')
                ->on('requests')
                ->onDelete('cascade');

            // Dish
            $table->unsignedBigInteger('dish_id');
            $table->foreign('dish_id')
                ->references('id')
                ->on('dishes')
                ->onDelete('cascade');

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
        Schema::dropIfExists('request_has_dish');
    }
}
