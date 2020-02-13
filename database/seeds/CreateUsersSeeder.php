<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
              'name'=>'Admin',
              'email'=>'admin@mailinator.com',
            	'is_admin'=>'1',
              'role_id'=>'1',
              'password'=> bcrypt('123456'),
            ],
            [
              'name'=>'User',
              'email'=>'testuc@mailinator.com',
              'is_admin'=>'0',
              'role_id'=>'2',
              'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
