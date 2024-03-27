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
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->string('Prenom');
            $table->string('Nom');
            $table->integer('Experience');
            $table->string('NPermit')->unique();
            $table->date('DateEmission');
            $table->date('DateExpiration');
            $table->string('Categorie');
            $table->date('DateEmbauche');
            $table->date('DateFinEmbauche'); // Si la date de fin d'embauche peut être nulle
            $table->integer('Salaire'); // Changer la précision selon vos besoins
            $table->boolean('Occuper')->default(false);
            $table->boolean('Supprimer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chauffeurs');
    }
};
