
    @extends("layout")

    @section("tittle")
    Dashboard
    @endsection
    
    @section("content")
    <div class="container mt-5  d-flex flex-column text-center">
    <h1>Welcome to my page</h1>
    @if($hours >=0 && $hours <= 12)
    <h3 class="py-3">Good Morning!</h3>
    @else
    <h3 class="py-3">Good Afternoon!</h3>
    @endif
    <p>Current time: {{ $current_time }}</p>
    <p>Current hour is: {{ $hours }}h</p>
    </div>

    <div class="container py-3">
    <h5 class="mb-5 text-center">CHECK OUR LATEST PRODUCTS</h5>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($latest_products as $product)
        <div class="col text-center">
            <div class="card h-100">
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <div class="mt-auto text-center">
                        <button class="btn btn-success">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    @endsection
    