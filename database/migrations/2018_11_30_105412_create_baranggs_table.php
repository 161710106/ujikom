<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaranggsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baranggs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('kode');
            $table->string('jenis');
            $table->string('stock');
            $table->string('harga');
          
            $table->boolean('status')->default(false);
            $table->unsignedInteger('kategoribarang_id');
            $table->foreign('kategoribarang_id')->references('id')->on('kategoribarangs')->onDelete('CASCADE');
           
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
        Schema::dropIfExists('baranggs');
    }
}
