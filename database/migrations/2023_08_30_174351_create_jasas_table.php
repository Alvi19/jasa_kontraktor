<?php

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
        Schema::create('jasas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kontraktor::class)->constrained()->cascadeOnDelete();
            $table->string('foto_kontraktor');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('jumlah_tukang');
            $table->text('riwayat_pembangunan');
            $table->string('foto_pembangunan');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jasas');
    }
};
