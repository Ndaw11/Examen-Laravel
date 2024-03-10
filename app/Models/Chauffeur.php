<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'Prenom',
        'Nom',
        'Experience',
        'NPermit',
        'DateEmission',
        'DateExpiration',
        'Categorie',
        'DateEmbauche',
        'DateFinEmbauche',
        'Salaire',
       'Occuper',
    ];
}
