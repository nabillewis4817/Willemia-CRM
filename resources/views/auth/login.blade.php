<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Dodibo CRM</title>
    @vite(['resources/css/app.css', 'resources/css/auth.css'])
</head>
<body class="bg-light">
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h1 class="login-title">Bienvenue sur Willemia</h1>
                <p class="login-subtitle">Votre App de gestion client</p>
            </div>
            <div class="row g-0">
                <div class="col-md-6 login-section left d-none d-md-block">
                    <img src="{{ asset('images/Businessman.jpg') }}" alt="Businessman" class="login-image img-fluid rounded-start">
                </div>
                <div class="col-md-6 login-section right">
                    <div class="login-card h-100 shadow-sm rounded-end">
                        <div class="login-card-body d-flex flex-column justify-content-center">
                        <div class="login-form">
                            <h2 class="text-center mb-4">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Connexion
                            </h2>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary login-btn w-100">Se connecter</button>
                        </form>
                        <div class="text-center mt-4">
                            <p class="mb-2">Pas encore de compte ? <a href="{{ route('register') }}" class="login-link">Créer un compte</a></p>
                            <p class="mb-0">Mot de passe oublié ? <a href="{{ route('password.forgot') }}" class="login-link">Réinitialiser</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
