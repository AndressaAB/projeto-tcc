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
    	User::create([
    		'id_cpf' 	=> '111',
    		'name' 		=> 'andrre',
    		'adress' 	=> 'eeee',
    		'cep' 		=> '2001922',
    		'lat' 		=> '1111',
    		'lon' 		=> '22222222',
    		'email' 	=> 'b',
    		'password' 	=> env('PASSWORD_HASH') ? bcrypt('b') : 'b',
    	]);
        // $this->call(UsersTableSeeder::class);
    }
}
