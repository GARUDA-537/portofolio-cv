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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('issuer'); // Penerbit sertifikat
            $table->string('credential_id')->nullable(); // ID kredensial
            $table->date('issue_date'); // Tanggal terbit
            $table->date('expiry_date')->nullable(); // Tanggal kadaluarsa (jika ada)
            $table->text('description')->nullable();
            $table->string('image_path')->nullable(); // Path gambar sertifikat
            $table->string('url')->nullable(); // Link verifikasi
            $table->string('category')->default('Umum'); // Kategori: Jaringan, Web Development, dll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
