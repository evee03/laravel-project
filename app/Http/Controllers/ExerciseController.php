<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExerciseController extends Controller
{
    public function showExercisesByMuscleGroup($id)
    {
        $muscleGroup = DB::table('exercises_by_muscle_group')->where('id_exercises_by_muscle_group', $id)->first();

        $exercises = DB::table('exercise')
            ->where('id_exercises_by_muscle_group', $id)
            ->paginate(9);

        return view('exercises-by-muscle-group', compact('muscleGroup', 'exercises'));
    }

    public function searchExercises(Request $request)
    {
        $query = $request->input('query'); 
        $muscleGroupId = $request->input('muscleGroupId'); 

        $exercises = DB::table('exercise')
            ->where('id_exercises_by_muscle_group', $muscleGroupId)
            ->where('name_exercise', 'like', "%{$query}%")
            ->get();

        return response()->json($exercises);
    }
}
