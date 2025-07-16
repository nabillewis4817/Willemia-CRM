<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dodibo CRM')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dodibo CRM</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <aside class="col-md-3 col-lg-2 bg-white shadow-sm py-4 border-end min-vh-100">
                <ul class="nav flex-column px-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="bi bi-speedometer2 me-2"></i> Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-people-fill me-2"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-file-earmark-text me-2"></i> Offres
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-receipt-cutoff me-2"></i> Factures
                        </a>
                    </li>
                </ul>
            </aside>

            {{-- Contenu principal --}}
            <main class="col-md-9 col-lg-10 py-4 px-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
