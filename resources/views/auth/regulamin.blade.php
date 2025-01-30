<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulamin i Polityka Prywatności - FitPlan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #343a40; /* Ciemne tło */
            color: rgb(35, 35, 35); /* Jasny kolor tekstu */
        }
        .bg-light {
            background-color: rgba(255, 255, 255, 0.6) !important; /* Lekko przezroczysty jasny kolor dla kontenera */
        }
        .container {
            border-radius: 25px;
        }
        .custom-hr {
            border: 2px solid rgb(0, 0, 0);
        }
        .custom-bg {
            background-image: linear-gradient(to bottom, #cc5800, #ffb24d);       
        }
        .icon-hover {
            transition: color 0.3s; 
        }
        .icon-hover:hover {
            color: #cc5800; 
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
        <img src="./image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        FitPlan
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="#">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/login') }}">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('/register')}}">Rejestracja</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-4 px-5 mt-5 bg-light">
    <div class="d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-left-circle-fill fs-1 icon-hover" style="cursor: pointer;" onclick="window.history.back()"></i>
        <h1 class="ms-4 mb-0">Regulamin i Polityka Prywatności FitPlan</h1>
    </div>
        <hr class="custom-hr">

        <div class="mt-4 text-center">
            <h2 class="container-fluid custom-bg mx-0 p-1">Regulamin</h2>
            <h5>1. Postanowienia ogólne</h5>
            <p>1.1. Regulamin określa zasady korzystania z aplikacji FitPlan. Obejmuje on wszystkie aspekty związane z korzystaniem z Aplikacji, w tym zasady rejestracji, zarządzania kontem, dostępnych funkcji oraz obowiązków użytkowników. Użytkownicy są zobowiązani do zapoznania się z treścią Regulaminu przed rozpoczęciem korzystania z Aplikacji, a także do jego przestrzegania w trakcie korzystania z oferowanych usług.</p>
            <p>1.2. Aplikacja jest dostępna dla użytkowników, którzy chcą zarządzać swoimi dietami i treningami, a także gdy chcą je na bieżąco monitorować. FitPlan umożliwia użytkownikom planowanie posiłków, monitorowanie postępów w treningach oraz uzyskiwanie spersonalizowanych rekomendacji dotyczących diety i aktywności fizycznej. Użytkownicy mogą korzystać z rozbudowanych narzędzi do tworzenia planów żywieniowych i treningowych, co wspiera ich w osiąganiu celów zdrowotnych i fitnessowych.</p>
            <p>1.3. Użytkownik, rejestrując się w Aplikacji, akceptuje niniejszy Regulamin. Rejestracja wiąże się z potwierdzeniem, że użytkownik zapoznał się z zasadami korzystania z Aplikacji oraz zgadza się na przetwarzanie swoich danych osobowych zgodnie z Polityką Prywatności. Użytkownik ma również obowiązek podać prawdziwe i aktualne dane, które będą wykorzystywane do identyfikacji konta oraz komunikacji z administracją Aplikacji.</p>


            <h5>2. Rejestracja</h5>
            <p>2.1. Korzystanie z Aplikacji wymaga rejestracji konta użytkownika. Rejestracja jest procesem niezbędnym do uzyskania dostępu do pełnej funkcjonalności Aplikacji, w tym możliwości tworzenia spersonalizowanych planów dietetycznych i treningowych. Proces rejestracji obejmuje wypełnienie formularza, w którym użytkownik musi podać określone informacje, które zostaną wykorzystane do utworzenia konta oraz do identyfikacji użytkownika w systemie. Na podstawie podanych danych kalkulatory mogą obliczyć poprawne BMI, potrzebe dzienną makroskładnikó i wiele więcej.</p>
            <p>2.2. Użytkownik jest zobowiązany do podania prawdziwych danych podczas rejestracji. Wszelkie informacje wprowadzone podczas tworzenia konta, takie jak imię i nazwisko, adres e-mail oraz hasło, muszą być rzetelne i aktualne. Podawanie fałszywych danych jest zabronione i może prowadzić do zablokowania konta. Administrator zastrzega sobie prawo do weryfikacji podanych informacji oraz żądania ich aktualizacji w przypadku stwierdzenia niezgodności.</p>
            <p>2.3. Użytkownik ponosi odpowiedzialność za dane logowania i ich poufność. Użytkownik jest zobowiązany do zachowania tajności swojego hasła oraz innych danych dostępowych do konta. W przypadku podejrzenia, że konto mogło zostać naruszone, użytkownik powinien niezwłocznie skontaktować się z administratorem Aplikacji. Administrator nie ponosi odpowiedzialności za straty wynikłe z nieprzestrzegania zasad bezpieczeństwa przez użytkownika, w tym za przypadki nieautoryzowanego dostępu do konta.</p>

            <h5>3. Korzystanie z Aplikacji</h5>
            <p>3.1. Użytkownik ma prawo do korzystania z funkcji Aplikacji, takich jak dodawanie diet i treningów. Aplikacja FitPlan oferuje szereg funkcji, które umożliwiają użytkownikom zarządzanie swoimi planami żywieniowymi i treningowymi. Użytkownicy mogą tworzyć i modyfikować diety, monitorować postępy, a także zapisywać oraz analizować swoje treningi. Aplikacja jest zaprojektowana w sposób, który umożliwia łatwe dostosowywanie planów do indywidualnych potrzeb użytkownika, co ma na celu wspieranie ich w osiąganiu założonych celów zdrowotnych i fitnessowych.</p>
            <p>3.2. Użytkownik zobowiązuje się do korzystania z Aplikacji zgodnie z obowiązującym prawem oraz niniejszym Regulaminem. Użytkownik ma obowiązek przestrzegania wszelkich przepisów prawnych dotyczących korzystania z usług świadczonych przez Aplikację. Obejmuje to m.in. zakaz korzystania z Aplikacji w sposób, który mógłby zaszkodzić innym użytkownikom lub wprowadzić ich w błąd. Użytkownicy nie mogą także publikować treści, które są obraźliwe, niezgodne z prawem lub naruszają prawa innych osób. Naruszenie tych zasad może prowadzić do nałożenia sankcji, w tym zablokowania dostępu do Aplikacji.</p>

            <h5>4. Ochrona danych osobowych</h5>
            <p>4.1. Administrator dba o ochronę danych osobowych użytkowników zgodnie z obowiązującymi przepisami. Wszelkie dane osobowe zbierane przez Aplikację są traktowane z najwyższą starannością, aby zapewnić ich bezpieczeństwo oraz prywatność. Administrator wdraża odpowiednie środki techniczne i organizacyjne, aby chronić dane przed nieuprawnionym dostępem, utratą lub zniszczeniem. Użytkownicy mogą być pewni, że ich dane są przetwarzane w sposób zgodny z prawem oraz etyką, a wszelkie działania związane z ich danymi są transparentne i uzasadnione.</p>
            <p>4.2. Szczegóły dotyczące przetwarzania danych osobowych znajdują się w Polityce Prywatności. Użytkownicy mają dostęp do dokumentu, który szczegółowo opisuje, jakie dane są zbierane, w jakim celu są przetwarzane oraz jakie prawa przysługują użytkownikom w związku z przetwarzaniem ich danych. Polityka Prywatności zawiera również informacje na temat stosowanych środków zabezpieczających oraz możliwości kontaktu w przypadku pytań lub wątpliwości dotyczących prywatności.</p>

            <h5>5. Zmiany Regulaminu</h5>
            <p>5.1. Administrator zastrzega sobie prawo do zmiany Regulaminu. Wszelkie zmiany w regulaminie mogą być wynikiem zmian w przepisach prawnych, dostosowania do potrzeb użytkowników, jak również wprowadzenia nowych funkcji w Aplikacji. Użytkownicy zostaną poinformowani o zmianach w sposób widoczny, na przykład poprzez komunikaty wyświetlane w Aplikacji lub na stronie internetowej. Użytkownicy będą mieli również możliwość zapoznania się z nową wersją Regulaminu przed jego wejściem w życie.</p>

            <h5>6. Postanowienia końcowe</h5>
            <p>6.1. Regulamin wchodzi w życie z dniem publikacji na stronie Aplikacji. Użytkownicy są zobowiązani do regularnego zapoznawania się z treścią Regulaminu, ponieważ wszelkie zmiany będą obowiązywały od momentu ich publikacji. W przypadku braku akceptacji nowych warunków, użytkownik ma prawo do zaprzestania korzystania z Aplikacji.</p>
            <p>6.2. Wszelkie spory związane z korzystaniem z Aplikacji będą rozstrzygane przez sąd właściwy dla siedziby Administratora. Użytkownicy zobowiązują się do podejmowania prób mediacji przed skierowaniem sprawy do sądu. Regulamin określa również zasady dotyczące właściwego prawa, które będzie miało zastosowanie w przypadku sporów, zapewniając użytkownikom klarowność i bezpieczeństwo prawne w korzystaniu z Aplikacji.</p>

        </div>

        <hr class="mt-5 custom-hr">
        
        <div class="mt-4 text-center">
            <h2 class="custom-bg p-2">Polityka prywatności</h2>
            <h5>1. Postanowienia ogólne</h5>
            <p>1.1. Niniejsza Polityka Prywatności określa zasady przetwarzania danych osobowych użytkowników Aplikacji FitPlan. Polityka ma na celu zapewnienie użytkownikom pełnej informacji o tym, w jaki sposób ich dane są zbierane, przetwarzane, wykorzystywane oraz przechowywane. Obejmuje także informacje o prawach przysługujących użytkownikom w związku z przetwarzaniem ich danych osobowych, co jest zgodne z obowiązującymi przepisami prawa, w tym z Ogólnym Rozporządzeniem o Ochronie Danych (RODO).</p>
            <p>1.2. Administratorem danych osobowych jest [Nazwa Firmy], z siedzibą w [adres]. Administrator odpowiada za przestrzeganie przepisów dotyczących ochrony danych osobowych oraz podejmuje wszelkie niezbędne środki w celu zabezpieczenia danych użytkowników. W przypadku jakichkolwiek pytań dotyczących przetwarzania danych osobowych, użytkownicy mogą kontaktować się z Administratorem bezpośrednio poprzez dane kontaktowe podane w Polityce Prywatności. Administrator ma obowiązek informować użytkowników o wszelkich istotnych zmianach w zakresie przetwarzania ich danych oraz zapewnić im możliwość wyrażenia zgody na przetwarzanie danych w sposób dobrowolny i świadomy.</p>


            <h5>2. Przetwarzanie danych osobowych</h5>
            <p>2.1. Dane osobowe użytkowników przetwarzane są w celu zapewnienia optymalnego korzystania z Aplikacji FitPlan. W szczególności, dane są wykorzystywane do:</p>
            <p>– Rejestracji i zarządzania kontem użytkownika, co obejmuje tworzenie profilu, logowanie oraz umożliwienie użytkownikowi dostępu do spersonalizowanych treści i funkcji aplikacji. Użytkownicy mają możliwość aktualizacji swoich danych w dowolnym momencie.</p>
            <p>– Umożliwienia korzystania z funkcji Aplikacji, takich jak dodawanie diet i treningów, co pozwala użytkownikom na skuteczne planowanie i monitorowanie postępów w zdrowym stylu życia. Dzięki zebranym danym, aplikacja może dostosować się do indywidualnych potrzeb użytkownika.</p>
            <p>– Odpowiedzi na zapytania użytkowników, co jest kluczowe dla zapewnienia wsparcia i pomocy w przypadku problemów technicznych czy pytań dotyczących funkcjonowania aplikacji. Administrator podejmuje działania, aby szybko i skutecznie rozwiązywać wszelkie wątpliwości zgłaszane przez użytkowników.</p>

            <p>2.2. Administrator przetwarza następujące dane osobowe, które są niezbędne do prawidłowego funkcjonowania aplikacji:</p>
            <p>– Imię i nazwisko użytkownika, które są wymagane do identyfikacji konta oraz personalizacji usług oferowanych przez aplikację.</p>
            <p>– Adres e-mail, który jest wykorzystywany do komunikacji z użytkownikiem, w tym do wysyłania potwierdzeń rejestracji, powiadomień oraz informacji o aktualizacjach.</p>
            <p>– Hasło, które jest przechowywane w postaci zaszyfrowanej, co zapewnia dodatkowe bezpieczeństwo danych użytkowników. Użytkownicy są zobowiązani do tworzenia silnych haseł, aby chronić swoje konta przed nieautoryzowanym dostępem.</p>
            <p>– Preferencje dotyczące diet i treningów, które pozwalają na dostosowanie oferty aplikacji do indywidualnych potrzeb i celów użytkowników, co przyczynia się do efektywności korzystania z Aplikacji.</p>

            <h5>3. Bezpieczeństwo danych</h5>
            <p>3.1. Administrator podejmuje odpowiednie środki techniczne i organizacyjne w celu ochrony danych osobowych przed ich utratą, nieuprawnionym dostępem i innymi zagrożeniami. W ramach tych działań, stosowane są nowoczesne technologie szyfrowania, które zabezpieczają dane podczas ich przesyłania oraz przechowywania. Regularnie przeprowadzane są audyty bezpieczeństwa oraz testy penetracyjne, aby identyfikować ewentualne luki w zabezpieczeniach. Ponadto, pracownicy Administratora są szkoleni w zakresie ochrony danych osobowych oraz polityki prywatności, co pozwala na minimalizowanie ryzyka błędów ludzkich.</p>

            <h5>4. Prawa użytkownika</h5>
            <p>4.1. Użytkownik ma prawo dostępu do swoich danych osobowych, ich poprawiania oraz usuwania. Oznacza to, że użytkownik może w każdej chwili sprawdzić, jakie dane są przechowywane przez Administratora, a także zaktualizować informacje, które mogły ulec zmianie. W przypadku, gdy użytkownik zdecyduje się na usunięcie swoich danych, Administrator podejmuje odpowiednie kroki w celu zapewnienia, że wszystkie zebrane informacje są usuwane zgodnie z obowiązującymi przepisami prawnymi oraz wewnętrznymi procedurami ochrony danych.</p>

            <p>4.2. Użytkownik może w każdej chwili cofnąć zgodę na przetwarzanie danych osobowych. W takiej sytuacji, Administrator niezwłocznie zaprzestaje przetwarzania tych danych, chyba że istnieją inne podstawy prawne do ich przetwarzania. Użytkownik może także zgłaszać wszelkie wątpliwości dotyczące przetwarzania jego danych osobowych, a Administrator zobowiązuje się do ich rozpatrzenia w możliwie najszybszym czasie.</p>

            <h5>5. Zmiany Polityki Prywatności</h5>
            <p>5.1. Administrator zastrzega sobie prawo do zmiany Polityki Prywatności. O wszelkich zmianach użytkownicy zostaną poinformowani w sposób widoczny, co zapewnia przejrzystość i umożliwia użytkownikom dostosowanie się do nowych regulacji. Informacje o zmianach będą przekazywane za pośrednictwem powiadomień w aplikacji oraz na stronie internetowej, aby użytkownicy byli na bieżąco z aktualnymi zasadami przetwarzania ich danych osobowych. W przypadku istotnych zmian, Administrator może także wystosować dodatkowe komunikaty, aby zapewnić pełną informację o wpływie tych zmian na użytkowników.</p>
        </div>

        <hr class="mt-5 custom-hr">
        <footer class="text-center mb-4">
            <p>&copy; 2024 FitPlan. Regulamin został wygenerowany przez ChatGPT w celu demonstracji.</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
