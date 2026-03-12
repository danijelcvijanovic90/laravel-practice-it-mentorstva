@extends('layout')

@section('tittle')
    Search
@endsection

@section('content')

    <div class="container py-5">


        <div class="row justify-content-center">

            <div class="col-md-6">

                <form action="{{ route('search-results') }}" method="GET" class="card p-4 shadow mb-4">

                    <h4 class="text-center mb-4">Search City</h4>

                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <p class="alert alert-danger text-center">{{ Session::get('error') }}</p>
                    @endif

                    <div class="mb-3">
                        <input
                            type="search"
                            name="city"
                            class="form-control"
                            placeholder="Enter city name..."
                        >
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        Search
                    </button>

                </form>

            </div>

        </div>


        <h5 class="text-center fw-bold mb-4">Favourites</h5>


        <div class="row g-3 justify-content-center">

            @foreach($userFavourites as $favourite)

                @php
                    $icon = \App\Http\forecast_helper::get_icon_by_weather_type($favourite->city->todaysWeather->weather_type)
                @endphp

                <div class="col-md-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body d-flex flex-column justify-content-between">

                            <div class="d-flex justify-content-between align-items-start">

                                <div>
                                    <h5 class="card-title mb-1">
                                        {{ $favourite->city->name }}
                                    </h5>

                                    <small class="text-muted">
                                        Current temperature
                                    </small>
                                </div>

                                <form action="{{ route('user-city.destroy') }}" method="POST">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="city_id" value="{{ $favourite->city->id }}">

                                    <button type="submit" class="btn btn-link p-0 border-0">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>


                            <div class="text-center my-3">

                                <p class="display-6 fw-bold mb-0">
                                    <i class="{{ $icon }}"></i>
                                    {{ $favourite->city->todaysWeather->temperature }}°C
                                </p>

                            </div>


                            <a href="{{ route('forecast', $favourite->city->id) }}" class="btn btn-sm btn-primary w-100">
                                See forecast
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


    </div>

@endsection
