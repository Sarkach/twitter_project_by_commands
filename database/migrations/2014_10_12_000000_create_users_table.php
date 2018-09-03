<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('surname');
			$table->string('patronymic');
			$table->date('dob');
            $table->string('email')->unique();
            $table->string('password');
			$table->integer('gender_id')  
                  ->unsigned();   
			$table->foreign('gender_id')  
                  ->references('id')            
                  ->on('genders')         
                  ->onDelete('CASCADE') 
				  ->onUpdate('RESTRICT');
				  $table->integer('role_id')  
                  ->unsigned();   
			$table->foreign('role_id')  
                  ->references('id')            
                  ->on('roles')         
                  ->onDelete('CASCADE') 
				  ->onUpdate('RESTRICT');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
