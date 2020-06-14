<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Currency::class)->create([
            'currency_code' => 'EUR',
            'currency_name' => 'Euro',
            'is_base' => '1',
            'rate' => '1'
        ]);
        factory(Currency::class)->create([
            'currency_code' => 'USD',
            'currency_name' => 'United States Dollar',
            'is_base' => '0',
            'rate' => '1.08'
        ]);
    }
}
