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
            $table->string('foto')->nullable();
            $table->string('dokumen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bangunans', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->dropColumn('dokumen');
        });
    }
};
