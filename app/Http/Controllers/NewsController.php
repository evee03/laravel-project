<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function fetchNews()
{
    // URL API
    $url = 'https://api.dane.gov.pl/1.4/resources/22239,kluby-sportowe-zarejestrowane-przez-sad?lang=pl';

    // Pobierz dane z API
    $response = Http::get($url);

    if ($response->successful()) {
        $data = $response->json();

        // Zweryfikuj, czy istnieje 'data.attributes'
        if (isset($data['data']['attributes'])) {
            return $data['data']['attributes'];
        }
    }

    // Zwróć pustą tablicę w przypadku niepowodzenia
    return [];
}

public function fetchSecondNews()
{
    // URL drugiego API
    $url = 'https://api.dane.gov.pl/1.4/resources/32480,zadania-zlecone-z-obszaru-sport?lang=pl';

    // Pobierz dane z API
    $response = Http::get($url);

    if ($response->successful()) {
        $data = $response->json();

        // Zweryfikuj, czy istnieje 'data.attributes'
        if (isset($data['data']['attributes'])) {
            return $data['data']['attributes'];
        }
    }

    // Zwróć pustą tablicę w przypadku niepowodzenia
    return [];
}

}
