<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PaymentProviders;

class PaymentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_number' => rand(1000000000, 9999999999),
            'payment_provider_id' => PaymentProviders::all()->random(),
        ];
    }
}
