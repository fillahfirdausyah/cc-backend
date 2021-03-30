<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('tipe_transaksi')->nullable();
            $table->string('email')->nullable();
            $table->string('nama')->nullable();
            $table->bigInteger('jumlah');
            $table->string('kategori')->nullable();
            $table->string('status')->nullable();
            $table->string('bukti')->nullable();
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
        Schema::dropIfExists('keuangans');
    }
}
