<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'Marque', 'Model', 'Matricule', 'DateAchat', 'MontantAchat', 'KmDefaut',
        'LocationJours', 'KmParcouru', 'Categorie', 'LocationEnCours', 'Photo', 'Panne','Supprimer'
    ];
    
}
