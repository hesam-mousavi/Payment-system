@extends('layouts.base')

@section('content')

    <div class="flex">
        @foreach ($products as $product)
<div class="card">
    <div class="title">{{ $product->title }}</div>
    <img src="{{ $product->image }}" class="image">
    <div class="description">{{ $product->description }}</div>
    <div class="price">{{ $product->price }}</div>
    <a href="">افزودن به سبد خرید</a>


</div>
@endforeach
    </div>


@endsection
