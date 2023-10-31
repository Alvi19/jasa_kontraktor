<?php

use App\Models\Bangunan;
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
        Schema::create('bangunan_tagihans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bangunan::class)->constrained()->cascadeOnDelete();
            $table->string('nama_tagihan');
            $table->bigInteger('harga');
            $table->enum('status', ['menunggu', 'dibayar'])->default('menunggu');
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('xendit_id')->nullable();
            $table->string('xendit_invoice_url')->nullable();
            $table->enum('xendit_status', ['PENDING', 'PAID', 'SETTLED', 'EXPIRED'])->default('EXPIRED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bangunan_tagihans');
    }
};
