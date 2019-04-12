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
            $table->string('nep_name')->nullable();
            $table->string('eng_name');
            $table->date('dob');
            $table->enum('sex',['male','female', 'other']);
            $table->string('citizenship_no');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('husband_wife')->nullable();
            $table->string('image_path');
            $table->softDeletes();
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
