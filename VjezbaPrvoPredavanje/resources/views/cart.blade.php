
@extends("layout")

@section("tittle")
    Cart
@endsection



@section("content")

    <div class="container py-3">

        <h5 class="mb-5 text-center">WELCOME TO CART</h5>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col text-center">
                <div class="card h-100">

                        <ul>
                            @foreach($cart as $product)
                                <li>Product: {{ $product['name'] }} - Amount: {{ $product['amount'] }}</li>
                            @endforeach
                        </ul>

                </div>
            </div>
        </div>
    </div>
@endsection



