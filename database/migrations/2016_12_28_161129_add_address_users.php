<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('street', 255);
            $table->string('city', 40);
            $table->string('state_region', 80);
            $table->string('zip_code', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('street');
            $table->removeColumn('city');
            $table->removeColumn('state_region');
            $table->removeColumn('zip_code');
        });
    }
}
