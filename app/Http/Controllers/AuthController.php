<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:20|regex:/^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+$/',
            'surname' => 'required|string|min:3|max:20|regex:/^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:255',
            'sport_level' => 'required',
            'weight' => 'required|integer|between:0,999',
            'height' => 'required|integer|between:0,999',
            'age' => 'required|integer|between:0,190',
            'goal' => 'required',
            'regulations' => 'required|boolean', 
        ],[
            'name.required' => 'Proszę podać imię.',
            'name.min' => 'Imię musi posiadać co najmniej 3 znaki.',
            'name.max' => 'Imię nie może mieć więcej niż 20 znaków.',
            'name.regex' => 'Nazwa nie może zawierać liczb, spacji oraz znaków specjalnych.',

            'surname.required' => 'Proszę podać nazwisko.',
            'surname.min' => 'Nazwisko musi posiadać co najmniej 3 znaki.',
            'surname.max' => 'Nazwisko nie może mieć więcej niż 20 znaków.',
            'surname.regex' => 'Nazwa nie może zawierać liczb, spacji oraz znaków specjalnych.',

            'email.required' => 'Proszę podać nazwisko.',
            'email.email' => 'Proszę podać prawidłowy adres e-mail.',
            'email.unique' => 'Ten adres e-mail jest już zajęty.',

            'password.required' => 'Proszę podać hasło.',
            'password.min' => 'Hasło musi składać się z przynajmniej 8 znaków.',
            'password.confirmed' => 'Hasła muszą się zgadzać.',
            'password.max' => 'Hasło musi mieć mniej niż 255 znaków.',

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

            'regulations.accepted' => 'Musisz zgodzić się na warunki.',
            'regulations.required' => 'To pole jest wymagane.'
        ]);

        $user = new User();

        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->sport_level = $validatedData['sport_level'];
        $user->weight = $validatedData['weight'];
        $user->height = $validatedData['height'];
        $user->age = $validatedData['age'];
        $user->goal = $validatedData['goal'];
        $user->regulations = $validatedData['regulations'];

        $user->save();

        return back()->with('success', 'Rejestracja przebiegła pomyślnie.');

    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials))
        {
            return redirect('/home')->with('success', 'Logowanie udane');
        }

        return back()->with('error', 'Niepoprawny email lub hasło');
    }
}

