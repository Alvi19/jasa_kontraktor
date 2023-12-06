<?php

use App\Models\Bangunan;
use App\Models\Client;
use App\Models\Kontraktor;
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
        Schema::create('bangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kontraktor::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Client::class)->constrained()->cascadeOnDelete();
            $table->string('nama_konstruksi');
            $table->date('tanggal_mulai');
            $table->float('luas_lahan');
            $table->float('luas_bangunan');
            $table->string('alamat_bangunan');
            $table->integer('jumlah_tukang');
            $table->integer('jumlah_ruangan')->nullable();
            $table->text('keterangan_ruangan')->nullable();
            $table->string('jenis_pengerjaan');
            $table->text('catatan')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->enum('status', ['menunggu', 'proses', 'ditolak', 'selesai'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bangunans');
    }
};
