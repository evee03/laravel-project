# FitPlan

![Logo](resources/logo.png)

Strona webowa **FitPlan** służy do zarządzania planami treningowymi oraz ćwiczeniami, stworzone we frameworku Laravel. Aplikacja umożliwia użytkownikom tworzenie i edytowanie planów treningowych.

---
## Spis treści

1. [Instalacja](#Instalacja)
2. [Funkcjonalności](#funkcjonalności)
3. [Wygląd strony](#wyglad-projektu)
4. [Autor](#autor)

---

## Instalacja

Jeśli nie masz zainstlowanego XAMPP'a zrób to i włącz apache oraz mysql.

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

- **Logowanie i rejestracja:** Założenie konta w celu stworzenia personalizowanych pod siebie treningów, a także dodawanie innych do ulubionych.
- **Zarządzanie treningami:** Dodawanie, edytowanie i usuwanie treningów.
- **Baza ćwiczeń:** Przeglądanie dostępnych ćwiczeń wraz z ich filmami.
- **Planowanie:** Tworzenie planów treningowych dopasowanych do użytkownika.
- **Nowoczesny wygląd:** Frontend został zrobiony za pomoca bootstrapa oraz customowych elementów w CSS. Strona jest w pełni responsywna.

## Wygląd strony

### Strona główna
![Strona główna](resources/strona_glowna_unlog.gif)

### Walidacja 
![walidaca](resources/walidacja_rejestracja.gif)

### Niepoprawne dane
![niepoprawne dane](resources/niepoprawny_email_lub_haslo.gif)

### Logowanie i rejestracja
![logowanie i rejestracja](resources/logowanie_i_rejestracja.gif)

### Treningi
![treningi](resources/treningi_unlog.gif)

### Mięśnie & Ćwiczenia
![Strona główna](resources/miescnie_i_cwiczenia.gif)

### Widok po zalogowaniu
![widok_po_zalogowaniu](resources/widok_po_zalogowaniu.gif)

### Ulubione treningi
![ulubione_treningi](resources/ulubione_treningi.gif)

### Dodawanie treningu
![Dodawanie treningu](resources/dodawanie_treningu.gif)

### Edycja i usuwanie treningu
![Edycja i usuwanie treningu](resources/edycja_i_usuwanie_treningu.gif)

### Zakładki po zalogowaniu

| Strona Główna          | Mięśnie & Ćwiczenia          | Treningi           |
|----------------------|---------------------|---------------------|
| ![strona główna](resources/str_glowna.png) | ![miesnie i cwiczeni](resources/mie_i_cw.png) | ![treningi](resources/tre.png) |

| Utwórz trening         | Profil         | 
|----------------------|---------------------|
| ![utworz trening](resources/utworz_tre.png) | ![profil](resources/profil.png) | 

---

## Autor

  Ewelina Musińska

 **Kontakt:** ewelina.musinska@gmail.com, https://github.com/evee03

---
