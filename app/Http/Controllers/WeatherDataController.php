<?php

namespace App\Http\Controllers;

use App\Services\CurlService;
use Illuminate\Http\Request;

class WeatherDataController extends Controller
{
    public function index(){
        $curlService = new CurlService();
        $reponse = $curlService->get('https://wttr.in/');
    }
}
