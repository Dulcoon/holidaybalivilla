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
        Schema::table('villas', function (Blueprint $table) {
            $table->unsignedInteger('people')->default(1)->after('bedrooms');
            $table->unsignedInteger('bathrooms')->default(1)->after('people');
            $table->unsignedInteger('swimming_pool')->default(1)->after('bathrooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('villas', function (Blueprint $table) {
            $table->dropColumn('people');
            $table->dropColumn('bathrooms');
            $table->dropColumn('swimming_pool');
        });
    }
};
