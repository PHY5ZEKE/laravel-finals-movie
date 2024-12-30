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

        Schema::table('theaters', function (Blueprint $table) {
            $table->string('imagePath')->nullable()->after('capacity');
        });
        // Add other table updates here if needed
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('theaters', function (Blueprint $table) {
            $table->dropColumn('imagePath');
        });
        // Reverse other table updates here if needed
    }
};
