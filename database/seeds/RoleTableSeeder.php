<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //给角色添加一个初始角色
        \Spatie\Permission\Models\Role::create([
            'title'=>'站长','name'=>'superAdmin'
        ]);
    }
}
