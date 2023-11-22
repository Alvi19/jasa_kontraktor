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
            $table->string('nama_bank')->nullable()->after('keterangan');
            $table->string('rekening')->nullable()->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kontraktors', function (Blueprint $table) {
            $table->dropColumn('nama_bank');
            $table->drop('rekening');
        });
    }
};
