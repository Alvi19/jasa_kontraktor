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
        Schema::table('kontraktors', function (Blueprint $table) {
            $table->string('nik');
            $table->string('foto_ktp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kontraktors', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('foto_ktp');
        });
    }
};
