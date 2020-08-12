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
                            <h4 class="card-title">{{$product->name}}</h4>
                            <p class="card-text">
                                The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.             </p>
                            <div class="options d-flex flex-fill">
                                <select class="custom-select mr-1">
                                    <option selected>Color</option>
                                    <option value="1">Green</option>
                                    <option value="2">Blue</option>
                                    <option value="3">Red</option>
                                </select>
                                <select class="custom-select ml-1">
                                    <option selected>Size</option>
                                    <option value="1">41</option>
                                    <option value="2">42</option>
                                    <option value="3">43</option>
                                </select>
                            </div>
                            <div class="buy d-flex justify-content-between align-items-center">
                                <div class="price text-success">{{$product->pricing}}<h5 class="mt-4"></h5></div>
                                <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Agregar al carrito </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
