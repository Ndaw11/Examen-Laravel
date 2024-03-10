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

@endsection

@section('content')
<div class="row gy-4">
   
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex justify-content-center m-3 ">
                    <img src="{{ asset('assets\img\Chauffeur\chauffeur3.png') }}" width="100" height="100" alt="image du chauffeur">
                </div>
                <div class="card-body">
                    <!-- Ajoutez ici les détails du chauffeur -->
                    <div class="d-flex">
                    <div class="m-3">
                        <h4 class="text-center">IDENTIFICATION</h4>
                      <label for="">Prenom :</label>  <h4 class="card-title mb-1">{{ $chauffeurs->Prenom }} </h4>
                      <label for="">Nom :</label>  <h4 class="card-title mb-1">{{ $chauffeurs->Nom }}</h4>
                      
                        <p class="pb-0">Expérience: {{ $chauffeurs->Experience }} ans</p>
                    </div>

                    <div class="m- ">
                        <h4 class="text-center">PERMIT</h4>
                        <h4 class="text-primary mb-1">Nm Permis : {{ $chauffeurs->NPermit }}</h4>
                        <p class="pb-0 ">Date Emission : {{ $chauffeurs->DateEmission }} </p>
                        <p class="pb-0 ">Date Expiration : {{ $chauffeurs->DateExpiration }}</p>
                        <p class="pb-0 ">Categorie: {{ $chauffeurs->Categorie }} </p></div>
                    
                    <div class="m-3">
                        <h4 class="text-center">CONTRAT</h4>
                        <p class="pb-0">Debut Contrat : {{ $chauffeurs->DateEmbauche }} </p>
                        <p class="pb-0">Fin Contrat : {{ $chauffeurs->DateFinEmbauche }} </p>
                        <p class="pb-0">Salaire : {{ $chauffeurs->Salaire }} FCFA</p>
                        <!-- Ajoutez d'autres détails si nécessaire --></div>
                    </div>
                    <a href="javascript:;" class="btn btn-sm btn-primary">Voir les détails</a>
                    <!-- Assuming you have an 'image_path' property for the chauffeur's image -->
                   
                </div>
            </div>
        </div>

</div>
@endsection