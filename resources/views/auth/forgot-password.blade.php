<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe - Willemia</title>
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
                                    <i class="bi bi-shield-lock me-2"></i>Réinitialisation du mot de passe
                                </h2>
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.forgot') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nom</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Envoyer le lien de réinitialisation</button>
                                </form>
                                <div class="text-center mt-4">
                                    <p class="mb-0">Retour à la <a href="{{ route('login') }}" class="login-link">connexion</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
