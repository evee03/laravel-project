<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/image/logo.png" />
    <script src="{{ asset('animations.js') }}"></script>
    <style>
    .custom-alert.alert-success {
        background-color:rgb(82, 146, 97) !important; 
        border-color: #c3e6cb !important; 
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
                        <li class = "nav-item">
                            <a class="nav-link text-center" href="{{ url('/') }}">Strona Główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/categories') }}">Treningi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/login') }}">Logowanie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center active" href="{{ url('/register') }}">Rejestracja</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Success icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>


    <!-- Registration Form -->
    <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="bg-custom container class p-5 mt-5 mb-3 custom-padding">

            <div class="d-flex flex-column align-items-center text-center">
                <h1>Rejestracja</h1>
                <p>Proszę uzupełnić pola aby założyć konto.</p>
            </div>

            @if (Session::has('success'))
                <div class="alert custom-alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    <div class="d-flex align-items-center">
                        <svg class="alert-icon" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div class="flex-grow-1 alert-text">
                            {{ Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <hr class="w-100 custom-hr">

            <div class="container px-5">

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="name" class="form-label">Imię:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @else @if(old('name')) is-valid @endif @enderror" id="name" placeholder="Ania" required value="{{ old('name') }}">
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @else Imię wygląda dobrze! @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="surname" class="form-label">Nazwisko:</label>
                        <input type="text" name="surname" class="form-control @error('surname') is-invalid @else @if(old('surname')) is-valid @endif @enderror" id="surname" placeholder="Kowalski" required value="{{ old('surname') }}">
                        <div class="invalid-feedback">
                            @error('surname') {{ $message }} @else Nazwisko wygląda dobrze! @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @else @if(old('email')) is-valid @endif @enderror" id="email" autocomplete="email" placeholder="a.kowalska@gmail.com" required value="{{ old('email') }}">
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @else Proszę podać prawidłowy adres email. @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label">Hasło:</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @else @if(old('password')) is-valid @endif @enderror" id="password" placeholder="********" required>
                        <div class="invalid-feedback">
                            @error('password') {{ $message }} @else Proszę podać hasło. @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="level" class="form-label">Poziom aktywności fizycznej:</label>
                        <select class="form-select @error('sport_level') is-invalid @else @if(old('sport_level')) is-valid @endif @enderror" name="sport_level" id="level" required>
                            <option value="0" disabled selected>Wybierz</option>
                            <option value="lack" {{ old('sport_level') == 'lack' ? 'selected' : '' }}>Brak aktywności</option>
                            <option value="weakly" {{ old('sport_level') == 'weakly' ? 'selected' : '' }}>Aktywność 1 raz w tygodniu</option>
                            <option value="middling" {{ old('sport_level') == 'middling' ? 'selected' : '' }}>Aktywność 2-3 razy w tygodniu</option>
                            <option value="almost_daily" {{ old('sport_level') == 'almost_daily' ? 'selected' : '' }}>Aktywność 4-6 razy w tygodniu</option>
                            <option value="daily" {{ old('sport_level') == 'daily' ? 'selected' : '' }}>Codzienna aktywność</option>
                        </select>
                        <div class="invalid-feedback">
                            @error('sport_level') {{ $message }} @else Proszę wybrać poziom aktywności. @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label for="weight" class="form-label">Waga:</label>
                        <input type="number" class="form-control @error('weight') is-invalid @else @if(old('weight')) is-valid @endif @enderror" id="weight" name="weight" min="0" max="999" step="1" placeholder="66" required value="{{ old('weight') }}">
                        <div class="invalid-feedback">
                            @error('weight') {{ $message }} @else Proszę podać wagę. @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label for="height" class="form-label">Wzrost:</label>
                        <input type="number" class="form-control @error('height') is-invalid @else @if(old('height')) is-valid @endif @enderror" id="height" name="height" min="0" max="999" step="1" placeholder="170" required value="{{ old('height') }}">
                        <div class="invalid-feedback">
                            @error('height') {{ $message }} @else Proszę podać wzrost. @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label for="age" class="form-label">Wiek:</label>
                        <input type="number" class="form-control @error('age') is-invalid @else @if(old('age')) is-valid @endif @enderror" id="age" name="age" min="0" max="190" step="1" placeholder="27" required value="{{ old('age') }}">
                        <div class="invalid-feedback">
                            @error('age') {{ $message }} @else Proszę podać wiek. @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="goal" class="form-label">Cel:</label>
                        <select class="form-select @error('goal') is-invalid @else @if(old('goal')) is-valid @endif @enderror" id="goal" name="goal" required>
                            <option value="" disabled selected>Wybierz</option>
                            <option value="reduction" {{ old('goal') == 'reduction' ? 'selected' : '' }}>Redukcja masy ciała</option>
                            <option value="maintence" {{ old('goal') == 'maintence' ? 'selected' : '' }}>Utrzymanie masy ciała</option>
                            <option value="growth" {{ old('goal') == 'growth' ? 'selected' : '' }}>Wzrost masy ciała</option>
                        </select>
                        <div class="invalid-feedback">
                            @error('goal') {{ $message }} @else Proszę wybrać cel. @enderror
                        </div>
                        <div class="valid-feedback">
                            Dobrze!
                        </div>
                    </div>

                    <div class="ps-4 row mb-2">
                        <div class="form-check pt-3 pb-3">
                            <input class="form-check-input @error('regulations') is-invalid @else @if(old('regulations')) is-valid @endif @enderror" 
                                type="checkbox" name="regulations" id="regulations" value="1" required {{ old('regulations') ? 'checked' : '' }}>
                            <label class="form-check-label" for="regulations">
                                Zgadzam się z warunkami i polityką prywatności.
                            </label>
                            <div class="invalid-feedback">
                                @error('regulations') {{ $message }} @else Musisz zgodzić się na warunki. @enderror
                            </div>
                            <div class="valid-feedback">
                                Dobrze!
                            </div>
                        </div>
                    </div >

                    <div class="d-grid gap-1 pb-2 mb-2">
                        <button type="submit" class="btn btn-dark-orange">Zarejestruj się</button> 
                    </div>

                    <div class="d-flex flex-column align-items-center text-center">
                        <p>Posiadasz już konto? <a class="a-custom" href="{{ url('/login') }}">Zaloguj się</a>.</p>
                    </div>

                    <hr class="w-100 custom-hr">

                </div>

            <div class="d-flex flex-column align-items-center text-center">
                <p>Dowiedz się więcej na temat <a class="a-custom" href="{{ url('/regulamin') }}">Regulaminu & Polityki Prywatności</a>.</p>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
