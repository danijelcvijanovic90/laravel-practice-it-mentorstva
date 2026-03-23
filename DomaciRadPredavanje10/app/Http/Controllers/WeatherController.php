<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecast;
use App\Models\UserCities;
use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use function Brotli\compress_add;

class WeatherController extends Controller
{
    public function index()
    {
        $cities= Cities::with('weather')->get();

        if(!Auth::user())
        {

            $userFavourites=[];
            return view('/welcome', compact('cities', 'userFavourites'));

        }

        $userFavourites=Auth::user()->userFavourites;
        $userFavourites = $userFavourites->pluck('city_id')->toArray();

        return view('/welcome', compact('cities', 'userFavourites'));

    }

    public function all_cities()
    {
        $cities=Weather::all();
        return view('all_cities', compact('cities'));
    }

    public function  add_new_city(Request $request)
    {
        $request->validate([
           "city" => "required|string|min:1|max:64|unique:weather,city",
           "temperature" => "required|integer",
        ]);

        Weather::create([
           "city" => $request['city'],
           "temperature" => $request['temperature'],
        ]);

        return redirect()->route('add-city');
    }

    public function edit_city(Weather $city)
    {
        return view('admin.edit_city', compact('city'));
    }

    public function edit_current_city(Request $request, Weather $city)
    {
        $validated=$request->validate([
            "city" => "required|string|min:1|max:64|unique:weather,city," . $city->id,
            "temperature" => "required|integer",
        ]);

        $city->update($validated);

        return redirect()->route('all-cities');
    }

    public function delete_city(Weather $city)
    {
        $city->delete();
        return redirect()->back();
    }

    public function forecast(Cities $city)
    {
        $city->load('forecast'); //load forecast for city id.
        return view('admin.forecast', compact('city'));
    }

    public function edit_temperature()
    {
        $cities=Cities::all();
        $weather=Forecast::WEATHER;
        return view('admin.weather', compact('cities','weather'));
    }

    public function create_temperature(Request $request)
    {


        $request->validate([
            'temperature' => 'required',
            'city_id' => 'required|exists:cities,id',
            'date'  => 'required',
            'weather_type' => 'required',
            'probability' => 'nullable',
        ]);


        Forecast::create([
            'city_id' => $request->get('city_id'),
            'temperature' => $request->get('temperature'),
            'date' => $request->get('date'),
            'weather_type' => strtolower($request->get('weather_type')),
            'probability' => $request->get('weather_type') === 'sunny'
                            ? null
                            :$request->get('probability'),

        ]);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $city_name = $request->get('city');

        $cities=Cities::with('todaysWeather')->where('name', 'LIKE', "%$city_name%")->get(); //if I want to optimize this
        // I need to load todaysForecast for all cities



        if(count($cities) == 0)
        {
            $response = Http::get(env("WEATHER_API_URL")."/forecast.json",
                [
                    'key' => env("WEATHER_API_KEY"),
                    'q' => $city_name,
                    'aqi' => 'no',
                    'days' => 10,
                ]
            );



            if($response->successful())
            {
                $data=$response->json();

                $city=Cities::create(
                    [
                        'name' => $city_name,
                    ]
                );

                Weather::create([
                    'city_id' => $city->id,
                    'temperature' => $data['current']['temp_c'],
                ]);

                foreach($data['forecast']['forecastday'] as $forecast)
                {
                    Forecast::create(
                        [
                            'city_id' => $city->id,
                            'temperature' => $forecast['day']['maxtemp_c'],
                            'date' => $forecast['date'],
                            'weather_type' =>$forecast['day']['condition']['text'],
                            'probability' => $forecast['day']['daily_chance_of_rain'],
                        ]
                    );
                }

                $cities = Cities::with('todaysWeather')
                    ->where('name', 'LIKE', "%$city_name%")
                    ->get();

            }


            else
            {
                return redirect()->back()->with('error', 'City does not exists!');
            }
        }

        if(!Auth::check())
        {
            $userFavourites=[];
            return view('search_results', compact('cities','userFavourites'));
        }

        $userFavourites=Auth::user()->userFavourites;
        $userFavourites = $userFavourites->pluck('city_id')->toArray();


        return view('search_results', compact('cities','userFavourites'));


    }

}
