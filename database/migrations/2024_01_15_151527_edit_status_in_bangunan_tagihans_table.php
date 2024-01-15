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
        Schema::table('bangunan_tagihans', function (Blueprint $table) {
            $table->enum('status', ['menunggu', 'dibayar', 'selesai', 'ditolak'])->default('menunggu')->change();
            $table->string('foto_transfer_admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bangunan_tagihans', function (Blueprint $table) {
            $table->enum('status', ['menunggu', 'dibayar'])->default('menunggu')->change();
            $table->dropColumn('foto_transfer_admin');
        });
    }
};
