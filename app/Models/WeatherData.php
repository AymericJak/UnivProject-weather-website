<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model {
    protected $table ='weather_data';
    use HasFactory;

    protected $fillable = [
        'city',
        'temperature',
        'pression',
        'humidite',
    ];

}
