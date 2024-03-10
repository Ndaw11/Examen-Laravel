<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom', // Ajoutez cette ligne pour permettre l'affectation en masse du champ "Nom"
        'Prenom',
        'Email',
        'Telephone',
    ];
}
