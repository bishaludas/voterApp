<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersOne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('vdc_minicipality_id')->nullable();
            $table->unsignedInteger('ward_id')->nullable();
            $table->unsignedInteger('constituency_id')->nullable();
            $table->unsignedInteger('rep_assembly_id')->nullable();
            $table->unsignedInteger('state_assembly_id')->nullable();

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('vdc_minicipality_id')->references('id')->on('municipality_vdcs');
            $table->foreign('ward_id')->references('id')->on('wards');
            $table->foreign('constituency_id')->references('id')->on('constituency_areas');
            $table->foreign('rep_assembly_id')->references('id')->on('representative_assemblies');
            $table->foreign('state_assembly_id')->references('id')->on('state_assemblies');
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
            $table->dropForeign(['state_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['vdc_minicipality_id']);
            $table->dropForeign(['ward_id']);
            $table->dropForeign(['constituency_id']);
            $table->dropForeign(['rep_assembly_id']);
            $table->dropForeign(['state_assembly_id']);
            $table->dropColumn(['state_id', 'district_id', 
                'vdc_minicipality_id', 'ward_id','constituency_id',
                'rep_assembly_id', 'state_assembly_id'
            ]);
        });
    }
}
