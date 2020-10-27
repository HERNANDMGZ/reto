@extends ('layouts.app')

@section('content')

    <h1>Estado del pago: {{$status['status']}}</h1>

    <div class="container-fluid">
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header">Invoice
                        <strong>#BBB-10010110101938</strong>
                        <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" >
                            <i class="fa fa-print"></i> Print</a>
                        <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" >
                            <i class="fa fa-save"></i> Save</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <h6 class="mb-3">From:</h6>
                                <div>
                                    <strong>BBBootstrap.com</strong>
                                </div>
                                <div>42, Awesome Enclave</div>
                                <div>New York City, New york, 10394</div>
                                <div>Email: admin@bbbootstrap.com</div>
                                <div>Phone: +48 123 456 789</div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="mb-3">To:</h6>
                                <div>
                                    <strong>BBBootstrap.com</strong>
                                </div>
                                <div>42, Awesome Enclave</div>
                                <div>New York City, New york, 10394</div>
                                <div>Email: admin@bbbootstrap.com</div>
                                <div>Phone: +48 123 456 789</div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="mb-3">Details:</h6>
                                <div>Invoice
                                    <strong>#BBB-10010110101938</strong>
                                </div>
                                <div>April 30, 2019</div>
                                <div>VAT: NYC09090390</div>
                                <div>Account Name: BBBootstrap Inc</div>
                                <div>
                                    <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th>Item</th>
                                    <th class="center">Cantidad</th>
                                    <th class="right">Costo Unitario</th>
                                    <th class="right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="center"></td>
                                    <td class="left"></td>
                                    <td class="center"></td>
                                    <td class="right"></td>
                                    <td class="right"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right"></td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Discount</strong>
                                        </td>
                                        <td class="right"></td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong></strong>
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

