@extends ('layouts.app')

@section('content')
<div>
    <form class="form-inline ml-md-auto">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Busqueda..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search-plus"></i>
                </button>
            </div>
        </div>
    </form>

<div class="container-fluid">
    <h4>Articulos<a href="products/create"><button type="button" class="btn btn-success float-right">Nuevo Articulo</button></a></h4>
    <h6>
        @if($search)
        <div class ="alert alert-primary" role="alert">
            Resultados de la Busqueda"{{$search}}" son:
        </div>
        @endif
    </h6>
</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>slug</td>
            <td>Precio</td>
            <td>Descripción</td>
            <td>Estado</td>
            <td>Accion</td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->slug}}</td>
                <td>{{$product->pricing}}</td>
                <td>{{$product->description}}</td>
                @if($product->status === 1)
                    <td>Activo</td>
                @else
                    <td>Inactivo</td>
                @endif
                <td>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
                        <a href="{{ route('products.show', $product->id) }}"><button type="button" class="btn btn-secondary">Ver</button></a>
                        <a href="{{ route('products.edit', $product->id) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->Links()}}
</div>
@endsection


