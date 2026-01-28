

    @extends("layout")

    @section("tittle")
    Shop
    @endsection
    
    @section("content")
    
    

    <div class="container py-3">
    <h5 class="mb-5 text-center">WELCOME TO SHOP</h5>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
        <div class="col text-center">
            <div class="card h-100">
                <img src="{{ $product->image }}" class="card-img-top" alt="">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">price: {{ $product->price }}$</p>
                    <p class="card-text">available: {{ $product->amount }} pcs</p>
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
    
