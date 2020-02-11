<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('first_name', 100);
            $table->char('last_name', 100);
            $table->char('email', 100)->unique();
            $table->char('password', 100);  
            $table->timestamps();
            $table->primary('email');
        });*/
        Schema::dropIfExists('admins');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
