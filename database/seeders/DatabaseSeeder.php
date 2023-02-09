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
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            CustomerSeeder::class,

            CountrySeeder::class,
            StateSeeder::class,

            CurrencySeeder::class,
            CurrencyRateSeeder::class,
            HomeHeadingSeeder::class,

            CategorySeeder::class,
            ColorSeeder::class,
            MeasurementUnitSeeder::class,
            ProductSeeder::class,

            MenuSeeder::class,
            SiteInformationSeeder::class,
            ContactAddressSeeder::class,
        ]);
    }
}
