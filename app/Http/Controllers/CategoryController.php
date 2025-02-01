<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $categories = Category::paginate(9); 
        
        return view('categories', compact('categories'));
    }

    public function showTrainings(Category $category)
    {
        $trainings = $category->trainings; 
        
        return view('trainings', compact('trainings', 'category'));
    }
}


