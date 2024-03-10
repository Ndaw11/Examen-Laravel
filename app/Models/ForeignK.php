<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeignK extends Model
{
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }
}
