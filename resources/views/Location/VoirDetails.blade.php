@extends('layouts/contentNavbarLayout')

@section('title', 'Détails de la Location')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
</script>
@endsection

@section('content')
<div class="row gy-4">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-1">Location de Voiture</h4>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ asset('assets/img/voiture/'.$locations->voiture->Photo) }}" class="scaleX-n1-rtl bottom-0 end-0" width="170" height="100" alt="image de la voiture">
                    </div>

                    <!-- Afficher les détails de la voiture -->
                    <p class="pb-0">Véhicule: {{ $locations->voiture->Marque }} {{ $locations->voiture->Model }}</p>

                    <h4 class="text-primary mb-1">Durée de Location : {{ $locations->DureeJours }} jours</h4>
                    <p class="mb-2 pb-1">Date de Début: {{ $locations->DateDebut }}</p>
                    <p class="mb-2 pb-1">Date de Fin: {{ $locations->DateFin }}</p>
                    <p class="mb-2 pb-1">Heure de Début: {{ $locations->HeureDebut }}</p>
                    <p class="mb-2 pb-1">Heure de Fin: {{ $locations->HeureFin }}</p>

                    <!-- Afficher les détails du client -->
                    <p class="mb-2 pb-1">Client: {{ $locations->client->Prenom }} {{ $locations->client->Nom }}</p>
                    <p class="mb-2 pb-1">Tél client: {{ $locations->client->Telephone }} </p>
                    <p class="mb-2 pb-1">Client email: {{ $locations->client->Email }}</p>

                    <!-- Afficher les détails du chauffeur -->
                    <p class="mb-2 pb-1">Chauffeur: {{ $locations->chauffeur->Prenom }} {{ $locations->chauffeur->Nom }}</p>
                    <p class="mb-2 pb-1">Chauffeur experience: {{ $locations->chauffeur->Experience}}</p>
                    <p class="mb-2 pb-1">Chauffeur date fin embauche: {{ $locations->chauffeur->DateFinEmbauche }}</p>
                    <p class="mb-2 pb-1">Chauffeur expiration permit: {{ $locations->chauffeur->DateExpiration }} </p>

                    <!-- Ajoutez d'autres détails de la location si nécessaire -->
                    <a href="" class="btn btn-sm btn-primary">Voir les détails</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
