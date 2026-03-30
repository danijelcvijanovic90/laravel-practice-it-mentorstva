
@extends("layout")

@section("tittle")
    Product Info
@endsection

@section("content")

    <div class="container py-3">
        @if(session('error'))
            <p class="alert alert-warning text-center">{{ session('error') }}</p>
        @endif
        @if($errors->any())
            <p class="alert alert-danger text-center">Error: {{ $errors->first() }}</p>
        @endif
        <h5 class="mb-5 text-center">PRODUCT INFO</h5>
        <div class="row row-cols-1 row-cols-md-3 g-4">

                <div class="col text-center">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">price: {{ $product->price }}$</p>
                            <p class="card-text">available: {{ $product->amount }} pcs</p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="text" name="amount" placeholder="Enter amount">
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                            </form>

                            <div class="mt-auto text-center">
                                <a class=" btn btn-success" href="{{ route('shop') }}">Back to shop</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection


