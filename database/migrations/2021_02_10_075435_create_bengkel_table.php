<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBengkelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkel', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('user_id');
            $table->text('alamat');
            $table->string('kontak')->unique();
            $table->text('layanan');
            $table->time('waktu_buka');
            $table->time('waktu_tutup');
            $table->text('hari');
            $table->text('promo')->nullable();
            $table->text('gambar');
            $table->string('slug');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('bengkel');
    }
}
