<!-- resources/views/factures/liste.blade.php -->

@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des Factures de Location')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
</script>
@endsection

@section('content')
<div class="row gy-4">
    @foreach($factures as $facture)
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-1">Facture #{{ $facture->id }}</h4>
                <p class="pb-0">Date: {{ $facture->DatePaiement }}</p>
                <h4 class="text-primary mb-1">Montant: {{ $facture->Montant }} FCFA</h4>

                <!-- Ajoutez cette partie pour afficher le nom et le prénom du client -->

                <a href="{{ route('ImprimerFacture', ['id' => $facture->id]) }}" class="btn btn-sm btn-primary" target="_blank">Imprimer</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
