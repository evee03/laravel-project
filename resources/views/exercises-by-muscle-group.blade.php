<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FitPlan</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/image/logo.png" />

    <style>
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
        <img src="/image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
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

    <!-- title -->
    <div class="container">
        <h1 class="text-center mb-4 pt-5 fw-bold">Ćwiczenia dla grupy mięśniowej: {{ $muscleGroup->name_muscle_group }}</h1>
        <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2">
            Poniżej znajdziesz ćwiczenia dedykowane dla grupy mięśniowej {{ $muscleGroup->name_muscle_group }}. Kliknij wideo, aby zobaczyć szczegóły.
        </p>
        <hr class="w-100 custom-hr">

        <!-- search -->
        <p class="col-md-5 px-3 text-center mx-auto custom-p pb-2 fs-5">
            Chcesz szybko znaleźć ćwiczenie? Śmiało!
        </p>
        <div class="container mb-4">
            <input type="text" id="searchExercise" class="form-control" placeholder="Wpisz nazwę ćwiczenia...">
        </div>

        <!-- show exercise -->
        <div id="exerciseList" class="row">
            @foreach($exercises as $exercise)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light d-flex flex-column hover-card" style="height: 100%">
                        <div class="card-body flex-grow-1">
                            <h5 class="card-title">{{ $exercise->name_exercise }}</h5>
                            <hr class="w-100 custom-hr">
                            <p class="card-text">
                                <strong>Typ:</strong> {{ $exercise->exercise_type }}<br>
                                <strong>Sprzęt:</strong> {{ $exercise->equipment_required }}<br>
                                <strong>Mechanika:</strong> {{ $exercise->mechanics }}<br>
                                <strong>Siła:</strong> {{ $exercise->force_type }}<br>
                                <strong>Poziom:</strong> {{ $exercise->experience_level }}
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ $exercise->video_of_exercise }}" class="btn btn-dark-orange" target="_blank">
                                Zobacz wideo
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- pagination -->
    @if ($exercises->hasPages())
        <nav class="d-flex justify-content-center mt-4">
            <ul class="pagination custom-pagination">
                
                <!-- previous page -->
                @if ($exercises->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $exercises->previousPageUrl() }}" class="page-link" aria-label="Poprzednia">
                            <span aria-hidden="true">
                                <i class="bi bi-chevron-left"></i>
                            </span>
                        </a>
                    </li>
                @endif

                <!-- number page -->
                @foreach ($exercises->getUrlRange(1, $exercises->lastPage()) as $page => $url)
                    @if ($page == $exercises->currentPage())
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
                @if ($exercises->hasMorePages())
                <li class="page-item">
                    <a href="{{ $exercises->nextPageUrl() }}" class="page-link" aria-label="Następna">
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
<!-- search -->
<script>
document.getElementById('searchExercise').addEventListener('input', function() {
    const searchQuery = this.value.trim(); 
    const exerciseList = document.getElementById('exerciseList'); 
    const muscleGroupId = {{ $muscleGroup->id_exercises_by_muscle_group }}; 
    fetch(`/search-exercises?query=${encodeURIComponent(searchQuery)}&muscleGroupId=${muscleGroupId}`)
        .then(response => response.json())
        .then(data => {
            exerciseList.innerHTML = '';
            data.forEach(exercise => {
                exerciseList.innerHTML += `
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-light d-flex flex-column hover-card" style="height: 100%">
                            <div class="card-body flex-grow-1">
                                <h5 class="card-title">${exercise.name_exercise}</h5>
                                <hr class="w-100 custom-hr">
                                <p class="card-text">
                                    <strong>Typ:</strong> ${exercise.exercise_type}<br>
                                    <strong>Sprzęt:</strong> ${exercise.equipment_required}<br>
                                    <strong>Mechanika:</strong> ${exercise.mechanics}<br>
                                    <strong>Siła:</strong> ${exercise.force_type}<br>
                                    <strong>Poziom:</strong> ${exercise.experience_level}
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="${exercise.video_of_exercise}" class="btn btn-dark-orange" target="_blank">
                                    Zobacz wideo
                                </a>
                            </div>
                        </div>
                    </div>
                `;
            });
        })
        .catch(error => console.error('Error:', error));
    });
</script>
</body>
</html>