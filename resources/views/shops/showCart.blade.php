@extends ('layouts.app')

@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Carrito de Compras</h5>
                                </div>
                                <div class="col-xs-4">
                                    <a href="/shops" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Regresar a la TIENDA </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($products)
                        <div class="panel-body">
                            @foreach($products as $product)
                                <div class="row">
                                    <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name"><strong>{{$product->find($product->id)->name}}</strong></h4><h4><small>Product description</small></h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 text-right">
                                            <h6><strong>$ {{$product->find($product->id)->pricing}}<span class="text-muted"> X </span></strong></h6>
                                        </div>
                                        <div class="col-xs-4">
                                            <h6 class="product-name"><strong>{{$product->quantity}}</strong>Unidades</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr>
                        </div>
                        <div class="panel-footer">
                            <div class="row text-center">
                                <div class="col-xs-9">
                                    <h4 class="text-right">Precio Total <strong>{{ $totalPricing }}</strong></h4>
                                </div>
                                <div class="col-xs-3">
                                    <a class="btn btn-primary" href="{{route('shops.getCheckout', $id_order)}}" role="button">Continuar</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">Aun no tienes productos agregados</div>
                            </div>
                            <hr>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
