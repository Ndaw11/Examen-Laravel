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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('LieuDepart');
            $table->string('LieuArriver');
            $table->float('Distance');
            $table->date('DateDebut');
            $table->time('HeureDebut');
            $table->date('DateFin');
            $table->time('HeureFin');
            $table->integer('Montant');
            $table->string('MoyenPaiement');
            $table->boolean('Valider')->default(false);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
