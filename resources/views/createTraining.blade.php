<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/image/logo.png" />
    <style>
    
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
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/home') }}">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="">Utwórz trening</a>
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

    <div class="container">
    <h1 class="text-center mb-4 pt-5 fw-bold">Kreator indywidualnego planu treningowego</h1>
    <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2">Uzupełnij pola, korzystając z podpowiedzi, i stwórz swój unikalny plan treningowy. Po zapisaniu plan będzie dostępny w odpowiedniej kategorii, do której został przypisany.</p>
    <hr class="w-100 custom-hr">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('training.store') }}">
    @csrf

    <!-- category selection -->
    <div class="mb-3">
        <label for="category" class="form-label custom-p">Wybierz kategorię</label>
        <select id="category" name="category_id" class="form-select" required>
            <option value="">Wybierz kategorię</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- title -->
    <div class="mb-3">
        <label for="title" class="form-label custom-p">Tytuł Treningu</label>
        <input type="text" id="title" name="name" class="form-control" placeholder="Wprowadź tytuł treningu" required>
    </div>

    <!-- description -->
    <div class="mb-3">
        <label for="description" class="form-label custom-p">Opis Treningu</label>
        <textarea id="description" name="description" class="form-control" rows="3" placeholder="Wprowadź opis treningu" required></textarea>
    </div>

    <!-- details trainings -->
    <div class="mb-3">
        <label for="program_duration" class="form-label custom-p">Czas trwania programu (w tygodniach)</label>
        <input type="number" id="program_duration" name="duration" class="form-control" min="1" required>
    </div>
    <div class="mb-3">
        <label for="days_per_week" class="form-label custom-p">Dni w tygodniu</label>
        <input type="number" id="days_per_week" name="DaysPerWeek" class="form-control" min="1" max="7" required>
    </div>
    <div class="mb-3">
        <label for="time_per_workout" class="form-label custom-p">Czas na trening (w minutach)</label>
        <input type="number" id="time_per_workout" name="TimePerWorkout" class="form-control" min="1" required>
    </div>

    <!-- schedule exercise -->
    <hr class="w-100 custom-hr">
    <div id="workout-days"></div>
    <div class="row">
        <button type="button" id="add-day" class="btn btn-secondary mb-3">Dodaj Dzień</button>
        <button type="submit" class="btn btn-primary">Zapisz Trening</button>
    </div>
</form>


</div>

<script src="{{ asset('animations.js') }}"> 
</script> 
<script>
    const exercises = @json($exercises);  
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>