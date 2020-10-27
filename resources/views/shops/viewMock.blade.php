@extends ('layouts.app')

@section('content')

    <h1>procesamos tu pago de {{$invoice->total_price}}</h1>
    <a href="{{route('shops.paymentDetail',$invoice->reference)}}">regresar al comercio</a>
@endsection
