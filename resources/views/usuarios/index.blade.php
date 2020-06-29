@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de usuarios registrados<a href="usuarios/create"><button type="button" class="btn btn-success float-right">Agregar Usuario</button></a></h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{ route('usuarios.edit', $user->id) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                <button type="button" class="btn btn-danger">Eliminar</button>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
