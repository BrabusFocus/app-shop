<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function ($table) {
          $table->string('phone')->nullable();
          $table->string('address')->nullable();
          $table->string('username');//para inicio de sesion

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users',function ($table) {
        $table->dropColumn([
          'phone','address','username'
        ]);

      });
    }
}
