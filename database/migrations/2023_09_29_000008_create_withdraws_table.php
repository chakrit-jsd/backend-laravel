<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('coin_id')->unsigned();
            $table->foreign('coin_id')->references('id')->on('coins')->constrained()->onDelete('cascade');
            $table->decimal('amount', 12, 2)->unsigned();
            $table->string('destination');
            $table->enum('type', ['internal', 'external']);
            $table->enum('status', ['successed', 'pending', 'canceled']);
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
        Schema::dropIfExists('withdraws');
    }
}
