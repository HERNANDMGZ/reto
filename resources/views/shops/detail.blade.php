@extends ('layouts.app')

@section('content')

    <div class="container-fluid">
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header">Factura #
                        <strong>{{$response['requestId']}}</strong>
                        <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" >
                            <i class="fa fa-print"></i> Print</a>
                        <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" >
                            <i class="fa fa-save"></i> Save</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <h6 class="mb-3">ESTADO: {{$response['status']['status']}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <h6 class="mb-3">Detalle del pagador:</h6>
                                <div>Nombre = {{$invoice->name}}</div>
                                <div>Direccion = {{$invoice->address_payment}}</div>
                                <div>Telefono = {{$invoice->phone}}</div>
                                <div>Email = {{$invoice->email}}</div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th class="left">Descripcion</th>
                                    <th class="center">Cantidad</th>
                                    <th class="right">Costo Unitario</th>
                                    <th class="right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="center">{{$product->id}}</td>
                                        <td class="left">{{$product->find($product->id)->name}}</td>
                                        <td class="center">{{$product->quantity}}</td>
                                        <td class="right">{{$product->find($product->id)->pricing}}</td>
                                        <td class="right">{{$product->product_pricing}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>{{$response['request']['payment']['amount']['total']}}</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

