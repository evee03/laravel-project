<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Training;

class HomeController extends Controller
{
    protected $newsController;

    public function __construct(NewsController $newsController)
    {
        $this->newsController = $newsController;
    }

    public function index()
    {
        $data = [];

        if (Auth::check()) {
            $userId = Auth::id();
            $trainings = Training::where('user_id', $userId)->get();
            $favoriteTrainings = Auth::user()->favorites;
            $data['trainings'] = $trainings;
            $data['favoriteTrainings'] = $favoriteTrainings;
        }

        return view('home', $data);
    }

    public function favorite($id)
    {
        $training = Training::findOrFail($id);
        $user = Auth::user();
        $user->favorites()->toggle($id);
        $is_favorite = $user->favorites()->where('training_id', $id)->exists();

        return response()->json([
            'is_favorite' => $is_favorite,
        ]);
    }

    public function unfavorite($id)
    {
        $user = Auth::user();
        $training = Training::findOrFail($id);
        $user->favorites()->detach($training->id);

        return response()->json(['status' => 'success', 'message' => 'Training removed from favorites.']);
    }
}
