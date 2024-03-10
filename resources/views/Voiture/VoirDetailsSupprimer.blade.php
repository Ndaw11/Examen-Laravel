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
                
            </div>
        </div>
    </div>
</div>

@endsection
