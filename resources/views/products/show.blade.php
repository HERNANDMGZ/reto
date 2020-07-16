@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $product->name }}</h1>
            <p class="lead">{{ $product->pricing }}</p>
            <p class="lead">{{ $product->description }}</p>
            <p class="lead">{{ $product->status }}</p>
        </div>
    </div>
@endsection
