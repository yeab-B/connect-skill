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
  public function run()
{
    $categories = ['Web', 'Data', 'AI', 'Design', 'Business', 'DevOps', 'Mobile', 'Game Dev', 'CyberSec', 'Language'];

    foreach ($categories as $cat) {
        Category::create(['name' => $cat]);
    }
}
}
