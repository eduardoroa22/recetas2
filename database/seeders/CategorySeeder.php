<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'desarrolo web'
        ]);
        Category::create([
            'name'=>'diseño web'
        ]);
        Category::create([
            'name'=>'programacion'
        ]);
    
    }
}
