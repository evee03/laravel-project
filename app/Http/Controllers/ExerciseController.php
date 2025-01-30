<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use DB;

class ExerciseController extends Controller
{
    public function showExercisesByMuscleGroup($id)
    {
        // Pobranie grupy mięśniowej
        $muscleGroup = DB::table('exercises_by_muscle_group')->where('id_exercises_by_muscle_group', $id)->first();


        // Pobranie ćwiczeń przypisanych do danej grupy mięśniowej
        $exercises = DB::table('exercise')
            ->where('id_exercises_by_muscle_group', $id)
            ->paginate(9);
        // Przekazanie danych do widoku
        return view('exercises-by-muscle-group', compact('muscleGroup', 'exercises'));
    }

}
