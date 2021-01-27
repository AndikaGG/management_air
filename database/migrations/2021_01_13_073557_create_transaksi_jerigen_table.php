<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiJerigenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_jerigen', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tgl_transaksi', 20);
            $table->integer('harga_satuan');
            $table->integer('qty');
            $table->integer('total_harga');
            $table->integer('id_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_jerigen');
    }
}
