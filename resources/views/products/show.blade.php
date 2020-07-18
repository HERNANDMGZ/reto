@extends('layouts.app')

@section('content')
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="/public/dist/img/galaxy%20s10.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $product ->description }}</h5>
            <p class="card-text"></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">col ${{$product->pricing}}</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Añadir</a>
            <a href="#" class="card-link">Comprar</a>
        </div>
    </div>
@endsection
