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
        Schema::create('penarikan_saldos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kontraktor::class);
            $table->bigInteger('nominal');
            $table->enum('status', ['Pending', 'Sukses', 'Gagal'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penarikan_saldos');
    }
};
