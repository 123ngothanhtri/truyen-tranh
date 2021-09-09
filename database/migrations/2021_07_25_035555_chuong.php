<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chuong extends Migration
{
    public function up()
    {
        Schema::create('chuong', function (Blueprint $table) {
            $table->id('id_chuong');
            $table->string('ten_chuong');
            $table->text('noidung_chuong')->nullable();
            $table->integer('luotxem_chuong')->default('0');
            $table->date('ngaythem_chuong')->nullable();
            $table->unsignedBigInteger('id_truyen');

            $table->foreign('id_truyen')->references('id_truyen')->on('truyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuong');
    }
}
