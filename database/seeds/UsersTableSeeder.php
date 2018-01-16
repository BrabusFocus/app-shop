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
        //
        User::create ([
          'name' => 'Cristian',
          'email' =>'zv99@gmail.com',
          'password' => bcrypt('12345679'),
          'admin' => true,
        ]);
    }
}
