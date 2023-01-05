<?php

namespace App\Http\Controllers;

use App\Services\CurlService;

class WeatherDataController extends Controller {

    public function index(){
        $curlService = new CurlService();
        $reponse = $curlService->get('https://wttr.in/');
    }

    public function get(string $url) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,// your preferred link
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if (!$response) {
            return json_decode($err);
        }

        return $response;
    }
}
