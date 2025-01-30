<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use HasFactory;

class MuscleGroupController extends Controller
{
    protected $table = 'exercises_by_muscle_group'; // Nazwa tabeli w bazie danych

    protected $primaryKey = 'id_exercises_by_muscle_group'; // Nazwa klucza głównego

    public $timestamps = true; // Upewnij się, że masz kolumny `created_at` i `updated_at`

    public function showMuscleGroups()
    {
        // Sprawdzanie, czy użytkownik jest zalogowany
        $isLoggedIn = Auth::check();

        // Pobranie danych z tabeli exercises_by_muscle_group
        $muscleGroups = DB::table('exercises_by_muscle_group')->get();

        // Jeśli użytkownik jest zalogowany, możesz dodać dodatkowe dane (np. powitanie)
        if ($isLoggedIn) {
            $user = Auth::user(); // Pobranie danych użytkownika
            $message = "Witaj, " . $user->name; // Powitanie użytkownika
        } else {
            $message = "Zaloguj się, aby uzyskać więcej informacji!";
        }

        // Przekazanie danych do widoku
        return view('muscle-groups', compact('muscleGroups', 'message', 'isLoggedIn'));
    }

}
