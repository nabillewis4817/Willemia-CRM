@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="container-fluid">

    {{-- Section bienvenue --}}
    <div class="row mb-4">
        <div class="col-12 d-flex align-items-center justify-content-between bg-white p-4 shadow-sm rounded">
            <div>
                <h2 class="text-primary">
                    <i class="bi bi-speedometer2 me-2"></i> Bienvenue sur Dodibo CRM
                </h2>
                <p class="text-muted mb-0">Gérez vos clients, offres, projets et bien plus en un seul endroit.</p>
            </div>
            <div class="dropdown">
                <button class="btn btn-link text-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                    </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/9068/9068679.png" alt="dashboard" width="100">
        </div>
    </div>

    {{-- Cards stats --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-start border-success border-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-people-fill me-2 text-success"></i> Clients actifs
                    </h5>
                    <h3 class="fw-bold">154</h3>
                    <p class="text-muted mb-0">Ce mois</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-start border-warning border-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-file-earmark-text-fill me-2 text-warning"></i> Offres envoyées
                    </h5>
                    <h3 class="fw-bold">27</h3>
                    <p class="text-muted mb-0">En attente</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-start border-danger border-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i> Tickets ouverts
                    </h5>
                    <h3 class="fw-bold">5</h3>
                    <p class="text-muted mb-0">À traiter rapidement</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-start border-primary border-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-bar-chart-line-fill me-2 text-primary"></i> Revenus (FCFA)
                    </h5>
                    <h3 class="fw-bold">2 480 000</h3>
                    <p class="text-muted mb-0">Ce mois</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Activités récentes --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history me-2 text-secondary"></i> Activité récente
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item">
                            <i class="bi bi-check2-circle text-success me-2"></i> Nouvelle offre envoyée à <strong>Gucci</strong>.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-credit-card-2-front text-primary me-2"></i> Paiement reçu : 75 000 FCFA.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-person-plus-fill text-info me-2"></i> Nouveau client enregistré : <strong>AlphaTech</strong>.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-exclamation-circle-fill text-danger me-2"></i> Ticket #245 toujours ouvert depuis 2 jours.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
