<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create(
            [
                'cpf'       => '46907152895', 
                'name'      => 'Lucas Moraes', 
                'phone'     => '1199856565', 
                'birth'     => '1980-10-01', 
                'gender'    => 'm',
                'email'     => 'lucas@outlook.com', 
                'password'  => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
                'status'    => '', 
                'permission' => ''
            ]
        );
    }
}
