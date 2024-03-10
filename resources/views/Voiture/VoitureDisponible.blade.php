@extends('layouts/contentNavbarLayout')

@section('title', 'Accueil')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row gy-4">
    @foreach($voitures as $item=>$voiture)
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('assets/img/voiture/'.$voiture->Photo) }}" class="scaleX-n1-rtl bottom-0 end-0" width="170" height="100" alt="image de la voiture">
                </div>
                <h4 class="card-title mb-1">{{ $voiture->Marque }} </h4>
                <p class="pb-0">{{ $voiture->Model }}</p>
                <h4 class="text-primary mb-1">Acheté à :{{ $voiture->MontantAchat }} FCFA</h4>
                <p class="mb-2 pb-1">Acheté le : {{ $voiture->DateAchat }}</p>
                <a href="{{ route('VoirDetails', ['id' => $voiture->id]) }}" class="btn btn-sm btn-primary">Voir les détails</a>
            </div>
            
        </div>
    </div>
    @endforeach
</div>
@endsection
