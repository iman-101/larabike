<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('rol',255);
            $table->integer('nivel')->default(100);    
            $table->boolean('admin')->default(false);
            $table->timestamps();
        });
        
        Schema::create('role_user', function (Blueprint $table) {
          
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');
            $table->timestamps();
            
//             $table->foreign('user_id')->references('id')->on('users')
//                     ->onUpdate('cascade')->onDelete('cascade');
            
//             $table->foreign('role_id')->references('id')->on('roles')
//             ->onUpdate('cascade')->onDelete('cascade');
            
//             $table->primary(['user_id','role_id']);
                    
        });
        

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   
        Schema::dropIfExists('roles_user');
        Schema::dropIfExists('roles');
    }
}
