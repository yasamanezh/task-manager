<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('name' => 'user1','email' => 'email1@yahoo.com','password' => bcrypt(123)),
            array('name' => 'user2','email' => 'email2@yahoo.com','password' => bcrypt(123)),
            array('name' => 'user3','email' => 'email3@yahoo.com','password' => bcrypt(123)),
            array('name' => 'user4','email' => 'email4@yahoo.com','password' => bcrypt(123)),
            array('name' => 'user5','email' => 'email5@yahoo.com','password' => bcrypt(123)),
        );
        foreach($users as $item){
            DB::table('users')->insert($item);
        }
    }
}
