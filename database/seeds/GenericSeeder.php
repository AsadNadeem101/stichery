<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Warehouse;

class GenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creating super admin
        $super_admin = User::create([
            'name'     => 'Super Admin',
            'email'    => 'super_admin@stichery.com',
            'type'     => 'super_admin',
            'password' => Hash::make('12345678'),
            'phone_no' => '03339999999',
            'address' => 'lahore',
        ]);
        //Assigning role
        $super_admin->assignRole('super_admin');

    }
}
