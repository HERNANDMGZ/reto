@extends ('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item"><a href="/shops">categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
    </nav>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <body>
    <div id="wrap">
        <div id="product_layout_3">
            <div class="product_image">
                <div class="main_image">
                    <img src="/storage/{{$product->image}}"/>
                </div>
            </div>
            <div class="product_desc">
                <h1>{{$product->name}}</h1>
                <span class="price">$75</span>
                <span class="sale_price">{{$product->pricing}}</span>
                <span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></span>

                <div class="buying">
                    <form action="{{route('shops.addToCart', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="quantity">
                            <label for="quantity">Cant:</label>
                            <input type="text" class="form-control" name="quantity">
                        </div>
                        <div class="cart">
                                <button type="submit" class="add">Add to Cart<i class="fa fa-shopping-cart fa-lg"></i></button>
                        </div>
                    </form>
                </div>
                <div class="other_options">
                    <span class="SKU">#existencias</span>
                    <span class="QTY">referencia</span>
                </div>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In malesuada eros vitae sagittis sollicitudin. Morbi gravida gravida faucibus. Sed id nulla ligula. Aliquam a metus in lectus luctus varius vitae ultricies eros. Phasellus sagittis in tellus ut porttitor. Phasellus scelerisque eget leo et iaculis.</P>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In malesuada eros vitae sagittis sollicitudin. Morbi gravida gravida faucibus. Sed id nulla ligula. Aliquam a metus in lectus luctus varius vitae ultricies eros. Phasellus sagittis in tellus ut porttitor. Phasellus scelerisque eget leo et iaculis.</P>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In malesuada eros vitae sagittis sollicitudin. Morbi gravida gravida faucibus. Sed id nulla ligula. Aliquam a metus in lectus luctus varius vitae ultricies eros. Phasellus sagittis in tellus ut porttitor. Phasellus scelerisque eget leo et iaculis.</P>
                </div>
                <div class="social">
                    <span class="share">Share This:</span><span class="buttons"><img src="https://i.imgur.com/M8D8rr8.jpg"/></span>
                </div>
            </div>
        </div>
    </div>



@endsection


