@extends('layouts/contentNavbarLayout')

@section('title', 'Détails de la Voiture')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<script>
    function toggleRentalForm() {
        var rentalForm = document.getElementById('rentalForm');
        rentalForm.classList.toggle('show');
    }
    function toggleSidebar() {
    var sidebarr = document.getElementById('sidebarr');
    var body = document.body;

    sidebarr.classList.toggle('show');
    body.classList.toggle('overlay');

    // Ajoutez le code nécessaire pour ouvrir/fermer la sidebar ici
}
</script>
</script>
@endsection

@section('content')
<div class="row gy-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <!-- Assuming you have an 'image_path' property for the car's image -->
                    <img src="{{ asset('assets/img/voiture/'.$voiture->Photo) }}" width="250" alt="image de la voiture">
                </div>
                <div class="d-flex">
                    <div class="p-1">
                        <h4 class="card-title mb-1">Marque : {{ $voiture->Marque }} </h4>
                        <p class="pb-2 mb-1">Modele : {{ $voiture->Model }}</p>
                        <h4 class="text-primary mb-1">Prix de la voiture : {{ $voiture->MontantAchat }} FCFA</h4>
                        <p class="mb-2 pb-2">Année de fabrication : {{ $voiture->DateAchat }}</p>
                    </div>
                    <div class="p-1">
                        <p class="mb-2 pb-2">Prix loaction 24H : {{ $voiture->LocationJours }} FCFA</p>
                        <p class="mb-2 pb-2">Matricule : {{ $voiture->Matricule }}</p>
                        <p class="mb-2 pb-2">Km Defaut : {{ $voiture->KmDefaut }}</p>
                    </div>
                    <div class="p-1">
                        <p class="mb-2 pb-2">Prix loaction 24H : {{ $voiture->LocationJours }} FCFA</p>
                        <p class="mb-2 pb-2">Matricule : {{ $voiture->Matricule }}</p>
                        <p class="mb-2 pb-2">Km Defaut : {{ $voiture->KmDefaut }}</p>
                        <p class="mb-2 pb-2">Km Parcouru : {{ $voiture->KmParcouru }}</p>
                    </div>
                </div>
                @if($voiture->Panne==true || $voiture->LocationEnCours==true)
          <!-- Button to initiate the rental process -->
          <button type="button" class="btn btn-danger w-20" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" disabled>Pas disponible</button>
          @else
              <!-- Button to initiate the rental process (activé si la voiture n'est pas en panne) -->
              <button type="button" class="btn btn-primary w-20" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">Louer cette voiture</button>
        @endif    
            </div>
        </div>
    </div>
</div>

 <!-- Offcanvas to add new user -->
 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="form-louer-voiture" action="{{route('LouerVoiture')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Nom client</label>
                <input type="text" class="form-control" id="add-user-fullname" placeholder="Nom" name="Nom" aria-label="Nom" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Prénom client</label>
                <input type="text" id="add-user-email" class="form-control" placeholder="Prénom" aria-label="Prénom" name="Prenom" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Email</label>
                <input type="email" id="add-user-email" class="form-control" placeholder="Email" aria-label="Email" name="Email" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Voiture</label>
            <input type="number" name="voiture_id" value="{{ $voiture->id }}">
        </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-contact">Téléphone</label>
                <input type="tel" id="add-user-contact" class="form-control" placeholder="Téléphone" aria-label="Téléphone" name="Telephone" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Lieu de départ</label>
                <input type="text" id="add-user-company" name="LieuDepart" class="form-control" placeholder="Lieu de départ" aria-label="Lieu de départ" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Lieu d'arrivée</label>
                <input type="text" id="add-user-company" name="LieuArrive" class="form-control" placeholder="Lieu d'arrivée" aria-label="Lieu d'arrivée" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Distance</label>
                <input type="text" id="add-user-company" name="Distance" class="form-control" placeholder="Distance" aria-label="Distance" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Date de début</label>
                <input type="date" id="add-user-email" class="form-control" placeholder="Date de début" aria-label="Date de début" name="DateDebut" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Heure de début</label>
                <input type="time" id="add-user-email" class="form-control" placeholder="Heure de début" aria-label="Heure de début" name="HeureDebut" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Date de fin</label>
                <input type="date" id="add-user-email" class="form-control" placeholder="Date de fin" aria-label="Date de fin" name="DateFin" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Heure de fin</label>
                <input type="time" id="add-user-email" class="form-control" placeholder="Heure de fin" aria-label="Heure de fin" name="HeureFin" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Montant</label>
                <input type="number" id="add-user-email" class="form-control" placeholder="Montant" aria-label="Heure de fin" name="Montant" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Moyen de paiement</label>
                <input type="text" id="add-user-email" class="form-control" placeholder="Moyen de paiement" aria-label="Heure de fin" name="MoyenPaiement" required/>
            </div>
           <!-- ... Autres champs du formulaire ... -->
<div class="mb-3 dropup">
    <label class="form-label" for="add-chauffeur">Chauffeur</label>
    <select class="form-select" id="add-chauffeur" name="id_chauffeur" required>
        <!-- Remplacez les options par la liste réelle des chauffeurs -->
        <option value="" selected disabled>Sélectionner un chauffeur</option>
        {{-- @foreach($chauffeurs as $chauffeur)
            @if(\Carbon\Carbon::now()->lte($chauffeur->DateExpiration)) <!-- Vérifiez si la date d'expiration n'est pas encore passée -->
                <option value="{{ $chauffeur->id }}">{{ $chauffeur->Prenom }} {{ $chauffeur->Nom }}</option>
            @endif
        @endforeach --}}
        @foreach($chauffeurs as $chauffeur)
        @php
            $expirationPassee = \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($chauffeur->DateExpiration));
            $finEmbauchePassee = \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($chauffeur->DateFinEmbauche));
            // Convertir la catégorie de la voiture en une forme normalisée (minuscules, sans accents):Cela utilise la méthode ascii de la classe Str pour supprimer les accents de la chaîne.
            $categorieVoiture = \Illuminate\Support\Str::lower(\Illuminate\Support\Str::ascii($voiture->Categorie));
            $categorieChauffeur = \Illuminate\Support\Str::lower(\Illuminate\Support\Str::ascii($chauffeur->Categorie));
        @endphp
    
        @if(!$expirationPassee && !$finEmbauchePassee && $chauffeur->Occuper==false)
            @if(($categorieVoiture == 'lourd' && $categorieChauffeur == 'lourd') || ($categorieVoiture == 'leger' && $categorieChauffeur == 'leger'))
                <option value="{{ $chauffeur->id }}">{{ $chauffeur->Prenom }} {{ $chauffeur->Nom }}</option>
            @endif
        @endif
    @endforeach
    
    </select>
</div>
<!-- ... Autres champs du formulaire ... -->

            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Louer</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
        
        
    </div>
  </div>

@endsection
