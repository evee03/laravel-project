<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FitPlan</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/image/logo.png" />
    <style>
        .custom-background {
            background: rgb(193, 96, 47, 0.15);
            padding: 15px; 
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
                        <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/training/create') }}">Utwórz trening</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="{{ url('/categories') }}">Treningi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/profil') }}">Profil</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/') }}">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="{{ url('/categories') }}">Treningi</a>
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

    <!-- my trainings -->
    <div class="container">
        <h1 class="text-center mb-4 pt-5 fw-bold">{{ $category->name }}</h1>
        <div class="row">
            @foreach($trainings as $training)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light d-flex flex-column hover-card" style="height: 100%">
                        <div class="card-body flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{ $training->name }}</h5>
                                @if(Auth::check())
                                    <form action="{{ route('training.favorite', $training->id) }}" method="POST" class="d-inline" onsubmit="event.preventDefault(); toggleFavorite({{ $training->id }});">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 border-0">
                                            <i id="heart-{{ $training->id }}" class="bi bi-heart{{ $user->favorites->contains($training->id) ? '-fill' : '' }} text-danger"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <hr class="w-100 custom-hr">
                            <p class="card-text">{{ Str::limit($training->description, 300) }}</p>
                            <ul class="list-group list-group-flush border border-dark border-2">
                                <li class="list-group-item custom-background"><strong>Czas trwania:</strong> {{ $training->duration }} tygodni</li>
                                <li class="list-group-item custom-background"><strong>Ilość dni w tygodniu:</strong> {{ $training->DaysPerWeek }}</li>
                                <li class="list-group-item custom-background"><strong>Czas treningu:</strong> {{ $training->TimePerWorkout }} minut</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                <a href="{{ route('training.show', $training->id) }}" class="btn btn-dark-orange flex-grow-1">Zobacz szczegóły</a>
                                @if(Auth::check())
                                    @if($training->user_id === auth()->id())
                                        <a href="{{ route('training.edit', $training->id) }}" class="btn btn-primary flex-grow-1">
                                            <i class="bi bi-pencil"></i> Edytuj
                                        </a>
                                        <form action="{{ route('training.destroy', $training->id) }}" method="POST" class="flex-grow-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Czy na pewno chcesz usunąć ten trening?')">
                                                <i class="bi bi-trash"></i> Usuń
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


   <!-- pagination -->
   @if ($trainings->hasPages())
        <nav class="d-flex justify-content-center mt-4">
            <ul class="pagination custom-pagination">
                
                <!-- previous page -->
                @if ($trainings->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $trainings->previousPageUrl() }}" class="page-link" aria-label="Poprzednia">
                            <span aria-hidden="true">
                                <i class="bi bi-chevron-left"></i>
                            </span>
                        </a>
                    </li>
                @endif

                <!-- number page -->
                @foreach ($trainings->getUrlRange(1, $trainings->lastPage()) as $page => $url)
                    @if ($page == $trainings->currentPage())
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
                @if ($trainings->hasMorePages())
                <li class="page-item">
                    <a href="{{ $trainings->nextPageUrl() }}" class="page-link" aria-label="Następna">
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function toggleFavorite(trainingId) {
            const heartIcon = document.getElementById(`heart-${trainingId}`);
            const isFavorite = heartIcon.classList.contains('bi-heart-fill');
            const url = isFavorite ? `/training/${trainingId}/unfavorite` : `/training/${trainingId}/favorite`;
            const method = 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    heartIcon.classList.toggle('bi-heart-fill');
                    heartIcon.classList.toggle('bi-heart');
                }
            })
            .catch(error => console.error('Error:', error));
        }
</script>
</body>
</html>