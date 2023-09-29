<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('coin_id')->unsigned();
            $table->foreign('coin_id')->references('id')->on('coins')->constrained()->onDelete('cascade');
            $table->integer('fiat_id')->unsigned();
            $table->foreign('fiat_id')->references('id')->on('fiats')->constrained()->onDelete('cascade');
            $table->decimal('price', 12, 2)->unsigned();
            $table->decimal('amount', 12, 2)->unsigned();
            $table->enum('payment_time', [15, 30, 45, 60]);
            $table->enum('type', ['buy', 'sell']);
            $table->enum('status', ['active', 'inactive', 'canceled']);
            $table->integer('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->constrained()->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
