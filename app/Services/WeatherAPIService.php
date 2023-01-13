<?php

namespace App\Services;

class WeatherAPIService {
    private $curl;

    public function __construct() {
        $this->curl = new CurlService();
    }

    public function getWeatherDataFromWTTR($townName) {
        $response = $this->curl->get('https://wttr.in/' . $townName . '?format=j1');
        $response = json_decode($response, true);
        return $response;
    }

    public function getWeatherDataFromOpenWeatherMap($townName,$apiKeyOpenWeatherMap) {
        $response = $this->curl->get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $townName,
            'units' => 'metric',
            'appid' => $apiKeyOpenWeatherMap,
        ]);
        $response = json_decode($response, true);
        return $response;
    }
}
