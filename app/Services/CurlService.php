<?php

namespace App\Services;

class CurlService
{
    public function get(string $url){
        $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url, // your preferred link
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    //Set Here Your Requesred Headers
                    'Content-Type: application/json',
                ),
            ));
            $reponse = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if (!$reponse){
                return json_decode($err);
            }

            return $reponse;
    }
}
