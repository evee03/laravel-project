<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
            font-size: 28px;
            color: rgb(255, 90, 0);
            text-shadow:  rgba(200, 200, 200, 0.49) 3px 3 10px;
            letter-spacing: 2px;
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
        .custom-link {
            color: #ff6600; /* Pomarańczowy kolor tekstu */
            text-decoration: none; /* Usuwa domyślną linię pod tekstem */
        }

        .custom-link:hover {
            color: #ff4500; /* Kolor przy najechaniu na link (ciemniejszy pomarańczowy) */
            text-decoration: underline; /* Dodaje podkreślenie po najechaniu */
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
                        <a class="nav-link text-center" href="{{ url('/training/create') }}">Utwórz trening</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="{{ url('/categories') }}">Treningi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/profil') }}">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3 p-3">
    <h1 class="text-center mb-4 pt-5 fw-bold">PLAN TRENINGOWY</h1>
    <div class="row">
        @php
            $currentDay = null;
        @endphp

        @foreach ($trainingExercises as $trainingExercise)
            @if ($currentDay != $trainingExercise->day)
                @php
                    $currentDay = $trainingExercise->day;
                @endphp
                <div class="col-12 mb-4">
                    <h4 class="fw-bold col-md-6 px-4 text-center mx-auto custom-p pb-2">Dzień {{ $currentDay }}</h4>
                    <h5 class="col-md-6 px-4 text-center mx-auto custom-p pb-2">{{ $trainingExercise->name_training_exercise }}</h5>
                </div>
                <hr class="w-100 custom-hr">
            @endif

            <div class="col-md-4 mb-4 pb-3">
                <div class="card shadow-sm border-light h-60">
                    <div class="card-body">
                            <div class="col-12 mb-2">
                                <strong>Ćwiczenie:</strong> 
                                <a href="{{ $trainingExercise->exercise->video_of_exercise }}" target="_blank" class="btn btn-link custom-link">
                                    {{ $trainingExercise->exercise->name_exercise }}
                                </a>
                            </div>
                            <div class="col-12 mb-2">
                                <strong>Serie:</strong> {{ $trainingExercise->sets }}
                            </div>
                            <div class="col-12">
                                <strong>Powtórzenia:</strong> {{ $trainingExercise->reps }}
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>