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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('Marque');
            $table->string('Model');
            $table->string('Matricule')->unique();
            $table->date('DateAchat');
            $table->integer('MontantAchat');
            $table->integer('LocationJours');
            $table->integer('KmDefaut');
            $table->integer('KmParcouru')->default(0);
            $table->string('Categorie');
            $table->boolean('LocationEnCours')->default(false);
            $table->string('Photo');
            $table->boolean('Panne')->default(false);
            $table->boolean('Supprimer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
