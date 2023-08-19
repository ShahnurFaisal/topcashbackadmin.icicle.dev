<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert(
            [
                [
                    'name' => 'Nepali Ruppes',
                    'symbol' => 'Rs.',
                    'code' => 'NEP',
                    'exchange_rate' => 115,

                    ],
                    [
                    'name' => 'USD Dollar',
                    'symbol' => '$.',
                    'code' => 'USD',
                    'exchange_rate' => 1,

                    ],

            ]
    );
    }
}
