# FitPlan App

![Logo projektu](link-do-twojego-logo.png)

Strona webowa **FitPlan** to narzędzie do zarządzania planami treningowymi oraz ćwiczeniami, stworzone w frameworku Laravel. Aplikacja umożliwia użytkownikom tworzenie i edytowanie planów treningowych.

---
## Spis treści

1. [Instalacja](#Instalacja)
2. [Funkcjonalności](#funkcjonalności)
3. [Wygląd projektu](#wyglad-projektu)
4. [Autor](#autor)

---

## Instalacja

1. **Sklonuj repozytorium:**

    Najlepiej umieść projekt w xampp/htdocks
   ```bash
   cd C:/xampp/htdocs

   git clone https://github.com/evee03/laravel-project.git

   cd laravel-project
   
   ```
2. **Zainstaluj zależności PHP:**

    ```bash
    composer install
    ```
3. **Skonfiguruj plik .env:**

    Skopiuj .env.exampe do .env
    ```bash
    cp .env.example .env
    ```
4. **Zaimportuj baze danych do XAMPP:**

    -Otwórz phpMyAdmin i utwórz nową bazę danych o nazwie fitplan_db

    -Przejdź do zakładki Import i wybierz plik który jest w folderze database/sql/fitplan_db
5. **Wygeneruj klucz aplikacji:**
    ```bash
    php artisan key:generate
    ```
    Dodaj go w APP_KEY w .env
6. **Uruchom serwer lokalny:**
    ```bash
    php artisan serve
    ```
    Aplikacja będzie dostępna pod adresem: http://localhost:8000.

## Funkcjonalności

- **Zarządzanie treningami:** Dodawanie, edytowanie i usuwanie treningów.
- **Baza ćwiczeń:** Przeglądanie dostępnych ćwiczeń z obrazkami i filmami.
- **Planowanie:** Tworzenie planów treningowych dopasowanych do użytkownika.
- **Nowoczesny wygląd:** Frontend został zrobiony za pomoca bootstrapa oraz customowych elementów w CSS.

## Wygląd projektu

### Strona główna
![Strona główna](strona_glowna_unlog.gif)

### Walidacja 
![Dodawanie treningu](walidacja_rejestracja.gif)

### Niepoprawne dane
![Statystyki](niepoprawny_email_lub_haslo.gif)

### Logowanie i rejestracja
![Statystyki](logowanie_i_rejestracja.gif)

### Treningi
![Strona główna](treningi_unlog.gif)

### Mięśnie & Ćwiczenia
![Strona główna](miescnie_i_cwiczenia.gif)

### Widok po zalogowaniu
![Strona główna](widok_po_zalogowaniu.gif)

### Ulubione treningi
![Strona główna](ulubione_treningi.gif)

---

## Autor

- **Imię i nazwisko:** Ewelina Musińska
- **Kontakt:** ewelina.musinska@gmail.com

---