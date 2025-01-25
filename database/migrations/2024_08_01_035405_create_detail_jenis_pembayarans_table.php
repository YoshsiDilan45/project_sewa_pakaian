<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jenis_pembayarans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_pembayaran');
            $table->foreign('id_jenis_pembayaran')->references('id')
            ->on('jenis_pembayarans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_rek', 25)->unique()->nullable();
            $table->string('tempat_bayar', 50)->unique()->nullable();
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
        Schema::dropIfExists('detail_jenis_pembayarans');
    }
};
