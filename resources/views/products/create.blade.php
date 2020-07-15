@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <form action="/products" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="name" placeholder="Titulo">
                    </div>
                    <div class="form-group">
                        <label for="pricing">Precio</label>
                        <input type="number" class="form-control" name="email" placeholder="Precio...">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="textarea" class="form-control" name="password" placeholder="Descripcion...">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
@endsection
