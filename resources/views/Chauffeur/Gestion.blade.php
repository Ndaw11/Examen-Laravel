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

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        <button type="button" class="btn btn-primary w-20" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">Ajouter un chauffeur</button>

<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Search Filter</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table">
        <thead class="table-light">
            <tr>
                
                <th>Prénom</th>
                <th>Nom</th>
                <th>Expérience</th>
                <th>Nm Permis</th>
                <th>Emission</th>
                <th>Expiration</th>
                <th>Catégorie</th>
                <th>Debut Embauche</th>
                <th>Fin Embauche</th>
                <th>Salaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chauffeurs as $item => $chauffeur)
            <tr>

                <td>{{ $chauffeur->Prenom }}</td>
                <td>{{ $chauffeur->Nom }}</td>
                <td>{{ $chauffeur->Experience }}</td>
                <td>{{ $chauffeur->NPermit }}</td>
                <td>{{ $chauffeur->DateEmission }}</td>
                <td>{{ $chauffeur->DateExpiration }}</td>
                <td>{{ $chauffeur->Categorie }}</td>
                <td>{{ $chauffeur->DateEmbauche }}</td>
                <td>{{ $chauffeur->DateFinEmbauche }}</td>
                <td>{{ $chauffeur->Salaire }}</td>
                <td>
                     <!-- Modifier -->
            <a href="{{ route('PageModifierChauffeur', ['id' => $chauffeur->id]) }}" class="btn btn-md btn-icon edit-record">
                <i class="mdi mdi-pencil-outline mdi-20px"></i>
            </a>

            <!-- Supprimer -->
            <form action="{{ route('SupprimerChauffeur', ['id' => $chauffeur->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-md btn-icon edit-record">
                    <i class="mdi mdi-delete mdi-20px text-danger"></i>
                </button>
            </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-chauffeur pt-0" action="{{ route('AjouterChauffeur') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-prenom">Prénom</label>
                <input type="text" class="form-control" id="add-chauffeur-prenom" placeholder="Prénom" name="Prenom" aria-label="Prénom" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-nom">Nom</label>
                <input type="text" class="form-control" id="add-chauffeur-nom" placeholder="Nom" name="Nom" aria-label="Nom" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-experience">Expérience</label>
                <input type="number" class="form-control" id="add-chauffeur-experience" placeholder="Expérience" name="Experience" aria-label="Expérience" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-n-permit">Numéro de Permis</label>
                <input type="text" class="form-control" id="add-chauffeur-n-permit" placeholder="Numéro de Permis" name="NPermit" aria-label="Numéro de Permis" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-date-emission">Date d'émission</label>
                <input type="date" class="form-control" id="add-chauffeur-date-emission" placeholder="Date d'émission" name="DateEmission" aria-label="Date d'émission" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-date-expiration">Date d'expiration</label>
                <input type="date" class="form-control" id="add-chauffeur-date-expiration" placeholder="Date d'expiration" name="DateExpiration" aria-label="Date d'expiration" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-categorie">Catégorie</label>
                <input type="text" class="form-control" id="add-chauffeur-categorie" placeholder="Catégorie" name="Categorie" aria-label="Catégorie" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-date-embauche">Date d'embauche</label>
                <input type="date" class="form-control" id="add-chauffeur-date-embauche" placeholder="Date d'embauche" name="DateEmbauche" aria-label="Date d'embauche" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-date-embauche">Date fin d'embauche</label>
                <input type="date" class="form-control" id="add-chauffeur-date-embauche" placeholder="Date d'embauche" name="DateFinEmbauche" aria-label="Date d'embauche" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-chauffeur-salaire">Salaire</label>
                <input type="text" class="form-control" id="add-chauffeur-salaire" placeholder="Salaire" name="Salaire" aria-label="Salaire" required />
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Ajouter</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
        
    </div>
  </div>
</div>
          </div>

</div>
@endsection
