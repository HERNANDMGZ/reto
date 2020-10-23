@extends ('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>item</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>total Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->find($product->id)->name}}</td>
                <td>{{$product->find($product->id)->pricing}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->product_pricing}}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h1>total de factura: {{ $totalPricing }}</h1>

    <a>pagar</a>



@endsection
