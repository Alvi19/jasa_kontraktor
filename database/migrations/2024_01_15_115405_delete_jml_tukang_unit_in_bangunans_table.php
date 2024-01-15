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
        Schema::table('bangunans', function (Blueprint $table) {
            $table->dropColumn('jumlah_tukang');
            $table->dropColumn('jumlah_unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bangunans', function (Blueprint $table) {
            $table->integer('jumlah_tukang')->default(0);
            $table->integer('jumlah_unit')->default(0);
        });
    }
};