@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Editar Usuario: {{$user->name}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('usuarios.update', $user ->id )}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Rol</label>
                        <select name ="role" id= "role" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Escribe tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Correo Electronico">
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
