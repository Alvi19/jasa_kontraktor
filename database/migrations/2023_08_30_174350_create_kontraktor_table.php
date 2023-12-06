<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontraktors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('alamat');
            $table->string('pemilik');
            $table->string('TTL');
            $table->string('email');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('foto');
            $table->integer('jumlah_tukang');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraktors');
    }
};
