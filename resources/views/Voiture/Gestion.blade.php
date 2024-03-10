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
        <button type="button" class="btn btn-primary w-20" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">Ajouter une voiture</button>

<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Search Filter</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table">
        <thead class="table-light">
            <tr>
              
                <th>Marque</th>
                <th>Model</th>
                <th>Date Achat</th>
                <th>Montant Achat</th>
                <th>Matricule</th>
                <th>Km Default</th>
                <th>Categorie</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voitures as $item=>$voiture)
                <tr>
                   
                    <td>{{ $voiture->Marque }}</td>
                    <td>{{ $voiture->Model }}</td>
                    <td>{{ $voiture->DateAchat }}</td>
                    <td>{{ $voiture->MontantAchat }}</td>
                    <td>{{ $voiture->Matricule }}</td>
                    <td>{{ $voiture->KmDefaut }}</td>
                    <td>{{ $voiture->Categorie }}</td>
                    <td><img src="{{ asset('assets/img/voiture/'.$voiture->Photo) }}" class="scaleX-n1-rtl bottom-0 end-0" width="100" alt="image de la voiture"></td>
                    <td> <form action="{{Route('MettreEnpanne', ['id' => $voiture->id])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-md btn-icon edit-record "  onclick="return confirm('Êtes-vous sûr de vouloir mettre cette voiture en panne ?')">
                            @if($voiture->Panne==false)
                            <i class="mdi mdi-check mdi-20px text-success w-4"></i> <!-- Icône pour voiture en panne -->
                        @else
                            <i class="mdi mdi-close mdi-20px text-danger"></i> <!-- Icône pour voiture non en panne -->
                        @endif
                        </button>
                    </form> 
                    <a href="{{ route('PageModifierVoiture', ['id' => $voiture->id]) }}" class="btn btn-md btn-icon edit-record">
                        <i class="mdi mdi-pencil-outline mdi-20px"></i>
                    </a>
                    <form action="{{ route('SupprimerVoiture', ['id' => $voiture->id]) }}" method="post">
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
        <form class="add-new-user pt-0" id="" action="{{Route('AjouterVoiture')}}" method="post" >
            @csrf
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Marque</label>
                <input type="text" class="form-control" id="add-user-fullname" placeholder="Marque" name="Marque" aria-label="Marque" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Modèle</label>
                <input type="text" id="add-user-email" class="form-control" placeholder="Modèle" aria-label="Modèle" name="Model" required/>
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Matricule</label>
                <input type="text" id="add-user-email" class="form-control" placeholder="Modèle" aria-label="Modèle" name="Matricule" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-contact">Date Achat</label>
                <input type="date" id="add-user-contact" class="form-control" placeholder="Date Achat" aria-label="Date Achat" name="DateAchat" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Montant Achat</label>
                <input type="text" id="add-user-company" name="MontantAchat" class="form-control" placeholder="Montant Achat" aria-label="Montant Achat" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Kilometre Defaut</label>
                <input type="text" id="add-user-company" name="KmDefaut" class="form-control" placeholder="Montant Achat" aria-label="Montant Achat" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Location Jours</label>
                <input type="text" id="add-user-company" name="LocationJours" class="form-control" placeholder="LocationJours" aria-label="Montant Achat" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Catégorie</label>
                <input type="text" id="add-user-email" class="form-control" placeholder="Catégorie" aria-label="Catégorie" name="Categorie" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Photo</label>
                <input type="file" name="Photo" class="form-control " placeholder="Photo">
               </div>
            {{-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="add-user-panne" name="Panne">
                <label class="form-check-label" for="add-user-panne">En panne</label>
            </div> --}}
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Ajouter</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
        
    </div>
  </div>

</div>
          </div>

</div>

@endsection
