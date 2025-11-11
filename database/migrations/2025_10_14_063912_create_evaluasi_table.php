<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->text('hasil_evaluasi');
            $table->string('penanggung_jawab');
            $table->date('tanggal');
            $table->enum('status', ['baik', 'perlu perbaikan', 'buruk']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
