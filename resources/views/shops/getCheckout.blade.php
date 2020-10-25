@extends ('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <form action="/payment" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre destinatario </label>
                        <input type="text" class="form-control" name="name" placeholder="Titulo">
                    </div>
                    <div class="form-group">
                        <label for="name">Direccion de envio</label>
                        <input type="text" class="form-control" name="address_payment" placeholder="Direccion">
                    </div>

                    <button type="submit" class="btn btn-primary">continuar</button>

                </form>
            </div>
        </div>







@endsection
