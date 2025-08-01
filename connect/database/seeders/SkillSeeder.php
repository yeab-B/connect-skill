<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skill;
use App\Models\Category;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  
public function run()
{
    $skills = ['HTML', 'CSS', 'Laravel', 'React', 'Vue', 'Python', 'ML', 'UX', 'Figma', 'SEO'];

    $categoryIds = Category::pluck('id')->toArray();

    foreach ($skills as $skill) {
        Skill::create([
            'name' => $skill,
            'category_id' => $categoryIds[array_rand($categoryIds)],
        ]);
    }

    // Assign random skills to teachers
    $teachers = User::role('teacher')->get();
    $skillIds = Skill::pluck('id')->toArray();

    foreach ($teachers as $teacher) {
        $teacher->skills()->sync(array_rand(array_flip($skillIds), rand(2, 4)));
    }
}
}
