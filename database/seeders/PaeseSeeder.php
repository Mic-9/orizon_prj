<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Paese;
use Illuminate\Database\Seeder;

class PaeseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paese::create(['nome' => 'Nepal']);
        Paese::create(['nome' => 'India']);
        Paese::create(['nome' => 'Sri Lanka']);
        Paese::create(['nome' => 'Cile']);
        Paese::create(['nome' => 'Argentina']);
        Paese::create(['nome' => 'Brasile']);
        Paese::create(['nome' => 'Costa Rica']);
        Paese::create(['nome' => 'Messico']);
    }
}
