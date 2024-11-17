<?php

namespace Database\Seeders;

use App\Enums\StatusPost;
use App\Enums\TypePost;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Nueva Dirigencia de la RJXM en Campeche',
                'description' => '<p><strong>El 12 de diciembre de 2023</strong> fue un día de renovación para la <strong>Red de Jóvenes por México (RJXM)</strong> en Campeche. En una ceremonia solemne, <strong>Sheyla Verdejo</strong> y <strong>Raúl Loyo</strong> tomaron protesta como <strong>Secretaria General</strong> y <strong>Presidente</strong>, respectivamente, de esta organización juvenil, comprometiéndose a trabajar incansablemente por los jóvenes del estado.<br><strong>Sheyla Verdejo</strong> y <strong>Raúl Loyo</strong> representan a una nueva generación de líderes con una visión fresca y comprometida con el desarrollo de la juventud campechana. Su gestión se enfocará en consolidar una Red que trabaje de la mano con las juventudes, brindando espacios de participación, formación y desarrollo. Con esta dirigencia, la <strong>RJXM</strong> en Campeche refuerza su misión de ser una plataforma que apoye a los jóvenes en su crecimiento personal y profesional, construyendo así un futuro próspero para Campeche.</p>',
                'status' => StatusPost::Published,
                'type' => TypePost::Announcement,
                'cover_image' => '/assets/img/POST_1.jpg',
                'is_featured' => false,
            ],
            [
                'title' => 'Juventud en el Gobierno: Propuesta de Alejandro Moreno Cárdenas',
                'description' => '<p><strong>Alejandro Moreno Cárdenas,</strong> nuestro Dirigente Nacional, ha hecho una propuesta innovadora y audaz: que al menos dos Secretarías de Estado sean encabezadas por personas jóvenes, de entre 25 y 35 años. Esta iniciativa busca reflejar la realidad de un México joven y dinámico, capaz de liderar con perspectiva, energía y nuevas ideas.<br>Con esta propuesta, el PRI reconoce que los jóvenes no son solo el futuro de México, sino el presente. Al otorgar espacios de decisión y liderazgo a personas jóvenes, se permitirá una representación más cercana a los intereses y realidades de las nuevas generaciones, promoviendo políticas públicas más inclusivas y ajustadas a la realidad actual. Este es el tipo de gobierno que necesitamos para construir un México vibrante, diverso y lleno de oportunidades para todos.</p>',
                'status' => StatusPost::Draft,
                'type' => TypePost::Opinion,
                'cover_image' => '/assets/img/POST_2.jpg',
                'is_featured' => false,
            ],
            [
                'title' => 'Diálogo de Juventudes: Construyendo una Agenda Legislativa para Campeche',
                'description' => '<p>El <strong>“Diálogo de Juventudes”</strong> fue un espacio donde las ideas y opiniones de los jóvenes campechanos fueron escuchadas con atención y respeto. Durante esta actividad, se intercambiaron propuestas, reflexiones y aportaciones valiosas que servirán como base para la construcción de una agenda legislativa enfocada en representar de la mejor manera a las juventudes de Campeche.<br>Este tipo de ejercicios son esenciales para nuestro trabajo, ya que permiten a los líderes juveniles y a los Diputados locales comprender mejor las necesidades y aspiraciones de las nuevas generaciones. Nos motivan a seguir avanzando, impulsando políticas y proyectos que apoyen a los jóvenes campechanos en su desarrollo integral. En el PRI Campeche, estamos convencidos de que la participación juvenil es fundamental para el progreso de nuestro estado.</p>',
                'status' => StatusPost::Published,
                'type' => TypePost::Event,
                'cover_image' => '/assets/img/POST_3.jpg',
                'is_featured' => false,
            ],
            [
                'title' => 'Apoyo y Cercanía para las Juventudes Campechanas',
                'description' => '<p>En el <strong>PRI Campeche</strong>, el compromiso con nuestras juventudes va más allá de las palabras. Nos esforzamos por brindar un apoyo constante a nuestros estudiantes a través de un acercamiento genuino y un diálogo abierto. En esta organización, los jóvenes campechanos pueden contar con un respaldo incondicional, que fomenta su crecimiento y formación como futuros líderes del estado.<br>Queremos agradecer a la Diputada Ariana Rejón Lara, quien, con su respaldo firme, demuestra un compromiso genuino con las juventudes de Campeche. Su apoyo es fundamental en esta lucha por transformar el futuro de nuestro estado, impulsando una auténtica Revolución Juvenil en Campeche. En el PRI, reafirmamos que la fuerza de las juventudes es la clave para el desarrollo de un Campeche fuerte y solidario.</p>',
                'status' => StatusPost::Published,
                'type' => TypePost::News,
                'cover_image' => '/assets/img/POST_4.jpg',
                'is_featured' => true,
            ],
        ];

        foreach ($articles as $article) {
            Post::create([
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'description' => $article['description'],
                'status' => $article['status'],
                'type' => $article['type'],
                'cover_image' => $article['cover_image'],
                'is_featured' => $article['is_featured'],
            ]);
        }
    }
}
