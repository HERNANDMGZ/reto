@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img class="card-img-top embed-responsive-item" src="/storage/{{$product->image}}">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('products.show', $product->slug) }}">{{$product->name}}</a></h4>
                        <p class="card-text">
                            {{$product->description}}</p>
                        <div class="options d-flex flex-fill">
                        </div>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success">{{$product->pricing}}<h5 class="mt-4"></h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
