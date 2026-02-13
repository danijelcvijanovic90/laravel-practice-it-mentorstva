<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $cities= Cities::with('weather')->get();
        return view('/welcome', compact('cities'));
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
        return view('edit_city', compact('city'));
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
        return view('forecast', compact('city'));
    }

}
