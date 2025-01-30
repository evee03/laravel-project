<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/') }}">Strona Główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/muscle-groups') }}">Mięśnie & Ćwiczenia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/categories') }}">Treningi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center active" href="{{ url('/login') }}">Logowanie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ url('/register') }}">Rejestracja</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Error icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <!--Success-->
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert" id="success-alert">
        <div class="d-flex align-items-center">
            <svg class="bi flex-shrink-0 me-2 icon-small" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="flex-grow-1">
                {{ Session::get('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="bg-custom container class p-5 mt-5 mb-3">

            <div class="d-flex flex-column align-items-center text-center">
                <h1>Logowanie</h1>
                <p>Zaloguj się aby przejść do serwisu.</p>
            </div>

            <hr class="w-100 custom-hr">

            <!-- Error -->
            @if (Session::has('error'))
            <div class="alert custom-alert alert-dismissible fade show" role="alert" id="error-alert">
                <div class="d-flex align-items-center">
                    <svg class="alert-icon" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="flex-grow-1 alert-text">
                        {{ Session::get('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="container px-5">
                <div class="row align-items-center justify-content-center vh-60">
                    <div class="col-md-6"> 
                        <div class="row">

                            <div class="col-12 mb-2">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @else @if(old('email')) is-valid @endif @enderror" id="email" autocomplete="email" placeholder="a.kowalska@gmail.com" required value="{{ old('email') }}">
                                <div class="invalid-feedback">
                                    @error('email') {{ $message }} @else Proszę podać prawidłowy adres email. @enderror
                                </div>
                                <div class="valid-feedback">
                                    Dobrze!
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="password" class="form-label">Hasło:</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @else @if(old('password')) is-valid @endif @enderror" id="password" placeholder="********" required>
                                <div class="invalid-feedback">
                                    @error('password') {{ $message }} @else Proszę podać hasło. @enderror
                                </div>
                                <div class="valid-feedback">
                                    Dobrze!
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="" class="a-custom2 text-decoration-none small me-3" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Zapomniałeś hasła?</a>
                            </div>

                        </div>

                        <div class="d-grid gap-1 pt-2 pb-2 mb-2">
                            <button type="submit" class="btn btn-dark-orange">Zaloguj się</button>
                        </div>

                        <div class="d-flex flex-column align-items-center text-center mb-2">
                            <p>Nie posiadasz jeszcze konta? <a class="a-custom" href="{{ url('register') }}">Zarejestruj się!</a>.</p>
                        </div>

                        
                    </div>

                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('image/supporting-person.svg') }}" alt="Supporting Person" class="img-fluid custom-image" style="max-width: 100%; height: auto;">
                    </div>

                    <hr class="w-100 custom-hr">
                    
                </div>
            </div>

            <div class="d-flex flex-column align-items-center text-center">
                <p>Dowiedz się więcej na temat <a class="a-custom" href="{{ url('/regulamin') }}">Regulaminu & Polityki Prywatności</a>.</p>
            </div>
        </div>
    </form>

    <!-- MODAL Forgot password -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="bg-custom-modal modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Nie pamiętasz hasła?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->has('email_reset'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email_reset') }}
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <p>Wpisz adres e-mail konta, do którego chcesz odzyskać dostęp.</p>
                            <label for="resetEmail" class="form-label">Podaj swój email:</label>
                            <input type="email" name="email_reset" class="form-control" id="resetEmail" placeholder="a.kowalska@gmail.com" required>
                        </div>
                        <button type="submit" class="btn btn-dark-orange">Wyślij link resetujacy hasło</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
