
    @extends("layout")

    @section("tittle")
    Home
    @endsection
    
    @section("content")
    <div class="container mt-5  d-flex flex-column text-center">
    <h1>Welcome to my page</h1>
    <p>Current time: {{ date("h:i:s") }}</p>
    </div>
    @endsection
    