@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p>Description: {{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
        <p>Stock: {{ $product->stock }}</p>

        <form action="{{ route('decrease.stock', $product->id) }}" method="post">
            @csrf
            <label for="quantity">Purchase Quantity:</label>
            <input type="number" name="quantity" id="quantity" required>
            <button type="submit">Purchase</button>
        </form>
    </div>
@endsection