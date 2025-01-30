<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: rgb(35, 35, 35); 
        }
        .bg-light {
            background-color: rgba(255, 255, 255, 0.6) !important;
        }
        .container {
            border-radius: 25px;
        }
        .custom-hr {
            border: 2px solid rgb(0, 0, 0);
        }
        .btn-dark-orange {
            background-color: #cc5800;
            border-color: #cc5800; 
            color: #e0e0e0;
        }
        .btn-dark-orange:hover {
            background-color: #b45100; 
            border-color: #b45100; 
        }
        a {
            color: rgb(255, 90, 0); 
        }
        a:hover {
            color: #b45f00; 
        }
        input.form-control:focus, select.form-select:focus {
            border-color: #b45f00; 
            box-shadow: 0 0 0 0.2rem rgba(180, 95, 0, 0.25);
        }
        input.form-control:hover, select.form-select:hover {
            border-color: #b45f00; 
        }
        .icon-small {
            transform: scale(0.2); 
            transform-origin: center; 
            margin: 0; 
            padding: 0; 
        }
        .custom-p{
            color:rgba(200,200,200,1);
        }
        .alert-success {
        padding: 0; 
        margin: 0;
         }
         ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(200,200,200,1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color:#fff;
            -webkit-box-shadow: inset 0 0 6px rgba(90,90,90,0.7);
        }
    </style>
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
                        <a class="nav-link text-center active" href="{{ url('/home') }}">Nowości</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/training/create') }}">Utwórz trening</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/categories') }}">Treningi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/profil') }}">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Przywitanie-->
    <div class="container bg-light mt-3 p-3 rounded shadow-sm">
    <div class="d-flex align-items-center">
        <h1 class="me-2" style="margin-top: 0; font-size: 1.5rem;">
            <span style="color: #343a40;">Witaj, </span><span style="color: #ff521a;">{{ auth()->user()->name }}!</span>
        </h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#343a40" class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.2 4.2 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A3 3 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515zM4.969 9.75A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z"/>
        </svg>
    </div>
</div>

<div class="container mt-3">
    <h1 class="mb-3 custom-p">Informacje z obszaru sportu:</h1>

    <!-- Sekcja dla pierwszego API -->
    <h2 class="mt-4 custom-p">Pierwszy zestaw danych</h2>
    @if (!empty($firstNews))
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $firstNews['title'] ?? 'Brak tytułu' }}</h5>
                <p class="card-text">{{ $firstNews['description'] ?? 'Brak opisu' }}</p>
                <p><strong>Data modyfikacji:</strong> {{ $firstNews['modified'] ?? 'Nie podano' }}</p>
                <a href="{{ $firstNews['file_url'] ?? '#' }}" class="btn btn-primary" target="_blank">Pobierz plik</a>
            </div>
        </div>
    @else
        <p>Brak danych z pierwszego API.</p>
    @endif

    <!-- Sekcja dla drugiego API -->
    <h2 class="mt-4 custom-pc">Drugi zestaw danych</h2>
    @if (!empty($secondNews))
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $secondNews['title'] ?? 'Brak tytułu' }}</h5>
                <p class="card-text">{{ $secondNews['description'] ?? 'Brak opisu' }}</p>
                <p><strong>Data modyfikacji:</strong> {{ $secondNews['modified'] ?? 'Nie podano' }}</p>
                <a href="{{ $secondNews['file_url'] ?? '#' }}" class="btn btn-primary" target="_blank">Pobierz plik</a>
            </div>
        </div>
    @else
        <p>Brak danych z drugiego API.</p>
    @endif
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
