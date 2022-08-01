<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePersonAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_addresses', function (Blueprint $table) {
            $table->bigInteger('people_id');
            $table->bigInteger('addresses_id');
            $table->dateTime('active_form');
            $table->dateTime('active_thru')->nullable();
            $table->integer('is_primary')->unsigned()->nullable();
            $table->primary(array('people_id','addresses_id'));
            //$table->timestamps();

            DB::statement('ALTER TABLE logins MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_addresses');
    }
}
