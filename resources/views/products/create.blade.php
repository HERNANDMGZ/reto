@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <form action="/products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Titulo</label>
                        <input type="text" class="form-control" name="name" placeholder="Titulo">
                    </div>
                    <div class="form-group">
                        <label for="pricing">Precio</label>
                        <input type="number" class="form-control" name="pricing" placeholder="Precio...">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" name="description" placeholder="Descripcion...">
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
@endsection
