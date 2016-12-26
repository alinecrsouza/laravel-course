<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        
        factory('CodeCommerce\User')->create([
            'name' => 'Aline',
            'email' => 'linecrsouza@gmail.com',
            'password' => Hash::make(123456),
            'is_admin' => true,
        ]);

        factory('CodeCommerce\User')->create([
            'name' => 'Laura',
            'email' => 'laura@gmail.com',
            'password' => Hash::make(123456),
        ]);
        
        factory('CodeCommerce\User', 10)->create();
    }
}
