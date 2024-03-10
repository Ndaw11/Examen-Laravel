<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Location;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function ListeClients()
    {
        $clients = Client::all(); // Vous pouvez ajuster cette logique pour récupérer la liste des clients

        return view('Client.ListeClient', compact('clients')); // Assurez-vous d'avoir une vue appropriée pour afficher la liste des clients
    }

    public function VoirFacture($id)
{
    // Récupérez la location
    $location = Location::find($id);

    // Vérifiez si la location existe
    

    // Récupérez l'id du client associé à cette location
    $clientId = $location->client_id;

    // Récupérez les factures du client
    $factures = Facture::whereHas('location', function ($query) use ($clientId) {
        $query->where('client_id', $clientId);
    })->get();

    return view('Client.VoirFacture', compact('factures'));
}

}
