<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Tipo;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = Tipo::pluck('id', 'slug'); 

        Evento::create([
            'titulo' => 'Workshop de Laravel', 
            'tipo_id' => $tipos['workshop'],
            'data' => '2026-11-18', 
            'local' => 'Laboratório 2.05', 
            'vagas' => 20, 
            'inscritos' => 12,
            'created_at' => now(),
            'updated_at' => now(),
            'descricao' => 'Aprenda os fundamentos do Laravel, um dos frameworks PHP mais populares, e como construir aplicações web robustas e escaláveis.'
        ]);
        Evento::create([ 
            'titulo' => 'Palestra: Carreiras em Cibersegurança', 
            'tipo_id' => $tipos['palestra'],
            'data' => '2026-11-25', 
            'local' => 'Auditório', 
            'vagas' => 120, 
            'inscritos' => 120,
            'created_at' => now(),
            'updated_at' => now(),
            'descricao' => 'Descubra as oportunidades e desafios na área de cibersegurança, com insights de profissionais experientes sobre como construir uma carreira de sucesso.'
        ]);
        Evento::create([
            'titulo' => 'Hackathon ISLA 24h', 
            'tipo_id' => $tipos['hackathon'],
            'data' => '2026-11-06', 
            'local' => 'Átrio principal', 
            'vagas' => 60, 
            'inscritos' => 41,
            'created_at' => now(),
            'updated_at' => now(),
            'descricao' => 'Participe de um evento intensivo para desenvolvedores que desejam criar soluções inovadoras em um ambiente de competição.'
        ]);
        Evento::create([ 
            'titulo' => 'Git e GitHub para iniciantes', 
            'tipo_id' => $tipos['workshop'],
            'data' => '2026-09-30', 
            'local' => 'Laboratório 1.02', 
            'vagas' => 25,
            'inscritos' => 25,
            'created_at' => now(),
            'updated_at' => now(),
            'descricao' => NULL
        ]);
        Evento::create([
            'titulo' => 'Conversa com antigos alunos DWDM', 
            'tipo_id' => $tipos['palestra'],
            'data' => '2026-12-02', 
            'local' => 'Sala 3.10', 
            'vagas' => 40, 
            'inscritos' => 9,
            'created_at' => now(),
            'updated_at' => now(),
            'descricao' => NULL
        ]);
        Evento::create([
            'titulo' => 'Oficina de Python', 
            'tipo_id' => $tipos['workshop'],
            'data' => '2026-11-15', 
            'local' => 'Laboratório 2.01',
            'vagas' => 30,
            'inscritos' => 30,
            'created_at' => now(),
            'updated_at' => now(),
            'descricao' => NULL
        ]);
    }
}
