<?php

use Illuminate\Database\Seeder;

use App\Models\User;

/**
 * 用户填充
 *
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //生成工厂摩西
         $users = factory(User::class)->times(50)->make();
         //插入数据
         User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
         //修改第一条数据
         $user = User::find(1);
         $user->name = 'test';
         $user->email = 'test@test.com';
         $user->is_admin = true;
         $user->save();
    }
}
