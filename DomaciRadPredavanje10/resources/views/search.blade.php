@extends('layout')

@section('tittle')
    Search
@endsection

@section('content')


    <div class="container vh-100 d-flex justify-content-center align-items-center">

        <div class="col-md-4">

            <form action="{{ route('search-results') }}" method="GET" class="card p-4 shadow">


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

@endsection
