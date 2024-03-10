<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Chauffeur;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
     public function index()
     {
      $voitures = Voiture::where('Supprimer', false)->get();
      return view('Voiture.ListeVoiture', compact('voitures'));

    }
    public function VoiturePanne()
    {
      $voituresEnPanne = Voiture::where('Panne', true)->where('Supprimer', false)->get();

      // Passez les données à la vue
      return view('Voiture.VoiturePanne', compact('voituresEnPanne'));
    }
    
    public function VoitureDisponible()
    {
      $voitures = Voiture::where('LocationEnCours', false)->where('Supprimer', false)->get();

      // Passez les données à la vue
      return view('Voiture.VoitureDisponible', compact('voitures'));
    }



    public function VoitureEtat()
    {
      $voiture= Voiture::where('Panne', false)->where('Supprimer', false)->get();
      return view('Voiture.VoitureEtat',compact('voiture'));
      
    }

    public function PageModifierVoiture($id)
    {
      $voiture = Voiture::findOrFail($id);
    return view('Voiture.ModifierVoiture', compact('voiture'));
    }

    public function VoirDetails($id)
    {
      $voiture = Voiture::findOrFail($id);
      $chauffeurs = Chauffeur::all();
    return view('Voiture.VoirDetails', compact('voiture','chauffeurs'));
    }

    public function VoirDetailsSupprimer($id)
    {
      $voiture = Voiture::findOrFail($id);
    return view('Voiture.VoirDetailsSupprimer', compact('voiture'));
    }

    public function Gestion()
    {
       $voitures = Voiture::where('Supprimer', false)->get();
      return view('Voiture.Gestion', compact('voitures'));
      
    }
    public function Ajouter(Request $request){
      $request->validate([
        'Marque' => 'required',
        'Model' => 'required',
        'Matricule' => 'required',
        'DateAchat' => 'required',
        'MontantAchat' => 'required',
        'KmDefaut' => 'required',
        'LocationJours' => 'required',
        'Categorie' => 'required',
        'Photo' => 'required',
        // Ajoutez d'autres règles de validation au besoin
    ]);

    $Voiture =new Voiture([
      'Marque' => $request->get('Marque'),
      'Model' => $request->get('Model'),
      'Matricule' => $request->get('Matricule'),
      'DateAchat' => $request->get('DateAchat'),
      'MontantAchat' => $request->get('MontantAchat'),
      'KmDefaut' => $request->get('KmDefaut'),
      'LocationJours' => $request->get('LocationJours'),
      'KmParcouru' => $request->get('KmParcouru',0),
      'Categorie' => $request->get('Categorie'),
      'LocationEnCours' => false, // Par défaut à false
      'Photo' => $request->get('Photo'),
      'Panne' => $request->get('Panne', false),
      'Supprimer' => $request->get('Supprimer', false), // Par défaut à false s'il n'est pas fourni
  ]);
  
  $Voiture->save();

  // Redirection avec un message de succès
  return redirect()->back()->with('reussi', 'Enregistrement réussi !');

    }

    public function EtatVoiture($id)
    {
        // Trouvez la voiture par son ID
        $voiture = Voiture::findOrFail($id);
    
       // Vérifiez l'état actuel de la propriété Panne
    $nouvelEtat = !$voiture->Panne;

    // Mettez à jour la voiture avec le nouvel état de la propriété Panne
    $voiture->update(['Panne' => $nouvelEtat]);
    
        // Redirigez ou effectuez d'autres actions après avoir mis la voiture en panne
        return redirect()->back()->with('success', 'Voiture mise en panne avec succès');
    }
    
    public function ModifierVoiture(Request $request, $id)
    {
        // Validez les données du formulaire (à adapter selon vos besoins)
        $request->validate([
            'Marque' => 'required',
            'Model' => 'required',
            'Matricule' => 'required',
            'DateAchat' => 'required',
            'MontantAchat' => 'required',
            'KmDefaut' => 'required',
            'LocationJours' => 'required',
            'Categorie' => 'required',
            'Photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ajoutez une validation pour le champ Photo
            // Ajoutez les autres champs du formulaire
        ]);
    
        // Récupérez la voiture à mettre à jour
        $voiture = Voiture::findOrFail($id);
    
        // Mettez à jour tous les champs de la voiture
        $voiture->update([
            'Marque' => $request->input('Marque'),
            'Model' => $request->input('Model'),
            'Matricule' => $request->input('Matricule'),
            'DateAchat' => $request->input('DateAchat'),
            'MontantAchat' => $request->input('MontantAchat'),
            'KmDefaut' => $request->input('KmDefaut'),
            'LocationJours' => $request->input('LocationJours'),
            'Categorie' => $request->input('Categorie'),
            // Ajoutez les autres champs du formulaire
        ]);
    
        // Gérez la mise à jour de la photo s'il y a un fichier téléchargé
        //  if ($request->hasFile('Photo')) {
        //      $photo = $request->file('Photo')->store('\public\assets\img\voiture', 'public'); // Par exemple, 'public'
        //      $voiture->update(['Photo' => $photo]);
        // }
    
        // Redirigez l'utilisateur ou effectuez d'autres actions nécessaires
        return redirect()->route('GestionVoiture');
    }
    public function SupprimerVoiture($id)
{
    // Trouvez la voiture par son ID
    $voiture = Voiture::findOrFail($id);
    $voiture->update(['Supprimer' => true]);

    // Redirigez l'utilisateur ou effectuez d'autres actions nécessaires
    return redirect()->route('GestionVoiture')->with('success', 'Voiture supprimée avec succès');
}
public function VoitureSupprimer()
{
    // Trouvez la voiture par son ID
    $voitures = Voiture::where('Supprimer', true)->get();

    // Redirigez l'utilisateur ou effectuez d'autres actions nécessaires
    return view('Voiture.VoitureSupprimer', compact('voitures'));
}

}
