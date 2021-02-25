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
            $table->integer('user_id')->unsigned();
            $table->string('stok');
            $table->string('judul');
            $table->string('slug');
            $table->string('kategori');
            $table->longtext('deskripsi');
            $table->string('harga');
            $table->integer('promo')->nullable();
            $table->text('gambar');
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
