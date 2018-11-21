<?php

use Illuminate\Database\Seeder;

class ActicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//       数据填充100条数据
        factory(\App\Models\Article::class,100)->create();        //
    }
}
