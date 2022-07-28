<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Habit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->name = 'category '. $i;
            $category->description = 'category '. $i . 'description';

            $category->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $habit = new Habit();
            $habit->name = 'Habit '. $i;
            $habit->description = 'Habit '. $i . ' description';
            $habit->category_id = rand(1,10);

            $habit->save();
        }
    }
}
