<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'United States',
                'code' => 'US',
            ],
            [
                'name' => 'Canada',
                'code' => 'CA',
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'GB',
            ],
            [
                'name' => 'Australia',
                'code' => 'AU',
            ],
            [
                'name' => 'Germany',
                'code' => 'DE',
            ],
            [
                'name' => 'France',
                'code' => 'FR',
            ],
            [
                'name' => 'Japan',
                'code' => 'JP',
            ],
            [
                'name' => 'China',
                'code' => 'CN',
            ],
            [
                'name' => 'India',
                'code' => 'IN',
            ],
            [
                'name' => 'Brazil',
                'code' => 'BR',
            ],
            [
                'name' => 'Mexico',
                'code' => 'MX',
            ],
            [
                'name' => 'Saudi Arabia',
                'code' => 'SA',
            ],
            [
                'name' => 'United Arab Emirates',
                'code' => 'AE',
            ],
            [
                'name' => 'Jordan',
                'code' => 'JO',
            ],
        ];

        foreach ($countries as $country) {
            Country::query()->create([
                'name' => $country['name'],
                'iso' => $country['code'],
            ]);
        }
    }
}
