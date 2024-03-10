@extends('layouts/contentNavbarLayout')

@section('title', 'Accueil')

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
    @foreach($locations as $location)
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-1">Location de Voiture</h4>
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset('assets/img/voiture/'.$location->voiture->Photo) }}" class="scaleX-n1-rtl bottom-0 end-0" width="170" height="100" alt="image de la voiture">
                </div>
                <!-- Afficher les détails de la voiture -->
                <p class="pb-0">Véhicule: {{ $location->voiture->Marque }} {{ $location->voiture->Model }}</p>

                <h4 class="text-primary mb-1">Informations</h4>
                <p class="mb-2 pb-1">Date de Fin: {{ $location->DateFin }}</p>
                <!-- Afficher les détails du chauffeur -->
            <p class="mb-2 pb-1">Heure Fin: {{ $location->HeureFin}}</p>
                <!-- Afficher les détails du client -->
                <p class="mb-2 pb-1">Client: {{ $location->client->Prenom }} {{ $location->client->Nom }} {{ $location->client->Telephone }}</p>
                <!-- Afficher les détails du chauffeur -->
                <p class="mb-2 pb-1">Chauffeur: {{ $location->chauffeur->Prenom }} {{ $location->chauffeur->Nom }}</p>
  
           
@if(\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($location->DateFin . ' ' . $location->HeureFin))) 
<form action="{{ route('TerminerLocation', ['id' => $location->id]) }}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm btn-danger">Terminer</button>
</form>    
 @else 
  <!-- Bouton désactivé car la date de fin n'est pas passée -->
   <button class="btn btn-sm btn-danger" disabled>Terminer</button> 
@endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

