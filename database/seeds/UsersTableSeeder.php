<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name'=>"Administrator",
                'username' => 'superadminhlob',
                'email' => 'administrator@hlobcoin.com',
                'referal' => null,
                'role'=> 1,
                'unilevel'=>100,
                'avatar'=>null,
                'password' => bcrypt('passwordqwerty'),
                'activation_code' => null,
                'status' => 1,
                'is_enable_2fa' => 0,
                'secret_2fa' => '',
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
        ]);
    }
}