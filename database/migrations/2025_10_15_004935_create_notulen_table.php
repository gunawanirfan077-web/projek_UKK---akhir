<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notulen', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->string('tanggal', 20);
            $table->string('tempat', 100);
            $table->string('pembicara', 100);
            $table->text('isi');
            $table->string('penulis', 64);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notulen');
    }
};
