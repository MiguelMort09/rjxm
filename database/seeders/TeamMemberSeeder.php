<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamMember::create([
            'name' => 'Raúl Antonio Jiménez Loyo',
            'photo' => '/assets/img/FOTO_RAUL_LOYO.jpg',
            'biography' => '<p><strong>Lic. Administración de Empresas Turísticas</strong></p><p><strong>Maestría en Mercadotecnia y Medios Digitales</strong></p><p><strong>Actualmente cursando la Licenciatura en Derecho y Ciencias Jurídicas</strong></p><p><strong>Consejero Político Estatal</strong></p><p><strong>Consejero Político Municipal</strong></p>',
            'phone' => '9811026035',
            'email' => 'Raul_loyo1994@hotmail.com',
            'position' => 'Presidente',
        ]);
        TeamMember::create([
            'name' => 'Sheyla Verdejo Camara',
            'photo' => '/assets/img/rj2.png',
            'biography' => '<p><strong>Lic. en Ciencias Políticas</strong></p><p>Carmelita con un gusto especial por el cóctel de camarones y chocomilk para la cruda.</p>',
            'phone' => '9998887775',
            'email' => 'Sheyla@gmail.com',
            'position' => 'Secretaria General',
        ]);
        TeamMember::create([
            'name' => 'Miguel Uicab',
            'photo' => '/assets/img/rj2.png',
            'biography' => 'asdasdasdasd',
            'phone' => '9998887778',
            'email' => 'miguelmort9@gmail.com',
            'position' => 'Secretario de Organización',
        ]);
    }
}
