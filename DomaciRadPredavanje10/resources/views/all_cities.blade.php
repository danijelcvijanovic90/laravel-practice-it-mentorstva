@extends("layout")

@section("tittle")
    All Cities
@endsection

@section("content")

    <div class="mt-5">
        <h1 class="text-center mb-5">All Cities</h1>

        <div class="container">

            <table class="table table-striped table-hover align-middle">

                <thead>
                <tr>
                    <th>City name</th>
                    <th>Temperature</th>
                    <th>Created at</th>
                </tr>
                </thead>

                @foreach($cities as $city)
                    <tbody>
                    <tr>
                        <td>{{ $city->city }}</td>
                        <td>{{ $city->temperature }}</td>
                        <td>{{ $city->created_at }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a class="btn btn-danger" href="{{ route('delete_city', ['city' => $city->id]) }}" >Delete</a>
                                <a class="btn btn-primary" href="{{ route('edit-city', ['city' => $city->id]) }}" >Edit</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

        </div>

@endsection
