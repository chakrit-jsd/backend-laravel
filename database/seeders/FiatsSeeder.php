<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fiats;
class FiatsSeeder extends Seeder
{
    /**
     * Data
     * @param array
     */
    protected $fiats = [
        'THB' => 'Thai Baht',
        'USD' => 'US Dollars',
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batch = [];
        foreach ($this->fiats as $key => $value) {
            // Log::channel('console')->info("$value -- $key");
            array_push($batch, [
                'name' => $value,
                'symbol' => $key,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        Fiats::insert($batch);
    }
}
