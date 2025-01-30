<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $newsController;

    public function __construct(NewsController $newsController)
    {
        $this->newsController = $newsController;
    }

    public function index()
    {
        // Pobierz dane z obu API
        $firstNews = $this->newsController->fetchNews();
        $secondNews = $this->newsController->fetchSecondNews();
    
        // Przekaż dane do widoku
        return view('home', [
            'firstNews' => $firstNews,
            'secondNews' => $secondNews,
        ]);
    }
    

}
