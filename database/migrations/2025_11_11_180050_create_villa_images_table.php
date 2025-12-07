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
        Schema::create('villa_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('villa_id')
                ->constrained('villas')
                ->onDelete('cascade'); // kalau villa dihapus, gambar-gambar ikut terhapus
            $table->string('image_path'); // path atau URL gambar
            $table->timestamp('created_at')->nullable(); // hanya created, tanpa updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villa_images');
    }
};
