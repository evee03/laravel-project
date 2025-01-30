<!DOCTYPE html>
<html lang="pl">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('animations.js') }}"></script>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="#">
            <img src="./image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            FitPlan
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-center active" href="{{ url('/') }}">Strona Główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/categories') }}">Treningi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/login') }}">Logowanie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/register') }}">Rejestracja</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
