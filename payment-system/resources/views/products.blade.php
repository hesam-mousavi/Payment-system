@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

        @foreach ($products as $product)
      <div class="col col-md-3">
        <div class="card text-center" style="width: 18rem;">
            <img src="{{ $product->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $product->title }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <a href="{{ route('basket.add', $product->id) }}" class="btn btn-primary">افزودن به سبد خرید</a>
            </div>
          </div>
      </div>
      @endforeach
    </div>
  </div>


    <div class="flex">
    @foreach ($products as $product)
        <div class="card">
            <div class="title">{{ $product->title }}</div>
            <img src="{{ $product->image }}" class="image">
            <div class="description">{{ $product->description }}</div>
            <div class="price">{{ $product->price }}</div>
            <a href="{{ route('basket.add', $product->id) }}">افزودن به سبد خرید</a>
        </div>
    @endforeach
    </div>

@endsection
