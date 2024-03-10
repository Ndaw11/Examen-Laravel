@extends('layouts/contentNavbarLayout')



@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('title', 'Liste des Clients')

@section('content')
<div class="row gy-4">
    @foreach($clients as $client)
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-1">{{ $client->Prenom }} {{ $client->Nom }}</h4>
                <p class="pb-0">Email: {{ $client->Email }}</p>
                <p class="mb-2 pb-1">Téléphone: {{ $client->Telephone }}</p>
                <!-- Ajoutez d'autres détails du client si nécessaire -->
                <a href="{{ route('ListeFacturesClient', ['id' => $client->id]) }}" class="btn btn-sm btn-primary">Voir facture</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection