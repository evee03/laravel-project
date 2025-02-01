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
        .bg-light {
            background-color: rgba(255, 255, 255, 0.6) !important;
        }
        a {
            color: rgb(255, 90, 0); 
        }
        a:hover {
            color: #b45f00; 
        }
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
        <img src="./image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        FitPlan
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="{{ url('/home') }}">Strona Główna</a>
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

    <!--welcome-->
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

    @if(Auth::check())
        @if(isset($trainings) && $trainings->count() > 0)
            <div class="container">
                <h1 class="text-center mb-4 pt-4 fw-bold">Moje treningi</h1>
                <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2 lead mb-4" >Zobaczysz tutaj treningi, które były utworzone przez Ciebie. Możesz je edytować i usuwać. Są widoczne nawet dla niezalogowanych użytkowników jednak nie widać kto stworzył dany trening.</p>
                <div class="row">
                    @foreach($trainings as $training)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border-light d-flex flex-column hover-card" style="height: 100%">
                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title">{{ $training->name }}</h5>
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
                                        @if(Auth::check() && $training->user_id === auth()->id())
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <h1 class="text-center mb-4 pt-4 fw-bold">Moje treningi</h1>
                <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2 lead mb-4" >Zobaczysz tutaj treningi, które były utworzone przez Ciebie. Możesz je edytować i usuwać. Są widoczne nawet dla niezalogowanych użytkowników jednak nie widać kto stworzył dany trening.</p>
            <div class="container bg-light mt-3 p-3 rounded shadow-sm text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <h1 class="me-2" style="margin-top: 0; font-size: 1.5rem;">
                        <span style="color: #343a40;">Nie masz jeszcze żadnych treningów. </span>
                        <a href="{{ route('training.create') }}" class="alert-link"> Utwórz trening</a>
                    </h1>
                </div>
            </div>
        @endif
    @else
        <div class="alert alert-warning text-center mt-2">
            <a href="{{ route('login') }}" class="alert-link">Zaloguj się</a>, aby zobaczyć swoje treningi.
        </div>
    @endif

    @if(Auth::check())
        @if(isset($favoriteTrainings) && $favoriteTrainings->count() > 0)
            <div class="container">
                <h1 class="text-center mb-4 pt-4 fw-bold">Ulubione treningi</h1>
                <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2 lead mb-4">
                    Możesz dodać trening do ulubionych, aby mieć go w zasięgu ręki.
                </p>
                <div class="row">
                    @foreach($favoriteTrainings as $training)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border-light d-flex flex-column hover-card" style="height: 100%" data-training-id="{{ $training->id }}">
                                <div class="card-body flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">{{ $training->name }}</h5>
                                        <form action="{{ route('training.unfavorite', $training->id) }}" method="POST" class="d-inline" onsubmit="event.preventDefault(); removeFavorite({{ $training->id }});">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 border-0">
                                                <i class="bi bi-heart-fill text-danger"></i>
                                            </button>
                                        </form>
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

                                        @if(Auth::check() && $training->user_id === auth()->id())
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="container">
                <h1 class="text-center mb-4 pt-4 fw-bold">Ulubione treningi</h1>
                <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2 lead mb-4">
                    Możesz dodać trening do ulubionych, aby mieć go w zasięgu ręki.
                </p>
                <div class="container bg-light mt-3 p-3 rounded shadow-sm text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <h1 class="me-2" style="margin-top: 0; font-size: 1.5rem;">
                            <span style="color: #343a40;">Nie masz ulubionych treningów. </span>
                        </h1>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="alert alert-warning text-center mt-2">
            <a href="{{ route('login') }}" class="alert-link">Zaloguj się</a>, aby zobaczyć swoje ulubione treningi.
        </div>
    @endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function removeFavorite(trainingId) {
        const url = `/training/${trainingId}/unfavorite`;
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
                const card = document.querySelector(`.card[data-training-id="${trainingId}"]`);
                if (card) {
                    card.remove();
                }

                const favoriteTrainingsContainer = document.querySelector('#favorite-trainings');
                if (favoriteTrainingsContainer.querySelectorAll('.col-md-4').length === 0) {
                    favoriteTrainingsContainer.innerHTML = `
                        <h2 class="mb-4">Ulubione treningi</h2>
                        <p class="text-center">Nie masz już ulubionych treningów.</p>
                    `;
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
