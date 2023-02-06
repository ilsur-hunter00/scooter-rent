<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScootersTable extends Migration
{
    protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scooters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('place_id')->unsigned();
            $table->bigInteger('kind_id')->unsigned();
            $table->bigInteger('rent_price_id')->unsigned();
            $table->bigInteger('user_name_id')->unsigned();
            $table->bigInteger('manager_id')->unsigned();
            $table->boolean('is_rented');
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
        Schema::dropIfExists('scooters');
    }
}
