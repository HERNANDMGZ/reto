@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Editar producto: {{$product->name}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('products.update', $product ->id )}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Nombre del articulo...">
                    </div>
                    <div class="form-group">
                        <label for="pricing">Precio</label>
                        <input type="number" class="form-control" name="pricing" value="{{$product->pricing}}" placeholder="Edita el precio...">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" name="description" value="{{$product->description}}" placeholder="Describe tu producto...">
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <label for="status">Estado:</label>
                        <select name="status" id="status" class="form-control">
                            <option value=1>Activo</option>
                            <option value=0>Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>
            </div>
        </div>
    </div>

@endsection
