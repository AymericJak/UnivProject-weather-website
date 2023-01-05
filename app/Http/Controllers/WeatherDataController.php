<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherDataController extends Controller
{
    public function search(){
        $curlService = new CurlService();
        $reponse = $curlService->get('https://wttr.in/');
    }
}
