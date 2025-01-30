<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Pobiera dane aktualnie zalogowanego użytkownika
        return view('profile', compact('user')); // Przekazuje zmienną $user do widoku
    }

    public function edit()
    {
        $user = Auth::user(); //aktualnie zalogowany
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Walidacja danych
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:20|regex:/^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+$/',
            'surname' => 'required|string|min:3|max:20|regex:/^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+$/',
            'sport_level' => 'required',
            'weight' => 'required|integer|between:0,999',
            'height' => 'required|integer|between:0,999',
            'age' => 'required|integer|between:0,190',
            'goal' => 'required',

        ],[
            'name.required' => 'Proszę podać imię.',
            'name.min' => 'Imię musi posiadać co najmniej 3 znaki.',
            'name.max' => 'Imię nie może mieć więcej niż 20 znaków.',
            'name.regex' => 'Nazwa nie może zawierać liczb, spacji oraz znaków specjalnych.',

            'surname.required' => 'Proszę podać nazwisko.',
            'surname.min' => 'Nazwisko musi posiadać co najmniej 3 znaki.',
            'surname.max' => 'Nazwisko nie może mieć więcej niż 20 znaków.',
            'surname.regex' => 'Nazwa nie może zawierać liczb, spacji oraz znaków specjalnych.',

            'sport_level.required' => 'Proszę zaznaczyć wybór.',
            
            'weight.required' => 'Proszę podać wagę.',
            'weight.numeric' => 'Waga musi być liczbą całkowitą.',
            'weight.between' => 'Waga musi być większa lub równa 0 i mniejsza od 999.',

            'height.required' => 'Proszę podać wzrost.',
            'height.numeric' => 'Wzrost musi być liczbą całkowitą.',
            'height.between' => 'Wzrost musi być większy lub równy 0 i mniejszy od 999.',

            'age.required' => 'Proszę podać wiek.',
            'age.integer' => 'Wiek musi być liczbą całkowitą.',
            'age.between' => 'Wiek musi być większy lub równy 0 i mniejszy od 190.',

            'goal.required' => 'Proszę zaznaczyć wybór.',
        ]);

        // Aktualizacja danych
        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profil został zaktualizowany.');
    }

    public function destroy(Request $request)
{
    $user = $request->user(); // Pobierz zalogowanego użytkownika

    // Usuń użytkownika z bazy danych
    $user->delete();

    // Wyloguj użytkownika
    auth()->logout();

    // Przekieruj na stronę główną z komunikatem
    return redirect('/')->with('success', 'Konto zostało pomyślnie usunięte.');
}

}

