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
        .custom-p {
            color: #e0e0e0;
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
        h1{
            color:#e0e0e0;
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
        .alert-success {
            padding: 0; 
            margin: 0;
         }
         .card-img-top {
            width: 100%;
            height: 300px; 
            object-fit: cover; 
        }
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
        <img src="/image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        FitPlan
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/home') }}">Nowości</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="">Edycja treningu</a>
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
    <h1 class="text-center mb-4 pt-5 fw-bold">Edycja treningu</h1>
    <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2">Właśnie edytujesz stworzony przez siebie trening.</p>
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
    
    <form method="POST" action="{{ route('training.update', $training->id) }}">
    @csrf
    @method('PUT')

    <!-- Wybór kategorii -->
    <div class="mb-3">
        <label for="category" class="form-label custom-p">Wybierz kategorię</label>
        <select id="category" name="category_id" class="form-select" required>
            <option value="">Wybierz kategorię</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $training->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tytuł -->
    <div class="mb-3">
        <label for="title" class="form-label custom-p">Tytuł Treningu</label>
        <input type="text" id="title" name="name" class="form-control" value="{{ $training->name }}" required>
    </div>

    <!-- Opis -->
    <div class="mb-3">
        <label for="description" class="form-label custom-p">Opis Treningu</label>
        <textarea id="description" name="description" class="form-control" rows="3" required>{{ $training->description }}</textarea>
    </div>

    <!-- Szczegóły treningu -->
    <div class="mb-3">
        <label for="program_duration" class="form-label custom-p">Czas trwania programu (w tygodniach)</label>
        <input type="number" id="program_duration" name="duration" class="form-control" value="{{ $training->duration }}" min="1" required>
    </div>
    <div class="mb-3">
        <label for="days_per_week" class="form-label custom-p">Dni w tygodniu</label>
        <input type="number" id="days_per_week" name="DaysPerWeek" class="form-control" value="{{ $training->DaysPerWeek }}" min="1" max="7" required>
    </div>
    <div class="mb-3">
        <label for="time_per_workout" class="form-label custom-p">Czas na trening (w minutach)</label>
        <input type="number" id="time_per_workout" name="TimePerWorkout" class="form-control" value="{{ $training->TimePerWorkout }}" min="1" required>
    </div>

    <!-- Rozpiska ćwiczeń -->
    <hr class="w-100 custom-hr">
    <div id="workout-days"></div>
    <div class="row">
        <button type="button" id="add-day" class="btn btn-secondary mb-3">Dodaj Dzień</button>
        <button type="submit" class="btn btn-primary">Zapisz Trening</button>
    </div>
</form>


<!-- <script src="{{ asset('animations.js') }}"> //Glupia nazwa ale tam sa elementy do dynamicznej strony, wybory w dniach itd
</script>  -->
<script src="{{ asset('editForm.js') }}"> //Glupia nazwa ale tam sa elementy do dynamicznej strony, wybory w dniach itd
</script>
<script>
    const exercises = @json($exercises);  // Przekazanie danych cwiczen do JS
    const trainingDays = @json($trainingDays);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>