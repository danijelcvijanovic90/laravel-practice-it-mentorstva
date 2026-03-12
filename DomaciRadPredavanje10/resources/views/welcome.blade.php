@extends("layout")

@section('tittle')
    Homepage
@endsection
@section("content")
    <div class="container py-5">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <p class="alert alert-success text-center text-center">{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
        @endif
        <h3 class="text-center mb-4">Current Temperatures</h3>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach($cities as $city)

                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h4 class="card-title">{{ $city->name }}</h4>
                            @if(in_array($city->id, $userFavourites))
                                <form action="{{ route('user-city.destroy')  }}" method="POST">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="city_id" value="{{ $city->id }}">
                                    <button type="submit" class="btn btn-link p-0 border-0"><i class="fa-solid fa-trash" ></i></button>
                                </form>

                            @else
                                <a href="{{ route('user-city.favourite',$city->id) }}"><i class="fa-regular fa-heart"></i></a>
                            @endif

                            <p class="display-6 fw-bold">{{ $city->weather->temperature }}°C</p>
                            <a href="{{ route('forecast', $city->id) }}" class="btn btn-primary">See forecast</a>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
@endsection

