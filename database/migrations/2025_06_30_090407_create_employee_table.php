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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('role');
            $table->string('jabatan');
            $table->string('fungsi');
            $table->date('tanggal_mulai_efektif');
            $table->date('tanggal_akhir_efektif')->default('9999-12-31');
            $table->boolean('current_flag')->default(true);

            // Pastikan hanya ada SATU kombinasi NIK dan TRUE untuk current_flag
            $table->unique(['nik', 'current_flag']); // <--- Ini penting!

            // Menyesuaikan indeks (komposit) dengan kolom 'nik'
            // $table->index(['nik', 'tanggal_mulai_efektif', 'tanggal_akhir_efektif']);
            // $table->index(['nik', 'current_flag']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
