<?php

namespace App\Http\Controllers;

use App\Services\CurlService;
use http\Env\Request;

class WeatherDataController extends Controller {

    public function index(){
        $curlService = new CurlService();
        $reponse = $curlService->get('https://wttr.in/');
    }

    public function search(Request $request) {
        $townName = $request -> get('search');
        $curlService = new CurlService();
        $reponse = $curlService -> get('https://wttr.in/' . $townName, "?format=j1");
        $reponse = json_decode($reponse,true);
        $donnees = [
            'temperature' => $reponse["current.condition"][0]["Temp_C"],
            'pression' => $reponse["current.condition"][0]["pressure"],
            'humidité' => $reponse["current.condition"][0]["humidity"],
            'ville' => $reponse["nearest_area"][0]["areaName"][0]["value"],
        ];

        return $donnees;
    }


}
