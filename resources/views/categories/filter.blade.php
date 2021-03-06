@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">

            @forelse($products as $product)

                    <div class="card card-body mt-md-3">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-20"> <img src="/storage/{{$product->image}}" width="150" height="150" alt=""> </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <a href="/shops/{{$product->slug}}" data-abc="true">{{$product->name}}</a> </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">{{$product->category}}</a></li>
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li>
                                </ul>
                            <p class="mb-3">{{$product->description}}</p>
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile junction</a></li>
                                    <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                                </ul>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 font-weight-semibold">{{$product->pricing}}</h3>
                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                <div class="text-muted">2349 reviews</div> <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>No existen productos que mostrar</p>
                    @endforelse
@endsection
