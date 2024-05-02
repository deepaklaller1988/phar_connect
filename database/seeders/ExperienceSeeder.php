<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::truncate();
        $experiences = [
            ['title' => 'No Experience'],
            ['title' => 'Entry Level'],
            ['title' => 'Mid Level'],
            ['title' => 'Senior Level']
        ];
        foreach ($experiences as $key => $value) {
            Experience::create($value);
        }
    }
}
