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
            'email' => 'aline@gmail.com',
            'password' => Hash::make(123456),
            'is_admin' => true,
            'street'=> 'Rua das Bromélias',
            'city'=>'Macae',
            'state_region'=>'RJ',
            'zip_code'=>'24537-908'

        ]);

        factory('CodeCommerce\User')->create([
            'name' => 'Laura',
            'email' => 'laura@gmail.com',
            'password' => Hash::make(123456),
            'street'=> 'Rua das Acácias',
            'city'=>'Macae',
            'state_region'=>'RJ',
            'zip_code'=>'24537-908'
        ]);
        
        //factory('CodeCommerce\User', 10)->create();
    }
}
