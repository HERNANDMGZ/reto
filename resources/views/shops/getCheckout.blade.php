@extends ('layouts.app')

@section('content')

    <div class="container">

        <h2>Resumen</h2>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr class="line">
                        <td><strong>#</strong></td>
                        <td class="text-center"><strong>Articulo</strong></td>
                        <td class="text-right"><strong>Precio</strong></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><strong>Template Design</strong><br>A website template is a pre-designed webpage, or set of webpages, that anyone can modify with their own content and images to setup a website.</td>
                        <td class="text-right">$1,125.00</td>
                    </tr>
                    <tr>
                        <td colspan="1">
                        </td><td class="text-right"><strong>Total</strong></td>
                        <td class="text-right"><strong>$2,400.00</strong></td>
                    </tr>
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
                    </div>
                        <!--SHIPPING METHOD END-->

                    <button type="submit" class="btn btn-primary">continuar</button>
                </form>
            </div>
        </div>







@endsection
