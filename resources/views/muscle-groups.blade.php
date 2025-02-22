<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/image/logo.png" />
    <style>
        .card-body {
            min-height: 180px; 
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
        }

        .card {
            margin-top: 15px;
            margin-bottom: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #e0e0e0;
        }

        .hover-card:hover {
            transform: scale(1.05); 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); 
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
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/home') }}">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
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
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/') }}">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
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
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- show muscle group -->
    <div class="container">
        <h1 class="text-center mb-4 pt-5 fw-bold">Wybierz grupę mięśniową</h1>
        <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2 lead mb-4">
            Wybierz grupę mięśniową, którą chcesz trenować. Kliknij, aby zobaczyć ćwiczenia dedykowane dla tej grupy.
        </p>
        <hr class="w-100 custom-hr">
        <div class="row">
            @foreach($muscleGroups as $muscleGroup)
                <div class="col-md-4">
                    <div class="card hover-card my-3"> 
                        <img src="{{ asset('image/' . $muscleGroup->image_of_muscle_group) }}" class="card-img-top" alt="{{ $muscleGroup->name_muscle_group }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $muscleGroup->name_muscle_group }}</h5>
                            <p class="card-text">Grupa mięśniowa do ćwiczeń</p>
                            <a href="{{ route('muscle-group.exercises', $muscleGroup->id_exercises_by_muscle_group) }}" class="btn btn-dark-orange">
                                Zobacz ćwiczenia
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- pagination -->
    @if ($muscleGroups->hasPages())
        <nav class="d-flex justify-content-center mt-4">
            <ul class="pagination custom-pagination">
                
                <!-- previous page -->
                @if ($muscleGroups->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $muscleGroups->previousPageUrl() }}" class="page-link" aria-label="Poprzednia">
                            <span aria-hidden="true">
                                <i class="bi bi-chevron-left"></i>
                            </span>
                        </a>
                    </li>
                @endif

                <!-- number page -->
                @foreach ($muscleGroups->getUrlRange(1, $muscleGroups->lastPage()) as $page => $url)
                    @if ($page == $muscleGroups->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                <!-- next page -->
                @if ($muscleGroups->hasMorePages())
                <li class="page-item">
                    <a href="{{ $muscleGroups->nextPageUrl() }}" class="page-link" aria-label="Następna">
                        <span aria-hidden="true">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </a>
                </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </li>
                @endif

            </ul>
        </nav>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>