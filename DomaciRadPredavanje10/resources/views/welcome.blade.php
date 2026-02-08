@extends("layout")

@section('tittle')
    Homepage
@endsection
@section("content")
    <div class="container py-5">
        <h3 class="text-center mb-4">Current Temperatures</h3>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach($cities as $city)

                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h4 class="card-title">{{ $city->city }}</h4>
                            <p class="display-6 fw-bold">{{ $city->temperature }}°C</p>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
@endsection

