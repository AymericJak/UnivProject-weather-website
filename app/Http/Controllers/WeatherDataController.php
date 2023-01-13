<?php

namespace App\Http\Controllers;

use App\Models\WeatherData;
use App\Services\WeatherAPIService;
use Exception;
use Illuminate\Http\Request;

class WeatherDataController extends Controller {

    public function search(Request $request) {
        $townName = ucfirst($request->get('search'));
        $weatherAPIService = new WeatherAPIService();
        $donnees = [];
        $errorMessage = null;

        try {
            $weatherDataWTTR = $weatherAPIService->getWeatherDataFromWTTR($townName);
            $donnees = [
                'city' => $weatherDataWTTR["nearest_area"][0]["areaName"][0]["value"],
                'temperature' => $weatherDataWTTR["current_condition"][0]["temp_C"],
                'pression' => $weatherDataWTTR["current_condition"][0]["pressure"],
                'humidite' => $weatherDataWTTR["current_condition"][0]["humidity"],
            ];

            $weatherData = WeatherData::firstOrCreate(
                ['city' => $donnees['city']],
                $donnees
            );
            $weatherData->save();

        } catch (Exception $e) {
            try {
                $weatherDataOpenWeatherMap = $weatherAPIService->getWeatherDataFromOpenWeatherMap($townName, '732f65f1ef81dbd724447a7e5e1893f8');
                $donnees = [
                    'city' => $townName,
                    'temperature' => $weatherDataOpenWeatherMap["main"]["temp"],
                    'pression' => $weatherDataOpenWeatherMap["main"]["pressure"],
                    'humidite' => $weatherDataOpenWeatherMap["main"]["humidity"],
                ];
                $weatherData = WeatherData::firstOrCreate(
                    ['city' => $donnees['city']],
                    $donnees
                );
                $weatherData->save();
            } catch (Exception $e) {
                $errorMessage = "Les données n'ont pas pu être prélévées.";
            }
        }

        if (empty($donnees)) {
            $tabTuple = $this->getWeatherDataFromDB($townName)->toArray();
            if (empty($tabTuple))
                return "Aucune données de cette ville dans la base de données";
            else
                return view('Erreur', $tabTuple);
        } else {
            return view('weather', ['weatherData' => $weatherData, 'errorMessage' => $errorMessage]);
        }
    }

    private function getWeatherDataFromDB($townName) {
        return WeatherData::where('city', $townName)->first();
    }


}
