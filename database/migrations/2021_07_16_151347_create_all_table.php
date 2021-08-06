<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTable extends Migration
{


   public function up(){
        Schema::create('pipelines', function (Blueprint $table) {
            $table->id();
            $table->string('pipeline_nama_nasabah');
            $table->string('pipeline_nominal');
            $table->string('pipeline_progress');
            $table->string('pipeline_segmen');
            $table->date('pipeline_proyeksiCairDate');
            $table->string('pipeline_proyeksiCairWeek');
            $table->string('pipeline_proyeksiCairMonth');
            $table->string('pipeline_noloan');
            $table->string('pipeline_nip');
            $table->string('pipeline_jabatan');
            $table->string('pipeline_outletCode');
            $table->string('pipeline_ket');
            $table->enum('pipeline_status', ['on', 'deleted', 'verified']);
            $table->enum('pipeline_jenis', ['baru','topup']);

            $table->timestamps();
        });
    
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique;
            $table->string('nama');
            $table->string('outletCode');
            $table->string('jabatan');
            $table->enum('pegawai_status', ['active', 'resign']);
            $table->timestamps();
        });
    
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_code')->unique;
            $table->string('outlet_name');
            $table->string('outlet_area');
            $table->string('outlet_region');
            $table->string('outlet_bank');
            $table->timestamps();
        });

        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan_ket');
            $table->timestamps();
        });

        Schema::create('progresses', function (Blueprint $table) {
            $table->id();
            $table->string('progress_ket');
            $table->timestamps();
        });

        Schema::create('segmens', function (Blueprint $table) {
            $table->id();
            $table->string('segmen_ket');
            $table->timestamps();
        });


        // Schema::create('comments', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('post_id');
        //     $table->text('comment');
        //     $table->timestamps();
   
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('post_id')->references('id')->on('posts');
        // });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('pipelines');
        Schema::dropIfExists('outlets');
        Schema::dropIfExists('jabatans');
        Schema::dropIfExists('segmens');
        Schema::dropIfExists('progresses');
    }                     
                        
        
}
