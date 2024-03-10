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

@section('title', 'Liste des Factures du Client')

@section('content')
<div class="row gy-4">
    @foreach($factures as $facture)
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-1">Facture #{{ $facture->id }}</h4>
                <p class="pb-0">Montant: {{ $facture->Montant }} FCFA</p>
                <p class="mb-2 pb-1">Date de Paiement: {{ $facture->DatePaiement }}</p>
                <!-- Ajoutez d'autres détails de la facture si nécessaire -->
                {{-- <a href="{{ route('VoirDetailsFacture', ['id' => $facture->id]) }}" class="btn btn-sm btn-primary">Voir les détails</a> --}}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection