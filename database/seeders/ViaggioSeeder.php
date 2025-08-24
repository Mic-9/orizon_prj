<?php

namespace Database\Seeders;

use App\Models\Paese;
use App\Models\Viaggio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViaggioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paesi = Paese::all();

        $viaggo1 = Viaggio::create(['posti_disponibili' => 10]);
        $viaggo1->paesi()->attach($paesi->where('nome', 'Messico')->first()->id);

        $viaggo2 = Viaggio::create(['posti_disponibili' => 15]);
        $viaggo2->paesi()->attach([
            $paesi->where('nome', 'Sri Lanka')->first()->id,
            $paesi->where('nome', 'India')->first()->id,
            $paesi->where('nome', 'Nepal')->first()->id,
        ]);

        $viaggo3 = Viaggio::create(['posti_disponibili' => 20]);
        $viaggo3->paesi()->attach([
            $paesi->where('nome', 'Cile')->first()->id,
            $paesi->where('nome', 'Argentina')->first()->id,
            $paesi->where('nome', 'Brasile')->first()->id,
        ]);

        $viaggo4 = Viaggio::create(['posti_disponibili' => 12]);
        $viaggo4->paesi()->attach($paesi->where('nome', 'Costa Rica')->first()->id);
    }
}
