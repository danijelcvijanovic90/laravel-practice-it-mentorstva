@extends('layout')

@section('content')

@if($errors->any())

<p class="alert alert-danger text-center">Error: {{ $errors->first() }}</p>

@endif

<div class="container d-flex col-md-4 justify-content-center mt-5">
    <h3>Add product</h3>
    </div>
    <form class="container col-md-4 d-flex flex-column mt-3 py-3 gap-3" method='POST' action='/add-new-product'>
        
        {{ csrf_field() }}
        <input type="text" name="name" class="form-control border border-dark" placeholder="Please enter product name" value="{{ old('name') }}">
        <input type="number" name="amount" class="form-control border border-dark" placeholder="Please enter amount" value="{{ old('amount') }}">
        <input type="number" name="price" class="form-control border border-dark" placeholder="Please enter price per unit" value="{{ old('price') }}">
        <input type="text" name="image" class="form-control border border-dark" placeholder="Please add image (test purpose only)" value="{{ old('image') }}">
        <textarea name="description" class="form-control border border-dark" rows="5" placeholder="Please add description" value="{{ old('description') }}"></textarea>
        <button type="submit" class="btn btn-primary w-25 btn-sm mt-5 mx-auto">Send</button>
    </form>

@endsection