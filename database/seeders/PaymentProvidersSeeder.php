<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\PaymentTypeEnum;
use App\Models\PaymentProviders;

class PaymentProvidersSeeder extends Seeder
{
     protected $banks =  [
        'BBL' => 'Bangkok Bank',
        'KBank' => 'Kasikorn Bank',
        'KTB' => 'Krungthai Bank',
        'TTB' => 'TMBThanachart Bank',
        'SCB' => 'Siam Commercial Bank',
     ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batch = [];
        foreach ($this->banks as $key => $value) {
            // Log::channel('console')->info("$value -- $key");
            array_push($batch, [
                'name' => $value,
                'symbol' => $key,
                'type' => PaymentTypeEnum::Bank->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        PaymentProviders::insert($batch);
    }
}
