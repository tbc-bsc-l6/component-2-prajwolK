<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Table::create(['name' => 'Table 1', 'capacity' => 4, 'status' => true]);
        Table::create(['name' => 'Table 2', 'capacity' => 2, 'status' => true]);
        Table::create(['name' => 'Table 3', 'capacity' => 6, 'status' => true]);
    }
}
