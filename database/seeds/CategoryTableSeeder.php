<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;


/**
 * Description of CategoryTableSeed
 *
 * @author Administrador
 */
class CategoryTableSeeder extends Seeder {
    
    public function run() {
        
        DB::table('categories')->truncate();
        
        factory('CodeCommerce\Category', 15)->create();
    }
}
