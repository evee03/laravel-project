<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;

class CategoryController extends Controller
{
    // Metoda do wyświetlania wszystkich kategorii
    public function index()
    {
        // Pobierz wszystkie kategorie
        $categories = Category::all();
        
        // Przekaż kategorie do widoku
        return view('categories', compact('categories'));
    }

    // Metoda do wyświetlania treningów w wybranej kategorii
    public function showTrainings(Category $category)
    {
        // Pobierz treningi dla wybranej kategorii
        $trainings = $category->trainings; // Załóżmy, że masz relację w modelu Category do treningów

        // Przekaż dane do widoku
        return view('trainings', compact('trainings', 'category'));
    }
}


