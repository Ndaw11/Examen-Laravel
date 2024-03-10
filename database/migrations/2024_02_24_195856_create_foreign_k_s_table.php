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
        Schema::table('locations', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained('clients');
        $table->foreignId('voiture_id')->constrained('voitures');
        $table->foreignId('chauffeur_id')->constrained('chauffeurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_k_s');
    }
};
