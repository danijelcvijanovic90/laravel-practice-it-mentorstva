@extends("layout")

@section('tittle')
    Weather
@endsection

@section('content')
    @if($errors->any())

        <p class="alert alert-danger text-center">Error: {{ $errors->first() }}</p>

    @endif

    <div class="container mt-5">

        <div class="card shadow-lg border-0 mb-5">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Add Weather</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('update-temperature') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="row g-4">

                        {{-- Temperature --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Temperature</label>
                            <input type="number"
                                   name="temperature"
                                   class="form-control shadow-sm"
                                   placeholder="Enter temperature"
                                   required>
                        </div>

                        {{-- City --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Select City</label>
                            <select name="city_id"
                                    class="form-select shadow-sm"
                                    required>
                                <option value="" disabled selected>
                                    Choose city...
                                </option>

                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Weather Type --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Select Weather Type</label>
                            <select name="weather_type"
                                    class="form-select shadow-sm"
                                    required>
                                <option value="" disabled selected>
                                    Weather Type...
                                </option>
                                @foreach($weather as $weather_type)
                                    <option value="{{$weather_type}}">{{ucfirst($weather_type)}}</option>
                                @endforeach


                            </select>
                        </div>

                        {{-- Probability --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Probability (%)</label>
                            <input type="number"
                                   name="probability"
                                   class="form-control shadow-sm"
                                   placeholder="Enter probability"
                                   min="0"
                                   max="100">
                        </div>

                        {{-- Date --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date"
                                   name="date"
                                   class="form-control shadow-sm"
                                   required>
                        </div>

                        {{-- Button --}}
                        <div class="col-12 text-end mt-3">
                            <button type="submit"
                                    class="btn btn-primary px-5 shadow-sm">
                                Save
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>


        <h1 class="text-center mb-4">Cities</h1>

        <div class="row">

            @foreach($cities as $city)
                <div class="col-md-6 mb-4">

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <strong>{{ $city->name }}</strong>
                        </div>

                        <ul class="list-group list-group-flush">

                            @foreach($city->forecast->sortByDesc('created_at')->take(5) as $forecast)
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-3">{{ $forecast->date }}</div>
                                        <div class="col-3">{{ $forecast->temperature }} °C</div>
                                        <div class="col-3">{{ $forecast->weather_type }}</div>
                                        <div class="col-3">{{ $forecast->probability ?? '-' }}%</div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            @endforeach

        </div>


    </div>

    </div>

@endsection
