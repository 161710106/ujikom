<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik_kons');
            $table->string('nama_kons');
            $table->string('jk_kons');
            $table->text('alamat')->nullable();
            $table->string('no_hp');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->integer('jumlah_hari');
            $table->integer('total_sewa'); $table->unsignedInteger('barangg_id');
            $table->foreign('barangg_id')->references('id')->on('baranggs')->onDelete('CASCADE');
            
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
        Schema::dropIfExists('pinjams');
    }
}
