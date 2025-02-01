<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/image/logo.png" />
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
                        <a class="nav-link text-center" href="{{ url('/home') }}">Strona Główna</a>
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
                        <a class="nav-link text-center active" href="{{ url('/profil') }}">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- success alert -->
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        <div class="d-flex align-items-center">
            <svg class="bi flex-shrink-0 me-2 icon-small" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="flex-grow-1">
                {{ Session::get('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
     
    <!--edit data-->
    <div class="bg-light container class p-5 mt-5 mb-5">

        <div class=" card-body">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="d-flex align-items-center justify-content-between pb-3">
                    <h2 class="mb-0">Edycja profilu</h2>
                    <button type="submit" class="btn btn-danger me-4">Wyloguj się</button>
                </div>
            </form>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="card-body">

            <div class="row gutters">

                <hr class="w-100 custom-hr">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h5 class="mb-2">Dane osobowe :</h5>
                </div>

                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                        <div class="form-group">
                            <label for="name" class="form-label">Imię:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                        <div class="form-group">
                            <label for="surname" class="form-label">Nazwisko:</label>
                            <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" id="surname" value="{{ old('surname', $user->surname) }}" required>
                            @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                        <div class="form-group">
                            <label for="sport_level" class="form-label">Poziom aktywności fizycznej:</label>
                            <select name="sport_level" id="sport_level" class="form-select @error('sport_level') is-invalid @enderror" required>
                                <option value="" disabled>Wybierz</option>
                                <option value="lack" {{ old('sport_level', $user->sport_level) == 'lack' ? 'selected' : '' }}>Brak aktywności</option>
                                <option value="weakly" {{ old('sport_level', $user->sport_level) == 'weakly' ? 'selected' : '' }}>Aktywność 1 raz w tygodniu</option>
                                <option value="middling" {{ old('sport_level', $user->sport_level) == 'middling' ? 'selected' : '' }}>Aktywność 2-3 razy w tygodniu</option>
                                <option value="almost_daily" {{ old('sport_level', $user->sport_level) == 'almost_daily' ? 'selected' : '' }}>Aktywność 4-6 razy w tygodniu</option>
                                <option value="daily" {{ old('sport_level', $user->sport_level) == 'daily' ? 'selected' : '' }}>Codzienna aktywność</option>
                            </select>
                            @error('sport_level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="goal" class="form-label">Cel:</label>
                            <select name="goal" id="goal" class="form-select @error('goal') is-invalid @enderror" required>
                                <option value="" disabled>Wybierz</option>
                                <option value="reduction" {{ old('goal', $user->goal) == 'reduction' ? 'selected' : '' }}>Redukcja masy ciała</option>
                                <option value="maintence" {{ old('goal', $user->goal) == 'maintence' ? 'selected' : '' }}>Utrzymanie masy ciała</option>
                                <option value="growth" {{ old('goal', $user->goal) == 'growth' ? 'selected' : '' }}>Wzrost masy ciała</option>
                            </select>
                            @error('goal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="weight" class="form-label">Waga:</label>
                        <input type="number" name="weight" class="form-control @error('weight') is-invalid @enderror" id="weight" value="{{ old('weight', $user->weight) }}" required>
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="height" class="form-label">Wzrost:</label>
                        <input type="number" name="height" class="form-control @error('height') is-invalid @enderror" id="height" value="{{ old('height', $user->height) }}" required>
                        @error('height')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <label for="age" class="form-label">Wiek:</label>
                        <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" id="age" value="{{ old('age', $user->age) }}" required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <div class="mt-4 pb-3">
                            <button type="submit" class="btn btn-primary">Zaktualizuj dane</button>
                        </div>
                    </div>
                </div>
                        </form>
                        <hr class="w-100 custom-hr">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="mb-2">Usuwanie konta :</h5>

                    <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć swoje konto?')">
                        @csrf
                        @method('DELETE')
                        <div class="d-flex align-items-center">
                            <p class="mb-0 me-auto">Usunięcie profilu spowoduje usunięcie wszystkich danych związanych z tym kontem. Dane zostaną usunięte bezpowrotnie.</p>
                            <button type="submit" class="btn btn-danger me-4">Usuń konto</button>
                        </div>
                    </form>
			    </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
