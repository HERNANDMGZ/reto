@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="grid-container">
                    @forelse($products as $product)
                        <div class="grid-item">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/storage/{{$product->image}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">{{ $product ->description }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">col ${{$product->pricing}}</li>
                                </ul>
                            </div>
                        </div>
                </div>
                        @empty
                            <p>No existen productos que mostrar</p>
                        @endforelse
                </div>
        </div>
    </div>
</div>
</div>
@endsection
