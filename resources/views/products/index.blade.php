@extends ('layouts.app')

@section('content')

<div class="big-padding text-center blue-grey white-text">
    <h1>PRODUCTOS </h1>
</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Id</td>
            <td>Titulo</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Herramientas</td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product ->id}}</td>
                <td>{{$product ->title}}</td>
                <td>{{$product ->description}}</td>
                <td>{{$product ->pricing}}</td>
                <td>Tools</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>







@endsection


