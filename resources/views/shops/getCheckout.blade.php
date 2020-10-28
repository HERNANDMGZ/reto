@extends ('layouts.app')

@section('content')

    <div class="container">

        <h2>Resumen</h2>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="left">Descripcion</th>
                        <th class="center">Cantidad</th>
                        <th class="right">Costo Unitario</th>
                        <th class="right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="left">{{$product->find($product->id)->name}}</td>
                            <td class="center">{{$product->quantity}}</td>
                            <td class="right">{{$product->find($product->id)->pricing}}</td>
                            <td class="right">{{$product->product_pricing}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h2>Completa tus datos y finaliza tu compra</h2>
        <div class="row">
            <div class="col-sm-6">
                <form action="/payment" method="POST" enctype="multipart/form-data">
                @csrf

                <!--SHIPPING METHOD-->
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <strong>Nombre</strong>
                                <input type="text" name="name" class="form-control" placeholder="Nombre de Comprador">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Direccion:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="address_payment" class="form-control" placeholder="Direccion de envio">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>celular:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="phone" class="form-control" placeholder="Telefono">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>email:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="Correo">
                            </div>
                        </div>

                    </div>
                    <!--SHIPPING METHOD END-->
                    <button type="submit" class="btn btn-primary">continuar</button>
                </form>
            </div>
        </div>

@endsection
