<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        Producto::factory()->count(50)->create(); // Crea 50 productos
    }
}
