<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * 数据填充
 *
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //关闭监管
        Model::unguard();
        //用户数据填充
        $this->call(UsersTableSeeder::class);
        //微博数据填充
        $this->call(StatusesTableSeeder::class);
        //粉丝数据填充
        $this->call(FollowersTableSeeder::class);
        //重新打开监管
        Model::reguard();
    }
}




