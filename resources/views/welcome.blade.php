<!DOCTYPE html>
<html lang="pl">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/image/logo.png" />
    <script src="{{ asset('animations.js') }}"></script>
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
                        <a class="nav-link text-center active" href="{{ url('/') }}">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                    </li>
                    @if(Auth::check())
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

        <!-- section-1 -->
        <section class="container-fluid py-5 text-white">
            <div class="container">
                <h2 class="text-center mb-4 display-6 fw-bold">Zacznij swoją przygodę z treningiem już dziś!</h2>
                
                <p class="text-center lead mb-4">Twoje cele są na wyciągnięcie ręki – dołącz do naszej społeczności i zyskaj dostęp do spersonalizowanych planów treningowych, statystyk i bazy wiedzy. Z nami osiągniesz więcej!</p>

                <div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
                    <div class="carousel-inner rounded shadow">
                        <div class="carousel-item active">
                            <img src="/image/spalanie_tluszczu.jpg" class="d-block w-100" alt="Trening brzucha">
                        </div>
                        <div class="carousel-item">
                            <img src="/image/cwiczenia_w_domu.jpg" class="d-block w-100" alt="Trening cardio">
                        </div>
                        <div class="carousel-item">
                            <img src="/image/cwiczenia_na_biceps.jpg" class="d-block w-100" alt="Trening siłowy">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="row text-center mb-5">
                    <div class="col-md-8 mx-auto">
                        <p class="fs-5">Marzysz o lepszej formie, zdrowiu i kondycji? To idealne miejsce, aby zacząć – bez względu na Twój poziom zaawansowania.</p>
                        <p class="fs-5">Dołącz i korzystaj z zaawansowanych narzędzi do monitorowania postępów, dostępu do setek ćwiczeń oraz spersonalizowanych planów dopasowanych do Twoich potrzeb.</p>
                        <p class="fs-5">Nie czekaj na idealny moment – ten moment jest teraz. Twój sukces zaczyna się tutaj!</p>
                    </div>
                </div>

                <div class="row text-center mt-4">
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-dark rounded shadow">
                            <i class="bi bi-bar-chart fs-1 text-primary"></i>
                            <h3 class="mt-3">Monitoruj treningi</h3>
                            <p>Śledź swoje wyniki i osiągaj lepsze rezultaty dzięki statystykom.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-dark rounded shadow">
                            <i class="bi bi-person-lines-fill fs-1 text-primary"></i>
                            <h3 class="mt-3">Spersonalizowane plany</h3>
                            <p>Twórz plany dostosowane do Twoich celów i poziomu zaawansowania.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-dark rounded shadow">
                            <i class="bi bi-book fs-1 text-primary"></i>
                            <h3 class="mt-3">Baza ćwiczeń</h3>
                            <p>Dostęp do setek ćwiczeń i wskazówek od ekspertów.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ url('/register') }}" class="btn btn-dark-orange px-5 py-3 fw-bold">Zarejestruj się i odkryj, jak proste może być osiąganie wielkich rzeczy</a>
                    <p class="mt-3">Dołącz teraz i zobacz różnicę, jaką możesz zrobić dla siebie każdego dnia.</p>
                </div>
            </div>
        </section>

        <!-- section-2 -->
        <section class="bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-4 display-6 fw-bold">Znajdź idealny plan treningowy dla siebie!</h2>
                <p class="text-center lead mb-5">Odpowiedź na 3 proste pytania, aby dowiedzieć się jaki plan będzie odpowiedni dla Ciebie.</p>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card p-4 shadow-sm custom-bg">
                            <div id="quiz">
                                <div class="quiz-step" id="step1">
                                    <h4 class="text-center mb-2 pb-3">Jaki jest Twój główny cel?</h4>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="1">Chcę schudnąć</button>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="2">Chcę zbudować mięśnie</button>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="3">Chcę poprawić kondycję</button>
                                </div>
                                <div class="quiz-step d-none" id="step2">
                                    <h4 class="text-center mb-2 pb-3">Jak często chcesz ćwiczyć?</h4>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="1">2-3 razy w tygodniu</button>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="2">4-5 razy w tygodniu</button>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="3">Codziennie</button>
                                </div>
                                <div class="quiz-step d-none" id="step3">
                                    <h4 class="text-center mb-2 pb-3">Gdzie wolisz ćwiczyć?</h4>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="1">W domu</button>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="2">Na siłowni</button>
                                    <button class="btn btn-outline-custom-orange w-100 mb-2" data-answer="3">Na świeżym powietrzu</button>
                                </div>
                                <div class="quiz-result d-none text-center mt-2 pt-3">
                                    <h3><span id="quizResult"></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section-3 -->
        <section class="bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-4 display-6 fw-bold">Zobacz, jak wyglądają treningi!</h2>
                <p class="text-center lead mb-5">Obejrzyj przykładowe wideo i przekonaj się, jak proste może być osiąganie celów.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/dVTKC_OnxPM" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="mt-4">Dlaczego warto wybrać akurat nasze treningi?</h3>
                        <ul class="list-unstyled mt-5">
                            <li class="text-center"><i class="bi bi-check-circle text-success"></i>&#128073; Są one opacowane przez prawdziwych profesjonalistów</li>
                            <li class="text-center"><i class="bi bi-check-circle text-success"></i>&#128073; Cenimy sobie regułę od bambików do goldzików</li>
                            <li class="text-center"><i class="bi bi-check-circle text-success"></i>&#128073; Nasze treningi to nie tylko ćwiczenia, to także picie piwa >.<</li>
                            <li class="text-center"><i class="bi bi-check-circle text-success"></i>&#128073; Możliwość ćwiczenia w domu lub na siłowni</li>
                        </ul>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="https://www.youtube.com/watch?v=dVTKC_OnxPM" class="btn btn-dark-orange px-5 py-3 fw-bold">Zobacz więcej wideo</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- section-4 -->
        <section class="bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-4 display-6 fw-bold">Zobacz, jak inni osiągają sukcesy!</h2>
                <p class="text-center lead mb-5">Dołącz do społeczności i zacznij swoją przemianę już dziś</p>
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="counter">
                            <h3 class="display-6 fw-bold" data-count="5000">25 000</h3>
                            <p class="text-muted">Uczestników</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter">
                            <h3 class="display-6 fw-bold" data-count="180 000">180 000</h3>
                            <p class="text-muted">Przeprowadzonych treningów</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter">
                            <h3 class="display-6 fw-bold" data-count="100 000">100 000</h3>
                            <p class="text-muted">Straconych kilogramów</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter">
                            <h3 class="display-6 fw-bold" data-count="97">97 %</h3>
                            <p class="text-muted">Zadowolonych klientów</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-dark text-white py-2">
            <div class="container text-center mt-2">
                <p>&copy; 2025 FitPlan</p>
                <p><a href="{{ url('/regulamin') }}" class="text-white">Regulamin & Polityka prywatności</a>
            </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
