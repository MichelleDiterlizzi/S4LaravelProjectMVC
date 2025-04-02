<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Conciertos y Festivales', 'description' => 'Eventos musicales diversos.'],
            ['name' => 'Eventos Depotivos', 'description' => 'Eventos deportivos para todas las edades.'],
            ['name' => 'Arte y Música', 'description' => 'Exposiciones y eventos artísticos.'],
            ['name' => 'Cultura', 'description' => 'Eventos culturales, exposiciones, museos literatura y más.'],
            ['name' => 'Tecnología', 'description' => 'Conferencias y eventos tecnológicos.'],
            ['name' => 'Talleres y Cursos', 'description' => 'Cursos y eventos educativos.'],
            ['name' => 'Eventos Audiovisuales', 'description' => 'Shows de comedia y entretenimiento.'],
            ['name' => 'Eventos al Aire Libre', 'description' => 'Eventos académicos y profesionales.'],
            ['name' => 'Mercadillos', 'description' => 'Eventos de compra y venta.'],
            ['name' => 'Eventos beneficos', 'description' => 'Eventos con fines benéficos.'],
            ['name' => 'Otros', 'description' => 'Eventos diversos que no encajan en otras categorías.'],
            ['name' => 'Ferias', 'description' => 'Ferias comerciales y exposiciones.'],
            ['name' => 'Gastronomía', 'description' => 'Eventos relacionados con la comida y la bebida.'],
            ['name' => 'Salud y Bienestar', 'description' => 'Eventos relacionados con la salud y el bienestar.'],
            ['name' => 'Familia y Niños', 'description' => 'Eventos familiares y para niños.'],
        ];

        foreach ($categories as $category) {
            Category::create($category); // Usando el método create para insertar
        }
    }
}
