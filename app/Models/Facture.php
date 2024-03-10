<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_id',
        'Montant',
        'DatePaiement',
        'MoyenPaiement',
        'client_id',
    ];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
