<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Habit;
use App\Models\HabitUser;
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
        \App\Models\User::factory(30)->create();

        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->name = 'category '. $i;
            $category->description = 'category '. $i . 'description';
            $categoryIDS[] = $i;
            $category->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $habit = new Habit();
            $habit->name = 'Habit '. $i;
            $habit->description = 'Habit '. $i . ' description';
            $habit->category_id = rand(1,10);

            $habit->save();
        }

//
//        for($i = 0; $i < 10; $i++){
//            $relation = new HabitUser();
//
//            $relation->user_id = rand(0,10);
//            $relation->habit = rand(0,10);
//
//            $relation->save();
//        }

    }
}
