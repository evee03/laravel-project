<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingExercise;
use App\Models\Exercise;

class TrainingController extends Controller
{
    public function index(Category $category)
{
    $trainings = $category->trainings; // Relacja z modelu Category do Training

    $trainings = $category->trainings()->paginate(9); //ilosc treningow wyswietlanych na stronie

    return view('trainings', compact('category', 'trainings'));
}

public function create()
{
    $exercises = Exercise::all(); // pobieranie wszystkich cwiczen
    $categories = Category::all();  //pobieranie wszystkich kategorii
    return view('createTraining', compact('exercises', 'categories'));
}


public function store(Request $request)
{
    // Walidacja danych
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'required|integer|min:1',
        'DaysPerWeek' => 'required|integer|min:1|max:7',
        'TimePerWorkout' => 'required|integer|min:1',
        'workout_days' => 'required|array|min:1',
        'workout_days.*.name' => 'required|string',
        'workout_days.*.exercises' => 'array',
        'workout_days.*.exercises.*.exercise_id' => 'required|exists:exercise,id_exercise',  // Zmienione z id na exercise_id
        'workout_days.*.exercises.*.series' => 'required|integer|min:1',
        'workout_days.*.exercises.*.reps' => 'required|string',
    ], [
        'workout_days.required' => 'Musisz dodać przynajmniej jeden dzień treningowy.',
        'workout_days.*.name.required' => 'Każdy dzień treningowy musi mieć nazwę.',
        'workout_days.*.exercises.*.exercise_id.required' => 'Musisz wybrać ćwiczenie.',
    ]);
    


    // Tworzenie treningu w tabeli `trainings`
    $training = Training::create([
        'category_id' => $validated['category_id'],
        'name' => $validated['name'],
        'description' => $validated['description'],
        'duration' => $validated['duration'],
        'DaysPerWeek' => $validated['DaysPerWeek'],
        'TimePerWorkout' => $validated['TimePerWorkout'],
        'user_id' => auth()->id(), // Przypisanie ID użytkownika
    ]);

    // Tworzenie dni treningowych i powiązanych ćwiczeń w tabeli `training_exercise`
    foreach ($validated['workout_days'] as $dayIndex => $day) {
        foreach ($day['exercises'] as $exercise) {
            TrainingExercise::create([
                'training_id' => $training->id,
                'exercise_id' => $exercise['exercise_id'],  // Zmienione na exercise_id
                'day' => $dayIndex + 1, // numer dnia treningowego
                'sets' => $exercise['series'],
                'reps' => $exercise['reps'],
                'name_training_exercise' => $day['name'], // nazwa dnia treningowego
            ]);
        }
    }
        

    return redirect()->route('categories.index')->with('success', 'Trening zapisano pomyślnie!');
}

public function edit($id)
{
    $training = Training::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
    $exercises = Exercise::all(); // Wszystkie dostępne ćwiczenia
    $categories = Category::all(); // Kategorie treningów

    // Pobierz dni treningowe z tabeli training_exercise
    $trainingDays = $training->exercises()
        ->orderBy('day')
        ->get()
        ->groupBy('day')
        ->map(function ($dayExercises, $day) {
            return [
                'day' => $day,
                'exercises' => $dayExercises->map(function ($exercise) {
                    return [
                        'id' => $exercise->id,
                        'name' => $exercise->name_training_exercise,
                        'exercise_id' => $exercise->exercise_id,
                        'sets' => $exercise->sets,
                        'reps' => $exercise->reps,
                    ];
                }),
            ];
        })
        ->values();

    return view('editTraining', compact('training', 'exercises', 'categories', 'trainingDays'));
}


public function update(Request $request, $id)
{
    $training = Training::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

    // Walidacja danych
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'days' => 'array|required',
        'days.*.name' => 'required|string|max:255',
        'days.*.exercises' => 'array|required',
        'days.*.exercises.*.exercise_id' => 'required|exists:exercise,id_exercise',
        'days.*.exercises.*.sets' => 'required|integer|min:1',
        'days.*.exercises.*.reps' => 'required|integer|min:1',
    ]);

    // Aktualizacja treningu
    $training->update([
        'category_id' => $validated['category_id'],
        'name' => $validated['name'],
        'description' => $validated['description'],
    ]);

    // Usuń istniejące dni treningowe
    $training->exercises()->delete();

    // Dodaj nowe dni treningowe
    foreach ($validated['days'] as $dayData) {
        foreach ($dayData['exercises'] as $exerciseData) {
            $training->exercises()->create([
                'day' => $dayData['name'],
                'exercise_id' => $exerciseData['exercise_id'],
                'sets' => $exerciseData['sets'],
                'reps' => $exerciseData['reps'],
                'name_training_exercise' => $exerciseData['name'] ?? null,
            ]);
        }
    }

    return redirect()->route('categories.index')->with('success', 'Trening zaktualizowano pomyślnie!');
}




    // TrainingController.php (destroy)
    public function destroy($id)
    {
        $training = Training::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $training->delete();

        return redirect()->route('categories.index')->with('success', 'Trening usunięto pomyślnie!');
    }


    public function show($id)
    {
        $training = Training::findOrFail($id); // Pobierz trening na podstawie ID

        // Pobieramy powiązane ćwiczenia
        $trainingExercises = TrainingExercise::with('exercise')  // Załadowanie powiązanych ćwiczeń
        ->where('training_id', $id)
        ->get();

        return view('show', compact('training', 'trainingExercises')); // Przekaż dane do widoku
    }
    

}
