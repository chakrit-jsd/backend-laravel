<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\RoomPaymentTimeEnum;
use App\Enums\RoomTypeEnum;
use App\Enums\RoomStatusEnum;

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
            $table->enum('payment_time', RoomPaymentTimeEnum::values())->default(RoomPaymentTimeEnum::T15->value);
            $table->enum('type', RoomTypeEnum::values());
            $table->enum('status', RoomStatusEnum::values())->default(RoomStatusEnum::Active->value);
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
