<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddDob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('vdc_municipality_id')->nullable();
            $table->foreign('vdc_municipality_id')->references('id')->on('municipality_vdcs');

            $table->string('dob')->nullable();
            $table->string('nep_date')->nullable();
            $table->date('eng_date')->nullable();
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
            $table->dropColumn('dob');
            $table->dropColumn('nep_date');
            $table->dropColumn('eng_date');
            $table->dropForeign(['vdc_municipality_id']);
            $table->dropColumn('vdc_municipality_id');
        });
    }
}
