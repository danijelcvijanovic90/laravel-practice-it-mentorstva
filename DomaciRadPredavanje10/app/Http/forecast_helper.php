<?php

namespace App\Http;

class forecast_helper
{

    const WEATHER_ICONS =
        [
            'rainy' => "fa-solid fa-cloud-showers-heavy",
            'sunny' => "fa-solid fa-sun",
            'snowy' => "fa-regular fa-snowflake",
            'cloudy' => "fa-solid fa-cloud",
        ];
    public static function get_color_by_temperature($temperature)
    {

        if($temperature <=0)
        {
            $color='lightblue';
        }
        elseif($temperature >=1 && $temperature <=15)
        {
            $color='blue';
        }
        elseif($temperature >15 && $temperature <= 25)
        {
            $color='green';
        }
        else
        {
            $color='red';
        }

        return $color;
    }

    public static function get_icon_by_weather_type($weather_type)
    {
        $icon = self::WEATHER_ICONS[$weather_type];
        return $icon;
    }
}
