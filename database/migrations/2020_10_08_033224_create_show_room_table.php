<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_room', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('user_id')->unsigned();
            $table->string('verified')->nullable();
            $table->integer('promo')->nullable();
            $table->string('harga');
            $table->string('stok');
            $table->longtext('deskripsi');
            $table->string('jenis');
            $table->string('kondisi');
            $table->integer('mesin');
            $table->year('tahun');
            $table->string('bahan_bakar');
            $table->integer('tenaga');
            $table->string('transmisi');
            $table->string('warna');
            $table->text('fitur')->default('-');
            $table->text('gambar');
            $table->string('slug');
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
        Schema::dropIfExists('show_room');
    }
}
