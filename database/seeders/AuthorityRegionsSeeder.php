<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Authorityregion;
class AuthorityRegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        Authorityregion::truncate();
        $regions = [
            ['name' => 'Asia and the Pecific'],
            ['name' => 'Middle East'],
            ['name' => 'Africa'],
            ['name' => 'North America'],
            ['name' => 'Europe'],
        ];
        foreach ($regions as $key => $value) {
            Authorityregion::create($value);
        }
    }
}
