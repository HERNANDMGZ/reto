@extends ('layouts.app')

@section('content')

    <div class="container">
        <form action="/categories" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Selecciona por Categoría </label>
                <select name ="category" id= "category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-link">Ver</button>
        </form>
    </div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card-img">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img class="card-img-top embed-responsive-item" src="/storage/{{$product->image}}" width=100 height=100>
                    </div>
                    <div class="card-body">
                        <a href="/shops/{{$product->slug}}" class="card-title card-title">{{$product->name}}</a>
                        <p class="card-text">Article Description Article Description Article Description Article Description
                            Article Description Article Description</p>

                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success">{{$product->pricing}}<h5 class="mt-4"></h5></div>
                            <a href="/shops/{{$product->slug}}" class="btn btn-outline-success mt-n1"><i class="fas fa-search-minus"></i> ver... </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No existen productos que mostrar</p>
        @endforelse
    </div>
    </div>

@endsection
