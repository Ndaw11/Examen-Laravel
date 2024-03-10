<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Voiture;
use App\Models\Location;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use App\Models\foreignkClient;

class FactureController extends Controller
{
    public function index()
    {
      // Récupérez la liste des factures depuis le modèle
      $factures = Facture::all();
      
      foreach ($factures as $facture) {
        // Récupérez la location associée à la facture
        $location = Location::find($facture->location_id);

            // Récupérez les détails de la voiture et du client associés à la location
            $voiture = Voiture::find($location->voiture_id);
            $client = Client::find($location->client_id);

            // Ajoutez les détails à la facture
            $facture->voiture = $voiture;
            $facture->client = $client;
        }
      // Passez les factures à la vue
      return view('Facture.ListeFacture', compact('factures'));
    }
   
    public function ListeFacturesClient($id)
    {
        // Récupérez les factures associées à ce client avec les détails de la voiture et du chauffeur
        $factures = Facture::where('client_id', $id)->get();
    
        // Passez les factures à la vue
        return view('Client.ListeFactureClient', compact('factures'));
    }
    
    

    // FactureController.php

public function ImprimerFacture($id)
{
    $facture = Facture::findOrFail($id);

    $location = Location::find($facture->location_id);

    $voiture = Voiture::find($location->voiture_id);
    $client = Client::find($location->client_id);
    $chauffeur = Chauffeur::find($location->chauffeur_id);

    $facture->voiture = $voiture;
    $facture->client = $client;
    $facture->chauffeur = $chauffeur;

    // $view = view('Facture.ExporterFacture', compact('facture'));

    // $pdf = \PDF::loadHtml($view)->setPaper('a4')->setOrientation('portrait');

    // return $pdf->stream('facture.pdf');

    // $pdf = \PDF::loadView('Facture.ExporterFacture', compact('facture'));

    // // Téléchargez le PDF
    // return $pdf->stream('facture.pdf');

    try {
      // Générer la vue PDF
      $pdf = \PDF::loadView('Facture.ExporterFacture', compact('facture'));
      
      // Afficher le PDF dans le navigateur
      return $pdf->stream('facture.pdf');
  } catch (\Exception $e) {
      // Enregistrez l'exception dans les journaux
      \Illuminate\Support\Facades\Log::error($e);
      
      // Renvoyez une réponse appropriée à l'utilisateur, par exemple une page d'erreur
      return response()->view('errors.pdf', ['error' => $e->getMessage()], 500);
  }
}

}
