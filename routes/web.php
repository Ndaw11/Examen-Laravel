<?php

use App\Models\Location;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ChauffeurController;



//Voiture
Route::get('/', [VoitureController::class, 'index'])->name('ListeVoiture');
Route::get('/VoiturePanne', [VoitureController::class, 'VoiturePanne'])->name('VoiturePanne');
Route::get('/VoitureDisponible', [VoitureController::class, 'VoitureDisponible'])->name('VoitureDisponible');
Route::get('/VoitureEtat', [VoitureController::class, 'VoitureEtat'])->name('VoitureEtat');
Route::get('/voiture/{id}/details', [VoitureController::class, 'VoirDetails'])->name('VoirDetails');
Route::get('/GestionVoiture', [VoitureController::class, 'Gestion'])->name('GestionVoiture');
Route::get('/PageModifierVoiture/{id}', [VoitureController::class, 'PageModifierVoiture'])->name('PageModifierVoiture');
Route::post('/ModifierVoiture/{id}', [VoitureController::class, 'ModifierVoiture'])->name('ModifierVoiture');
Route::post('/AjouterVoiture', [VoitureController::class, 'Ajouter'])->name('AjouterVoiture');
Route::post('/MettreEnpanne/{id}', [VoitureController::class, 'EtatVoiture'])->name('MettreEnpanne');
Route::get('/VoitureSupprimer', [VoitureController::class, 'VoitureSupprimer'])->name('VoitureSupprimer');
Route::post('/SupprimerVoiture/{id}', [VoitureController::class, 'SupprimerVoiture'])->name('SupprimerVoiture');
Route::get('/voitureDetailsSupprimer/{id}', [VoitureController::class, 'VoirDetailsSupprimer'])->name('VoirDetailsSupprimer');

//Chauffeur
Route::get('/ListeChauffeur', [ChauffeurController::class, 'index'])->name('ListeChauffeur');
Route::post('/AjouterChauffeur', [ChauffeurController::class, 'Ajouter'])->name('AjouterChauffeur');
Route::get('/GestionChauffeur', [ChauffeurController::class, 'Gestion'])->name('GestionChauffeur');
Route::get('/Chauffeur/{id}/details', [ChauffeurController::class, 'Voir'])->name('VoirDetailsChauffeur');

//Location
Route::get('/ListeLocation', [LocationController::class, 'index'])->name('ListeLocation');
Route::get('/LocationEnCours', [LocationController::class, 'LocationEnCours'])->name('LocationEnCours');
Route::post('/LouerVoiture', [LocationController::class, 'louervoiture'])->name('LouerVoiture');
Route::get('/Location/{id}/Details', [LocationController::class, 'DetailsLocation'])->name('DetailsLocation');
Route::get('/TerminerLocation/{id}/ICI', [LocationController::class, 'TerminerLocation'])->name('TerminerLocation');

//Facture
Route::get('/ListeFacture', [FactureController::class, 'index'])->name('ListeFacture');
Route::get('/ImprimerFacture/{id}', [FactureController::class, 'ImprimerFacture'])->name('ImprimerFacture');
Route::get('/Factures/client/{id}', [FactureController::class, 'ListeFacturesClient'])->name('ListeFacturesClient');

//Client
Route::get('/ListeClients', [ClientController::class, 'ListeClients'])->name('ListeClients');
Route::get('/VoirFacture/{id}', [ClientController::class, 'VoirFacture'])->name('VoirFacture');

