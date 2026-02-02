@extends("layout")

@section("tittle")
Contact messages
@endsection

@section("content")

<div class="mt-5">
<h1 class="text-center mb-5">All Contacts</h1>

<div class="container">

<table class="table table-striped table-hover align-middle">
    
    <thead>
        <tr>
        <th>Sender name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
        </tr>
    </thead>
        
    @foreach($contacts as $contact)
    <tbody>
        <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->subject }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->created_at }}</td>
        <td class="text-end">
            <a class="btn btn-danger" href="{{ route('delete_contact', $contact->id) }}">Delete</a>
        </td>
        </tr>
    </tbody>
    @endforeach
</table>

</div>

@endsection
