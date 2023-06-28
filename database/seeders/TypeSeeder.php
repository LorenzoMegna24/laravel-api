<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Type;

use Illuminate\Support\Str;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayType = [
            'blog',
            'portfolio',
            'portali',
            'sito aziendale'
        ];

        foreach ($arrayType as $elem){

            $new_type = new Type();
            $new_type->name_type = $elem;
            $new_type->slug = Str::slug($new_type->name_type,'-');
            $new_type->save();
        }


    }
}
