<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('outlets', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('pipelines', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('jabatans', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('segmens', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('progresses', function (Blueprint $table) {
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
             $table->dropSoftDeletes();
        });

        Schema::table('outlets', function (Blueprint $table) {
             $table->dropSoftDeletes();
        });

        Schema::table('pipeliness', function (Blueprint $table) {
             $table->dropSoftDeletes();
        });

        Schema::table('jabatans', function (Blueprint $table) {
             $table->dropSoftDeletes();
        });

        Schema::table('segmens', function (Blueprint $table) {
             $table->dropSoftDeletes();
        });

        Schema::table('progresses', function (Blueprint $table) {
             $table->dropSoftDeletes();
        });


    }
}
