<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'LieuDepart', // Ajoutez cette ligne pour permettre l'affectation en masse du champ "LieuDepart"
        'LieuArriver',
        'Distance',
        'DateDebut',
        'HeureDebut',
        'DateFin',
        'HeureFin',
        'Montant',
        'MoyenPaiement',
        'Valider',
        'client_id',
        'voiture_id',
        'chauffeur_id',
    ];
}
