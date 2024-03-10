<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function index()
    {
      $chauffeurs = Chauffeur::all();
      return view('Chauffeur.ListeChauffeur',compact( 'chauffeurs'));
    }

    public function Voir($id)
{
    $chauffeurs = Chauffeur::find($id);
    return view('Chauffeur.VoirDetails', compact('chauffeurs'));
}

    public function Gestion()
    {
      $chauffeurs = Chauffeur::all();
      return view('Chauffeur.Gestion',compact( 'chauffeurs'));
    }

    public function Ajouter(Request $request)
{
    $request->validate([
        'Prenom' => 'required',
        'Nom' => 'required',
        'Experience' => 'required',
        'NPermit' => 'required',
        'DateEmission' => 'required',
        'DateExpiration' => 'required',
        'Categorie' => 'required',
        'DateEmbauche' => 'required',
        'DateFinEmbauche' => 'required',
        'Salaire' => 'required',
        // Ajoutez d'autres règles de validation au besoin
    ]);

    $chauffeur = new Chauffeur([
        'Prenom' => $request->get('Prenom'),
        'Nom' => $request->get('Nom'),
        'Experience' => $request->get('Experience'),
        'NPermit' => $request->get('NPermit'),
        'DateEmission' => $request->get('DateEmission'),
        'DateExpiration' => $request->get('DateExpiration'),
        'Categorie' => $request->get('Categorie'),
        'DateEmbauche' => $request->get('DateEmbauche'),
        'DateFinEmbauche' => $request->get('DateFinEmbauche'),
        'Salaire' => $request->get('Salaire'),
        // Ajoutez d'autres attributs si nécessaire
    ]);

    $chauffeur->save();

    // Redirection avec un message de succès
    return redirect()->back()->with('reussi', 'Enregistrement réussi pour le chauffeur !');
}
}
