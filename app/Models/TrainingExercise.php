<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    use HasFactory;

    // Określ nazwę tabeli
    
//     public function exercise()
// {
//     return $this->belongsTo(Exercise::class);  // Relacja z modelem Exercise
// }

protected $table = 'training_exercise';

    protected $fillable = [
        'training_id',
        'exercise_id',
        'day',
        'sets',
        'reps',
        'name_training_exercise',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id', 'id_exercise');
    }

}
