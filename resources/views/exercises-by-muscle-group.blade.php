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
        .btn-dark-orange {
            background-color: #cc5800;
            border-color: #cc5800; 
            color: #e0e0e0;
        }
        .btn-dark-orange:hover {
            background-color: #b45100; 
            border-color: #b45100; 
        }
        .custom-background {
            background: rgb(193, 96, 47, 0.15);
            padding: 15px; 
        }
        .custom-p{
            color: #e0e0e0;
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
        a {
            color: rgb(255, 90, 0); 

        }
        .custom-pagination .page-item {
        margin: 0 3px; 
        }
                .custom-pagination .page-link {
            background-color: #343a40; 
            color: #ffffff;           
            border: 1px solid #343a40; 
            border-radius: 50%;       
            transition: background-color 0.2s ease, transform 0.2s ease; 
        }

        .custom-pagination .page-item.active .page-link {
            background-color: #495057; 
            color: #ffffff;            
            border-color: #495057;     
            border-radius: 50%;      
        }

        .custom-pagination .page-link:hover {
            background-color: #495057; 
            color: #ffffff;            
            border-radius: 50%;       
        }

        .custom-pagination .page-link:focus,
        .custom-pagination .page-link:active {
            background-color: #495057; 
            color: #ffffff;            
            border-color: #495057;     
            border-radius: 50%;       
            outline: none;            
            transform: scale(0.95);   
        }
        h1{
            color:#e0e0e0;
        }

        .custom-pagination .page-item.disabled .page-link {
            background-color: #343a40; 
            color: #6c757d;           
            border-color: #343a40;     
            border-radius: 50%;       
        }

        .custom-pagination .page-item {
            border-radius: 50%; 
            overflow: hidden;   
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    <h1 class="text-center mb-4 pt-5 fw-bold">Ćwiczenia dla grupy mięśniowej: {{ $muscleGroup->name_muscle_group }}</h1>
    <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2">
        Poniżej znajdziesz ćwiczenia dedykowane dla grupy mięśniowej {{ $muscleGroup->name_muscle_group }}. Kliknij wideo, aby zobaczyć szczegóły.
    </p>
    <hr class="w-100 custom-hr">
    <div class="row">
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

<!-- Paginacja -->
@if ($exercises->hasPages())
        <nav class="d-flex justify-content-center mt-4">
            <ul class="pagination custom-pagination">
                
                <!-- Poprzednia strona -->
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

                <!-- Numery stron -->
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

                <!-- Następna strona -->
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
</body>
</html>