<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\OrderTypeEnum;
use App\Enums\OrderStatusEnum;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('coin_id')->unsigned();
            $table->foreign('coin_id')->references('id')->on('coins')->constrained()->onDelete('cascade');
            $table->decimal('coin_amount', 12, 2)->unsigned();
            $table->integer('fiat_id')->unsigned();
            $table->foreign('fiat_id')->references('id')->on('fiats')->constrained()->onDelete('cascade');
            $table->decimal('fiat_amount', 12, 2)->unsigned();
            $table->decimal('fiat_price', 12, 2)->unsigned();
            $table->enum('type', OrderTypeEnum::values());
            $table->enum('status', OrderStatusEnum::values())->default(OrderStatusEnum::Pending->value);
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
