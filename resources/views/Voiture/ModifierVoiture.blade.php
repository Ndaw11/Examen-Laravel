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
<div class="row gy-4 d-flex align-items-center justify-content-between">
    <div class="mx-0 flex-grow-0 col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <img src="{{ asset('assets/img/voiture/'.$voiture->Photo) }}" alt="Photo de la voiture" class="img-fluid  ">
            </div>
        </div>
    </div>
<div class="mx-0 flex-grow-0 col-md-4">
    <div class="card shadow">
        <div class="card-body">
            <form class="add-new-user pt-0" id="" action="{{ route('ModifierVoiture', $voiture->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="add-user-fullname">Marque</label>
                    <input type="text" class="form-control" id="add-user-fullname" placeholder="Marque" name="Marque" aria-label="Marque" value="{{ $voiture->Marque }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-email">Modèle</label>
                    <input type="text" id="add-user-email" class="form-control" placeholder="Modèle" aria-label="Modèle" name="Model" value="{{ $voiture->Model }}" required/>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="add-user-email">Matricule</label>
                    <input type="text" id="add-user-email" class="form-control" placeholder="Matricule" aria-label="Matricule" name="Matricule" value="{{ $voiture->Matricule }}" required/>
                </div>
                <!-- Ajoutez les autres champs du formulaire avec leurs valeurs -->
                <div class="mb-3">
                    <label class="form-label" for="add-user-contact">Date Achat</label>
                    <input type="date" id="add-user-contact" class="form-control" placeholder="Date Achat" aria-label="Date Achat" name="DateAchat" value="{{ $voiture->DateAchat }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-company">Montant Achat</label>
                    <input type="text" id="add-user-company" name="MontantAchat" class="form-control" placeholder="Montant Achat" aria-label="Montant Achat" value="{{ $voiture->MontantAchat }}" required/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-company">Kilometre Defaut</label>
                    <input type="text" id="add-user-company" name="KmDefaut" class="form-control" placeholder="Kilometre Defaut" aria-label="Kilometre Defaut" value="{{ $voiture->KmDefaut }}" required/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-company">Location Jours</label>
                    <input type="text" id="add-user-company" name="LocationJours" class="form-control" placeholder="Location Jours" aria-label="Location Jours" value="{{ $voiture->LocationJours }}" required/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-email">Catégorie</label>
                    <input type="text" id="add-user-email" class="form-control" placeholder="Catégorie" aria-label="Catégorie" name="Categorie" value="{{ $voiture->Categorie }}" required/>
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="add-user-email">Photo</label>
                    <input type="file" name="Photo" class="form-control " placeholder="Photo">
                </div> --}}
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Modifier</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
            </form>
        </div>
    </div>
</div>

    </div>
    


@endsection
