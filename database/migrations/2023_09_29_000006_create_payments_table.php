<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PaymentStatusEnum;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // ['BBL', 'KBank', 'KTB', 'TTB', 'SCB']
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('account_number');
            $table->string('account_name');
            $table->integer('payment_provider_id')->unsigned();
            $table->foreign('payment_provider_id')->references('id')->on('payment_providers')->constrained()->onDelete('cascade');
            $table->enum('status', PaymentStatusEnum::values())->default(PaymentStatusEnum::Active->value);
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
        Schema::dropIfExists('payments');
    }
}
