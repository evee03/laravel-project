<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'image'];

    public function getRouteKeyName()
    {
        return 'name'; 
    }

    public function trainings()
    {
        return $this->hasMany(Training::class, 'category_id');
    }
}

