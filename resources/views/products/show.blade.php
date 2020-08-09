@extends('layouts.app')

@section('content')
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="/storage/{{$product->image}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{ $product ->description }}</p>
        </div>
        <ul class="list-group list-group-flush">

            <li class="list-group-item">col ${{$product->pricing}}</li>
    </div>

@endsection
