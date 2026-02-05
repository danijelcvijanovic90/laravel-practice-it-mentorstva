@extends('layout')

@section('content')

<div>
    <div class="container d-flex col-md-4 justify-content-center mt-5">
    <h3>Welcome to contact page</h3>
    </div>
    <form class="container col-md-4 d-flex flex-column mt-3 py-3 gap-3" method='POST' action='{{ route('update_contact', $single_contact->id) }}'>
        
        {{ csrf_field() }}
        <input type="text" name="name" class="form-control border border-dark" placeholder="Please enter your name" value="{{ $single_contact->name }}">
        <input type="email" name="email" class="form-control border border-dark" placeholder="Please enter you email" value="{{ $single_contact->email }}">
        <input type="text" name="subject" class="form-control border border-dark" placeholder="Please enter subject" value="{{ $single_contact->subject }}">
        <textarea name="message" class="form-control border border-dark" rows="5" placeholder="Please enter your message">{{ $single_contact->message }}</textarea>
        <button type="submit" class="btn btn-primary w-25 btn-sm mt-5 mx-auto">Update</button>
    </form>
</div>

@endsection