@extends('layout')

@section('title')
    Edit City
@endsection

@section('content')

    @if($errors->any())
        <p class="alert alert-danger text-center">{{ $errors->first() }}</p>
    @endif

    <div class="container d-flex col-md-4 justify-content-center mt-5">
        <h3>Edit city</h3>
    </div>

    <form class="container col-md-4 d-flex flex-column mt-3 py-3 gap-3" method='POST' action="{{ route('edit-current-city', ['city' => $city->id]) }}" >


        {{ csrf_field() }}
        <input type="text" name="city" class="form-control border border-dark" placeholder="Please enter product name" value="{{ $city->city }}">
        <input type="number" name="temperature" class="form-control border border-dark" placeholder="Please enter amount" value="{{ $city->temperature }}">
        <button type="submit" class="btn btn-primary w-25 btn-sm mt-5 mx-auto">Edit</button>
    </form>

@endsection
