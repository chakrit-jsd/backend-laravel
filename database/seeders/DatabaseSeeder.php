<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Table Coins Seeder');
        $this->call(CoinsSeeder::class);
        $this->command->info('Table Fiats Seeder');
        $this->call(FiatsSeeder::class);
        $this->command->info('Table PaymentProviders Seeder');
        $this->call(PaymentProvidersSeeder::class);
        $this->command->info('Table User and relationship Seeder');
        $this->call(UsersSeeder::class);
    }
}
