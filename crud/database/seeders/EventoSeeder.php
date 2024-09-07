<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    public function run()
    {
        Evento::create([
            'nome' => 'Palestra',
            'email' => 'palestra@exemplo.com',
            'local' => 'Centro de Convenções',
            'data' => '2024-09-10'
        ]);

        Evento::create([
            'nome' => 'Show',
            'email' => 'show@exemplo.com',
            'local' => 'Estádio Municipal',
            'data' => '2024-09-15'
        ]);

        Evento::create([
            'nome' => 'Conferência',
            'email' => 'conferencia@exemplo.com',
            'local' => 'Auditório Central',
            'data' => '2024-09-20'
        ]);

        Evento::create([
            'nome' => 'Concerto',
            'email' => 'concerto@exemplo.com',
            'local' => 'Teatro Municipal',
            'data' => '2024-09-25'
        ]);

        Evento::create([
            'nome' => 'Feira de Exposição',
            'email' => 'feira@exemplo.com',
            'local' => 'Parque de Exposições',
            'data' => '2024-09-30'
        ]);

        Evento::create([
            'nome' => 'Festival',
            'email' => 'festival@exemplo.com',
            'local' => 'Praça Central',
            'data' => '2024-10-05'
        ]);
    }
}
