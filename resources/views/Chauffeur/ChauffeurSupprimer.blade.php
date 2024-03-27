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
@endsection

@section('content')
<div class="row gy-4">
    @foreach($chauffeurs as $item => $chauffeur)
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-1">{{ $chauffeur->Prenom }} {{ $chauffeur->Nom }}</h4>
                    <p class="pb-0">Expérience: {{ $chauffeur->Experience }} ans</p>
                    <h4 class="text-primary mb-1">Numéro de permis : {{ $chauffeur->NPermit }}</h4>
                    <p class="mb-2 pb-1">Catégorie : {{ $chauffeur->Categorie }}</p>
                    <!-- Add other details if needed -->
                    <a href="{{Route('VoirDetailsChauffeur', ['id' => $chauffeur->id])}}" class="btn btn-sm btn-primary">Voir les détails</a>
                    <div class="position-absolute bottom-0 end-0 p-1">
                        <!-- Assuming you have an 'image_path' property for the chauffeur's image -->
                        <img src="{{ asset('assets\img\Chauffeur\chauffeur3.png') }}" width="60" alt="image du chauffeur">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
