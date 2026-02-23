@extends("layout")

@section('tittle')
    Result
@endsection
@section("content")
    <div class="container py-5">
        <h3 class="text-center mb-4">Search Results</h3>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach($cities as $city)
               @php
                    $icon = \App\Http\forecast_helper::get_icon_by_weather_type($city->todaysWeather->weather_type)
               @endphp

                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h4 class="card-title ">{{ $city->name }} </h4>
                            <p class="display-6 fw-bold"> <i class="{{ $icon }}"></i> {{ $city->todaysWeather->temperature }}°C</p>
                            <a href="{{ route('forecast', $city->id) }}" class="btn btn-primary">See forecast</a>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
@endsection

