<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Angel Fuenmayor',
            'email'     => 'paginfoweb@gmail.com',
            'password'  => bcrypt('Angel123'),
            'type'      => 'super',
        ]);        
    }
}
