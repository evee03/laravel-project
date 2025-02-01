<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercise';


public function create()
{
    $exercises = Exercise::all(); 
    return view('training.create', compact('exercise'));
}


    public function muscleGroup()
    {
        return $this->belongsTo(ExercisesByMuscleGroup::class, 'id_exercises_by_muscle_group');
    }

    public function trainingExercises()
    {
        return $this->hasMany(TrainingExercise::class, 'exercise_id', 'id_exercise');
    }

    public function exerciseByMuscleGroup()
    {
        return $this->belongsTo(ExerciseByMuscleGroup::class, 'id_exercises_by_musle_group');
    }

}

