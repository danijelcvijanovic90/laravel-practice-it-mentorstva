<?php

namespace App\Http\Controllers;

use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCityController extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user=Auth::user();

        if($user === null)
        {
            return redirect()->route('login')->with('error', 'Please log in to save city to favourites!');
        }

        UserCities::create([

            'city_id' => $city,
            'user_id' => $user->id,

        ]);

        return redirect()->back()->with('success', 'City added to favourites');
    }

    public function destroy(Request $request)
    {

        if(!Auth::check())
        {
            return redirect()->route('login')->with('error', 'You must be logged in to delete a favourite');
        }

        $city_id= $request->get('city_id');
        UserCities::where('city_id', $city_id)->where('user_id', auth()->id())->delete();
        return redirect()->back()->with('success', 'City successfully deleted from favourites');
    }

    public function show()
    {
        $userFavourites=UserCities::with('city.weather', 'city.forecast')->where('user_id', auth()->id())->get();
        //dd($userFavourites);
        return view('search', compact('userFavourites'));
    }
}
