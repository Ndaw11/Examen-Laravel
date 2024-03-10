@extends('layouts/contentNavbarLayout')

@section('title', 'Voitures en Panne')

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
    @foreach($voituresEnPanne as $voiture)
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <!-- Assuming you have an 'image_path' property for the location's vehicle -->
                    <img src="{{ asset('assets/img/voiture/'.$voiture->Photo) }}" width="250" alt="image de la voiture">
                </div>
                <h4 class="card-title mb-1">{{ $voiture->Marque }} {{ $voiture->Model }}</h4>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
