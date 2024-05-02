<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::truncate();
        $positions = [
            ['title' => 'Full Time'],
            ['title' => 'Part Time'],
            ['title' => 'Contract'],
            ['title' => 'Internship'],
        ];
        foreach ($positions as $key => $value) {
            Position::create($value);
        }
    }
}
