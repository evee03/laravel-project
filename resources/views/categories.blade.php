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

    <!-- show categories -->
    <div class="container">
        <h1 class="text-center mb-4 pt-5 fw-bold">Wybierz kategorię treningu</h1>
        <p class="col-md-6 px-4 text-center mx-auto custom-p pb-2 lead mb-4" >Wybierz kategorię, która najlepiej pasuje do treningu, którego szukasz. Po przejściu do kategorii, znajdź odpowiedni trening dla swojego doświadczenia i celów.</p>
        <hr class="w-100 custom-hr">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <div class="card hover-card my-3"> 
                        <img src="{{ asset('image/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->description }}</p>
                            <a href="{{ url('/trainings', $category->name) }}" class="btn btn-dark-orange">
                                Zobacz treningi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- pagination -->
    @if ($categories->hasPages())
        <nav class="d-flex justify-content-center mt-4">
            <ul class="pagination custom-pagination">
                
                <!-- previous page -->
                @if ($categories->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $categories->previousPageUrl() }}" class="page-link" aria-label="Poprzednia">
                            <span aria-hidden="true">
                                <i class="bi bi-chevron-left"></i>
                            </span>
                        </a>
                    </li>
                @endif

                <!-- number page -->
                @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                    @if ($page == $categories->currentPage())
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
                @if ($categories->hasMorePages())
                <li class="page-item">
                    <a href="{{ $categories->nextPageUrl() }}" class="page-link" aria-label="Następna">
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