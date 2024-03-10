<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Voiture;
use App\Models\Location;
use App\Models\Chauffeur;
use Illuminate\Http\Request;

class LocationController extends Controller
{


    // afficher la liste des locations
    public function index()
{
    $locations = Location::where('valider', true)->get();
    
    // Chargez les détails de la voiture pour chaque location
    foreach ($locations as $location) {
        $voiture = Voiture::find($location->voiture_id);
        $client = Client::find($location->client_id);
        $chauffeur = Chauffeur::find($location->chauffeur_id);

        // Ajoutez les détails à la location
        $location->voiture = $voiture;
        $location->client = $client;
        $location->chauffeur = $chauffeur;
    }

    return view('Location.ListeLocation', compact('locations'));
}


public function DetailsLocation($id)
    {
       // Récupérez la location à l'aide de l'ID
    $locations = Location::findOrFail($id);

    // Récupérez les détails associés (voiture, client, chauffeur)
    $voiture = Voiture::find($locations->voiture_id);
    $client = Client::find($locations->client_id);
    $chauffeur = Chauffeur::find($locations->chauffeur_id);

    // Ajoutez les détails à la location
    $locations->voiture = $voiture;
    $locations->client = $client;
    $locations->chauffeur = $chauffeur;
    

        // Passez la location à la vue et affichez la vue
        return view('Location.VoirDetails',compact('locations'));
    }


    public function LocationEnCours()
    {
        $locations = Location::join('voitures', 'locations.voiture_id', '=', 'voitures.id')
        ->where('voitures.LocationEnCours', true)
        ->get();

// Chargez les détails de la voiture pour chaque location
foreach ($locations as $location) {
$voiture = Voiture::find($location->voiture_id);
$client = Client::find($location->client_id);
$chauffeur = Chauffeur::find($location->chauffeur_id);

// Ajoutez les détails à la location
$location->voiture = $voiture;
$location->client = $client;
$location->chauffeur = $chauffeur;
}
        // Passez les résultats à la vue
        return view('Location.LocationEnCours', compact('locations'));
    }



    public function louerVoiture(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            // Ajoutez ici les règles de validation pour chaque champ du formulaire
            'Nom' => 'required|string',
            'Prenom' => 'required|string',
            'Email' => 'required|email',
            'Telephone' => 'required|string',
            'LieuDepart' => 'required|string',
            'LieuArrive' => 'required|string',
            'Distance' => 'required|string',
            'DateDebut' => 'required|date',
            'HeureDebut' => 'required',
            'DateFin' => 'required|date',
            'HeureFin' => 'required',
            'Montant' => 'required',
            'MoyenPaiement' => 'required',
            'id_chauffeur' => 'required|exists:chauffeurs,id', // Assurez-vous que le chauffeur existe
        ]);

        // Vérifier si le client existe déjà avec cet e-mail
    $client = Client::where('Email', $request->input('Email'))->first();

    // Si le client n'existe pas, le créer
    if (!$client) {
        $client = Client::create([
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'Email' => $request->input('Email'),
            'Telephone' => $request->input('Telephone'),
        ]);
    }


        // Créer une nouvelle location associée au client et au chauffeur
        $location = Location::create([
            'LieuDepart' => $request->input('LieuDepart'),
            'LieuArriver' => $request->input('LieuArrive'),
            'Distance' => $request->input('Distance'),
            'DateDebut' => $request->input('DateDebut'),
            'HeureDebut' => $request->input('HeureDebut'),
            'DateFin' => $request->input('DateFin'),
            'HeureFin' => $request->input('HeureFin'),
            'Montant' => $request->input('Montant'),
            'MoyenPaiement' => $request->input('MoyenPaiement'),
            'valider' => false,
            'client_id' => $client->id,
            'voiture_id' => $request->input('voiture_id'),
            'chauffeur_id' => $request->input('id_chauffeur'),
        ]);
       $facture= Facture::create([
          'Montant' => $location->Montant, // Vous devez ajuster cela en fonction de votre logique
          'DatePaiement' => now(), // Vous pouvez ajuster cela selon vos besoins
          'MoyenPaiement' => $location->MoyenPaiement, // Vous pouvez ajuster cela selon vos besoins
          'location_id' => $location->id,
          'client_id' => $client->id,
      ]);

      $location->save();

      $voiture = Voiture::find($location->voiture_id);

        $voiture->update(['LocationEnCours' => true]);
        $voiture->update(['KmParcouru' => $voiture->KmParcouru + $location->Distance]);

        $chauffeur = Chauffeur::find($request->input('id_chauffeur'));
        $chauffeur->update(['Occuper' => true]);
    

        // Rediriger ou effectuer d'autres actions après la création
        return redirect()->back()->with('success', 'Location ajoutée avec succès');
    }


    public function TerminerLocation($id)
    {
        // Récupérez la location avec l'ID spécifié
        $location = Location::findOrFail($id);
    
        // Mettez à jour l'attribut LocationEnCours de la voiture à false
        $voiture = Voiture::find($location->voiture_id);
    
        // Vérifiez si la voiture existe

            $voiture->update(['LocationEnCours' => false]);

    
        // Marquez la location comme terminée (vous pouvez ajouter d'autres opérations nécessaires)
        $location->update(['Valider' => true]);
    
        // Mettez à jour l'attribut Occuper du chauffeur à false
        $chauffeur = Chauffeur::find($location->chauffeur_id);
    
        // Vérifiez si le chauffeur existe
     
            $chauffeur->update(['Occuper' => false]);

        // Redirigez ou faites ce qui est approprié après la terminaison de la location
        return redirect()->back()->with('success', 'Location terminée avec succès');
    }
    
  
}
