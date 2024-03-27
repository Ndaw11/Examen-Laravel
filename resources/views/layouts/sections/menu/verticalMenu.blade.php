<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <!-- Masquer la marque de l'application si la barre de navigation est pleine (navbar-full) -->
  <div class="app-brand demo">
      <a href="{{ url('/') }}" class="app-brand-link">
          <span class="app-brand-logo demo me-1 mt-4">
           <h2> CARSERVICE</h2>
          </span>
          {{-- <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ config('variables.templateName') }}</span> --}}
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
          <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
      </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

      <!-- Voitures -->
      <li class="menu-header fw-medium mt-4">
          <span class="menu-header-text">Voitures</span>
      </li>
      <li class="menu-item">
          <a href="#" class="menu-link" data-bs-toggle="collapse" data-bs-target="#carSubMenu">
              <i class="mdi mdi-car"></i>
              <div>Voitures</div>
          </a>
          <ul class="submenu collapse" id="carSubMenu">
              <li><a href="{{ route('ListeVoiture') }}" class="menu-link"><i class="mdi mdi-car"></i> Voitures</a></li>
              <li><a href="{{ route('VoitureEtat') }}" class="menu-link"><i class="mdi mdi-car"></i>Voiture en Etat</a></li>
              <li><a href="{{ route('VoiturePanne')  }}" class="menu-link"><i class="mdi mdi-car"></i>Voitures en panne</a></li>
              <li><a href="{{ route('VoitureDisponible')  }}" class="menu-link"><i class="mdi mdi-car"></i>Voiture disponible</a></li>
              <li><a href="{{ route('VoitureSupprimer')  }}" class="menu-link"><i class="mdi mdi-car"></i>Voiture supprimer</a></li>
          </ul>
      </li>

      <!-- Chauffeurs -->
      <li class="menu-header fw-medium mt-4">
          <span class="menu-header-text">Chauffeurs</span>
      </li>
      <li class="menu-item">
          <a href="#" class="menu-link" data-bs-toggle="collapse" data-bs-target="#driverSubMenu">
              <i class="mdi mdi-account"></i>
              <div>Chauffeurs</div>
          </a>
          <ul class="submenu collapse" id="driverSubMenu">
              <li><a href="{{ Route('ListeChauffeur') }}" class="menu-link"><i class="mdi mdi-account"></i> Chauffeurs</a></li>
          </ul>
      </li>

      <!-- Locations -->
      <li class="menu-header fw-medium mt-4">
          <span class="menu-header-text">Locations</span>
      </li>
      <li class="menu-item">
          <a href="#" class="menu-link" data-bs-toggle="collapse" data-bs-target="#locationSubMenu">
              <i class="mdi mdi-map-marker"></i>
              <div>Locations</div>
          </a>
          <ul class="submenu collapse" id="locationSubMenu">
              <li><a href="{{Route('LocationEnCours') }}" class="menu-link"><i class="mdi mdi-map-marker"></i>Location en cours</a></li>
              <li><a href="{{ Route('ListeLocation') }}" class="menu-link"><i class="mdi mdi-map-marker"></i>Voir les locations</a></li>
          </ul>
      </li>

      <!-- Factures -->
      <li class="menu-header fw-medium mt-4">
          <span class="menu-header-text">Factures</span>
      </li>
      <li class="menu-item">
          <a href="#" class="menu-link" data-bs-toggle="collapse" data-bs-target="#factureSubMenu">
              <i class="mdi mdi-file-document"></i>
              <div>Factures</div>
          </a>
          <ul class="submenu collapse" id="factureSubMenu">
              <li><a href="{{ Route('ListeFacture') }}" class="menu-link"><i class="mdi mdi-file-document"></i>Factures</a></li>

          </ul>
      </li>
      <li class="menu-header fw-medium mt-4">
        <span class="menu-header-text">Clients</span>
    </li>
      <li class="menu-item">
        <a href="#" class="menu-link" data-bs-toggle="collapse" data-bs-target="#clientSubMenu">
            <i class="mdi mdi-account-multiple"></i>
            <div>Clients</div>
        </a>
        <ul class="submenu collapse" id="clientSubMenu">
            <li><a href="{{ route('ListeClients') }}" class="menu-link"><i class="mdi mdi-account-multiple"></i>Liste des clients</a></li>
            <!-- Ajoutez d'autres liens pour les fonctionnalités liées aux clients si nécessaire -->
        </ul>
    </li>
    
 
  <!-- Gestion -->
  <li class="menu-header fw-medium mt-4">
      <span class="menu-header-text">Gestion</span>
  </li>

  <li class="menu-item">
      <a href="#" class="menu-link" data-bs-toggle="collapse" data-bs-target="#gestionSubMenu">
          <i class="mdi mdi-file-document"></i>
          <div>Gestion</div>
      </a>
      <ul class="submenu collapse" id="gestionSubMenu">
          <li><a href="{{ Route('GestionVoiture') }}" class="menu-link"><i class="mdi mdi-file-document"></i> Voiture</a></li>
          <li><a href="{{ Route('GestionChauffeur') }}" class="menu-link"><i class="mdi mdi-file-document"></i> Chauffeur</a></li>
      </ul>
  </li>

</ul>
</aside>