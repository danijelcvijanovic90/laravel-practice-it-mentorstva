@extends("layout")

@section('tittle')
    Forecast
@endsection
@section("content")
    <div class="container py-5">
        <h3 class="text-center mb-4">Current Temperatures</h3>

        <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-center">




                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h4 class="card-title mb-5">{{ $city->name }}</h4>
                            @foreach($city->forecast as $forecast)
                            <p class="display-8 gap-3">Date: {{ $forecast->date }} Temperature: {{ $forecast->temperature }}°C</p>
                                <p></p>
                            @endforeach

                        </div>
                    </div>
                </div>






        </div>
    </div>
@endsection

