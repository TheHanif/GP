<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use factory;

use \Modules\Category\Entities\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        Model::unguard();

        for ($i=1; $i <= 8; $i++) { 
            $category = new Category;
            $category->fill([
                'name' => $faker->word,
                'slug' => str_random(10),
                'description' => $faker->text,
            ])->save();
        }
    }
}
