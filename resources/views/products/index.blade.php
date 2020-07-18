@extends ('layouts.app')

@section('content')

<div class="big-padding text-center blue-grey white-text">
    <h2>PRODUCTOS<a href="products/create"><button type="button" class="btn btn-success float-right">Agregar Producto</button></a></h2>
    <h6>
        @if($search)
        <div class ="alert alert-primary" role="alert">
            resultados de tu busqueda "{{$search}}" son:
        </div>
            @endif
    </h6>
</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Id</td>
            <td>Titulo</td>
            <td>Precio</td>
            <td>Descripcion</td>
            <td>Estado</td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
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


