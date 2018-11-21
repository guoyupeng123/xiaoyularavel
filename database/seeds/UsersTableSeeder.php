<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 30)->create();

            //修改第一个数据为正式数据
            $user = \App\User::find(1);
            $user->name = '郭宇鹏';
            $user->email = '1933304128@qq.com';
            $user->password = bcrypt('admin');
            $user->is_admin = true;
//          保存
            $user->save();

    }
}
