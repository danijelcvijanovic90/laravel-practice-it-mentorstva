@extends('layout')

@section('content')

<div class="mt-5">
<h1 class="text-center mb-5">All Products</h1>

<table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
        <th>Product name</th>
        <th>Product description</th>
        <th>Total amount</th>
        <th>Price per unit</th>
        <th>Image</th>
        <th>Created At</th>
        </tr>
    </thead>

        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
        @endforeach
    <tbody>

    </tbody>
</table>

</div>

@endsection