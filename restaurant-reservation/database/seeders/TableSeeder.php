<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Table::create(['name' => 'Table 1', 'capacity' => 4]);
        \App\Models\Table::create(['name' => 'Table 2', 'capacity' => 2]);
        \App\Models\Table::create(['name' => 'Table 3', 'capacity' => 6]);
    }
}
