<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_id', // ID powiązanego treningu
        'name',        // Nazwa dnia treningowego
    ];

    /**
     * Relacja: Dzień należy do treningu.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    /**
     * Relacja: Dzień treningowy ma wiele ćwiczeń.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class)
            ->withPivot(['series', 'reps']) // Dodatkowe dane dla ćwiczeń
            ->withTimestamps();            // Automatyczne zarządzanie timestampami
    }
}
