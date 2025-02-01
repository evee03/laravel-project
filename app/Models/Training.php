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
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function trainingExercises()
    {
        return $this->hasMany(TrainingExercise::class, 'training_id');
    }
        
    public function trainingDays()
    {
        return $this->hasMany(TrainingDay::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutDays()
    {
        return $this->hasMany(WorkoutDay::class); 
    }

    public function exercises()
    {
        return $this->hasMany(TrainingExercise::class, 'training_id');
    }
    
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'training_id', 'user_id');
    }
}



