@extends("layout")

@section("tittle")
All contact messages
@endsection

@section("content")
<div>
    <ul>
        @foreach($contacts as $contact)
        <li>{{ $contact->name }}, {{ $contact->email }}, {{ $contact->subject }}, {{ $contact->message }}</li>
        @endforeach
    </ul>
</div>
@endsection
