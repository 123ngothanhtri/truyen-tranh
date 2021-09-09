<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Truyen extends Migration
{
    public function up()
    {
        Schema::create('truyen', function (Blueprint $table) {
            $table->id('id_truyen');
            $table->string('ten_truyen');
            $table->string('hinhanh_truyen');
            $table->string('mota_truyen',999)->default('Đang cập nhật');
            $table->string('tacgia_truyen')->default('Đang cập nhật');
            $table->date('ngayphathanh_truyen')->nullable();
            $table->string('nguon_truyen')->default('Đang cập nhật');
            $table->string('trangthai_truyen')->default('Đang tiến hành');
            $table->unsignedBigInteger('id_theloai');

            $table->foreign('id_theloai')->references('id_theloai')->on('theloai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyen');
    }
}
