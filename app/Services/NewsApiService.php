<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsApiService
{
    public function getArticles($query)
    {
        try {
            // Wykonaj zapytanie do API
            $response = Http::get('https://api.thenewsapi.com/v1/news/all', [
                'api_token' => env('THE_NEWS_API_KEY'),  // Twój klucz API
                'categories' => $query,  // Parametr wyszukiwania
                'language' => 'en',  // Filtr językowy
                'page' => 1,  // Pierwsza strona wyników
                'headlines_per_category' => 3,  // Liczba wyników na kategorię
            ]);

            // Sprawdź, czy odpowiedź jest poprawna (status 200)
            if ($response->successful()) {
                return $response->json(); // Zwróć dane w formacie JSON
            } else {
                Log::error('Błąd zapytania do NewsAPI', [
                    'status_code' => $response->status(),
                    'message' => $response->body(),
                ]);
                return null;  // Zwróć null, jeśli nie udało się pobrać danych
            }
        } catch (\Exception $e) {
            Log::error('Błąd połączenia z NewsAPI', ['error' => $e->getMessage()]);
            return null;
        }
    }
}
