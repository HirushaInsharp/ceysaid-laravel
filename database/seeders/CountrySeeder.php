<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'Sri Lanka',
            'user_id' => Admin::find(1)->id
        ]);

        Country::create([
            'name' => 'Thailand',
            'user_id' => Admin::find(1)->id
        ]);

        Country::create([
            'name' => 'Singapore',
            'user_id' => Admin::find(1)->id
        ]);

        Country::create([
            'name' => 'Vietnam',
            'user_id' => Admin::find(1)->id
        ]);

        Country::create([
            'name' => 'Indonesia',
            'user_id' => Admin::find(1)->id
        ]);

        Country::create([
            'name' => 'India',
            'user_id' => Admin::find(1)->id
        ]);

        Country::create([
            'name' => 'Malaysia',
            'user_id' => Admin::find(1)->id
        ]);

        Country::create([
            'name' => 'UAE',
            'user_id' => Admin::find(1)->id
        ]);
    }
}
