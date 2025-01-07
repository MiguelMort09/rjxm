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
        $raul = TeamMember::create([
            'name' => 'Raúl Antonio Jiménez Loyo',
            'photo' => '/assets/img/FOTO_RAUL_LOYO.jpg',
            'biography' => '<p>Lic. Administración de Empresas Turísticas</p><p>Maestría en Mercadotecnia y Medios Digitales</p><p>Actualmente cursando la Licenciatura en Derecho y Ciencias Jurídicas</p><p>Consejero Político Estatal</p><p>Consejero Político Municipal</p>',
            'phone' => '9811026035',
            'email' => 'Raul_loyo1994@hotmail.com',
            'position' => 'Presidente',
        ]);

        $raul->socialLinks()->createMany([
            ['name' => 'email', 'url' => 'facebook.com'],
            ['name' => 'instagram', 'url' => 'instagram.com'],
            ['name' => 'facebook', 'url' => 'facebook.com']
        ]);

        $sheyla = TeamMember::create([
            'name' => 'Sheyla Verdejo Camara',
            'photo' => '/assets/img/FOTO_SHEYLA.jpg',
            'biography' => '<p>Estudiante en Ciencias Políticas y Administración Pública</p><p>Líder Estudiantil</p><p>Consejo Político Estatal</p><p>Consejero Político Municipal</p>',
            'phone' => '9384051905',
            'email' => 'Sheyla@gmail.com',
            'position' => 'Secretaria General',
        ]);
        $sheyla->socialLinks()->createMany([
            ['name' => 'email', 'url' => 'facebook.com'],
            ['name' => 'instagram', 'url' => 'instagram.com'],
            ['name' => 'facebook', 'url' => 'facebook.com']
        ]);

        $mort = TeamMember::create([
            'name' => 'Miguel Uicab',
            'photo' => '/assets/img/FOTO_MORT.jpg',
            'biography' => '<p>Formación en Ingeniería en Tecnologías de Software</p> <p>Estudiante de Lic en Administración Publica</p> <p>Consejero Político Estatal Suplente</p> <p>Activista Social</p>',
            'phone' => '9821029769',
            'email' => 'miguelmort9@gmail.com',
            'position' => 'Secretario de Organización',
        ]);
        $mort->socialLinks()->createMany([
            ['name' => 'email', 'url' => 'facebook.com'],
            ['name' => 'instagram', 'url' => 'instagram.com'],
            ['name' => 'facebook', 'url' => 'facebook.com']
        ]);
    }
}
