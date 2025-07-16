<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dodibo CRM')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts personnalisés -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.querySelector('.sidebar');
            const showSidebarBtn = document.getElementById('showSidebarBtn');

            // Gestion du bouton de masquage
            menuToggle.addEventListener('click', function() {
                // Toggle la classe collapsed
                sidebar.classList.toggle('collapsed');
                menuToggle.classList.toggle('active');

                // Animation de masquage/démasquage
                if (sidebar.classList.contains('collapsed')) {
                    sidebar.style.opacity = '0';
                    setTimeout(() => {
                        sidebar.style.visibility = 'hidden';
                    }, 300);
                } else {
                    sidebar.style.visibility = 'visible';
                    setTimeout(() => {
                        sidebar.style.opacity = '1';
                    }, 10);
                }
            });

            // Gestion du bouton de réapparition
            showSidebarBtn.addEventListener('click', function() {
                sidebar.classList.remove('collapsed');
                menuToggle.classList.remove('active');
                sidebar.style.visibility = 'visible';
                setTimeout(() => {
                    sidebar.style.opacity = '1';
                }, 10);
            });
        });
    </script>

    <!-- Styles personnalisés -->
    <style>
        /* Sidebar */
        .sidebar {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-right: 1px solid rgba(40, 167, 69, 0.1);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            visibility: visible;
            opacity: 1;
        }

        .sidebar.collapsed {
            visibility: hidden;
            opacity: 0;
            width: 0 !important;
            padding: 0;
            margin: 0;
            border: none;
            box-shadow: none;
        }

        .sidebar.collapsed .nav-link {
            padding: 0 !important;
            opacity: 0;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
            opacity: 0;
        }

        /* Bouton de réapparition */
        .show-sidebar-btn {
            position: fixed;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            background: #000000;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .show-sidebar-btn:hover {
            background: #1a1a1a;
            transform: translateY(-50%) scale(1.1);
        }

        .sidebar.collapsed + .show-sidebar-btn {
            display: flex;
        }

        /* Titre */
        .sidebar h5 {
            color: #28a745;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .menu-toggle {
            cursor: pointer;
            padding: 0.5rem;
            transition: transform 0.3s ease;
        }

        .menu-toggle:hover {
            background-color: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
        }

        .menu-toggle.active {
            transform: rotate(-45deg);
        }

        /* Navigation */
        .nav-link {
            color: #495057;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
        }

        .nav-link:hover {
            color: #28a745;
            background: rgba(40, 167, 69, 0.05);
            transform: translateX(5px);
        }

        .nav-link.active {
            color: #28a745;
            background: rgba(40, 167, 69, 0.1);
            border-left: 3px solid #28a745;
            box-shadow: inset 2px 0 5px rgba(40, 167, 69, 0.1);
        }

        /* Icônes */
        .nav-link i {
            color: #6c757d;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-right: 0.75rem;
        }

        .nav-link:hover i {
            color: #28a745;
            transform: translateX(3px);
        }

        .nav-link.active i {
            color: #28a745;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* Bouton déconnexion */
        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .nav-link {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-light">

    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dodibo CRM</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <aside class="col-md-3 col-lg-2 sidebar">
                <div class="d-flex flex-column">
                    <h5 class="px-3 py-3 mb-4 border-bottom border-success">
                        Menu
                        <span class="menu-toggle" id="menuToggle">
                            <i class="bi bi-x-lg"></i>
                        </span>
                    </h5>
                    <ul class="nav flex-column px-3">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-speedometer2"></i>
                                Tableau de bord
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people-fill"></i>
                                Utilisateurs & Rôles
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-lines-fill"></i>
                                Prospects / Clients
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-file-earmark-text"></i>
                                Offres / Devis
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-receipt-cutoff"></i>
                                Factures
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-box-seam"></i>
                                Produits / Services
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-arrow-repeat"></i>
                                Abonnements
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-life-preserver"></i>
                                Tickets / Support
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-kanban"></i>
                                Tâches / Projets
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i>
                                Paramètres / Catégories
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <i class="bi bi-graph-up-arrow"></i>
                                Statistiques / Rapports
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger w-100 mt-3">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- Bouton de réapparition -->
            <button class="show-sidebar-btn" id="showSidebarBtn">
                <i class="bi bi-plus-lg"></i>
            </button>

            {{-- Contenu principal --}}
            <main class="col-md-9 col-lg-10 py-4 px-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
