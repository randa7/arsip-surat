<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
			$table->id('idsuratmasuk');
            $table->unsignedBigInteger('idbagian');
            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('iddisposisi')->nullable();
            $table->string('nomor_surat');
            $table->string('perihal');
            $table->string('lampiran');
            $table->string('pengirim');
            
            $table->string('file_surat')->nullable();
            $table->date('tanggalsurat');
            $table->date('tanggalsuratmasuk');


            $table->foreign('idbagian')
            ->references('id')->on('bagian')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('iduser')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
