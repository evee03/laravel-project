<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use HasFactory;

class MuscleGroupController extends Controller
{
    protected $table = 'exercises_by_muscle_group'; 
    protected $primaryKey = 'id_exercises_by_muscle_group'; 
    public $timestamps = true; 

    public function showMuscleGroups()
    {
        $isLoggedIn = Auth::check();
        $muscleGroups = DB::table('exercises_by_muscle_group')->paginate(9);
        if ($isLoggedIn) {
            $user = Auth::user(); 
            $message = "Witaj, " . $user->name; 
        } else {
            $message = "Zaloguj się, aby uzyskać więcej informacji!";
        }

        return view('muscle-groups', compact('muscleGroups', 'message', 'isLoggedIn'));
    }

}
