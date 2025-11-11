<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('data_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('kode_anggota', 8)->unique();
            $table->string('nama', 64);
            $table->string('jabatan', 50);
            $table->string('no_hp', 15)->nullable();
            $table->string('foto')->nullable(); // tambahkan kolom foto
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_anggota');
    }
};
