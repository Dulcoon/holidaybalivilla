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
        Schema::create('villas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // kalau kamu memang mau pakai nama kolom "slud", ganti jadi $table->string('slud');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('location')->nullable();   // contoh: "Canggu, Bali"
            $table->text('address')->nullable();
            $table->string('maps_link')->nullable();  // link Google Maps
            $table->decimal('price_per_night', 12, 2)->default(0);
            $table->unsignedInteger('bedrooms')->default(1);
            $table->string('thumbnail')->nullable();  // path gambar utama
            $table->string('status')->default('available'); // misal: available, unavailable, maintenance
            $table->json('fasilitas')->nullable();    // disimpan dalam bentuk JSON
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villas');
    }
};
