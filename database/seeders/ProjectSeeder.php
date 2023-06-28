<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Admin\Project;

use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) { 
            $new_project = new Project();
            $new_project->project_title = $faker->sentence(3);
            $new_project->description = $faker->text(300);
            $new_project->img = $faker->imageUrl(640, 480, 'animals', true);
            $new_project->slug = Str::slug($new_project->project_title,'-');
            $new_project->save();
        }
    }
}
