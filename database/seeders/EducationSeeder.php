<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::truncate();
        $educations = [
            ['title' => 'High School or Equivalent'],
            ['title' => 'Associate Degree'],
            ['title' => 'Bachelor Degree'],
            ['title' => 'Master Degree/MBA'],
            ['title' => 'Doctorate Degree/PHD/MD'],
            ['title' => 'Other']
        ];
        foreach ($educations as $key => $value) {
            Education::create($value);
        }
    }
}