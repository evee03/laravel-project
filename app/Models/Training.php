<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'trainings';

    protected $fillable = ['category_id', 'name', 'goal', 'description', 'duration', 'DaysPerWeek', 'TimePerWorkout', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();//tutaj dodalam 
    }

    public function trainingExercises()
    {
        return $this->hasMany(TrainingExercise::class, 'training_id');
    }
        
    public function trainingDays()
    {
        return $this->hasMany(TrainingDay::class);
    }

    // App\Models\Training.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function workoutDays()
    {
        return $this->hasMany(WorkoutDay::class); // Relacja z tabelą workout_days
    }

    public function exercises()
    {
        return $this->hasMany(TrainingExercise::class, 'training_id');
    }
    
}



