@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier Chauffeur')

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
<div class="row gy-4 d-flex align-items-center justify-content-between">
    <div class="mx-0 flex-grow-0 col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <img src="{{ asset('assets/img/Chauffeur/'.$chauffeur->Photo) }}" alt="Photo du chauffeur" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="mx-0 flex-grow-0 col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <form class="add-new-user pt-0" action="{{ route('ModifierChauffeur', $chauffeur->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="Prenom" value="{{ $chauffeur->Prenom }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nom">Nom</label>
                        <input type="text" id="nom" class="form-control" placeholder="Nom" name="Nom" value="{{ $chauffeur->Nom }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="experience">Expérience</label>
                        <input type="number" id="experience" class="form-control" placeholder="Expérience" name="Experience" value="{{ $chauffeur->Experience }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="n_permit">Numéro de Permis</label>
                        <input type="text" id="n_permit" class="form-control" placeholder="Numéro de Permis" name="NPermit" value="{{ $chauffeur->NPermit }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_emission">Date d'Emission du Permis</label>
                        <input type="date" id="date_emission" class="form-control" placeholder="Date d'Emission du Permis" name="DateEmission" value="{{ $chauffeur->DateEmission }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_expiration">Date d'Expiration du Permis</label>
                        <input type="date" id="date_expiration" class="form-control" placeholder="Date d'Expiration du Permis" name="DateExpiration" value="{{ $chauffeur->DateExpiration }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="categorie">Catégorie</label>
                        <input type="text" id="categorie" class="form-control" placeholder="Catégorie" name="Categorie" value="{{ $chauffeur->Categorie }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_embauche">Date d'Embauche</label>
                        <input type="date" id="date_embauche" class="form-control" placeholder="Date d'Embauche" name="DateEmbauche" value="{{ $chauffeur->DateEmbauche }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_fin_embauche">Date de Fin d'Embauche</label>
                        <input type="date" id="date_fin_embauche" class="form-control" placeholder="Date de Fin d'Embauche" name="DateFinEmbauche" value="{{ $chauffeur->DateFinEmbauche }}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="salaire">Salaire</label>
                        <input type="number" id="salaire" class="form-control" placeholder="Salaire" name="Salaire" value="{{ $chauffeur->Salaire }}" required />
                    </div>

                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Modifier</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
