<?php

namespace Database\Seeders;

use App\Models\Admin\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayTechnology = [
            'laravel',
            'vue',
            'php',
            'javascript',
            'bootstrap',
            'html',
            'css'
        ];

        foreach ($arrayTechnology as $elem){

            $new_technology = new Technology();
            $new_technology->name_technology = $elem;
            $new_technology->slug = Str::slug($new_technology->name_technology,'-');
            $new_technology->save();
        }

    }
}
