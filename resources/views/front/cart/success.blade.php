@extends('front.app')

@section('title', 'Compra exitosa')

@section('head')
    <link href="/js/plugin/stepper/jquery.fs.stepper.css" rel="stylesheet">
    <style>
        .stepper {width: 120px; margin: 0}
        .table-primary th {
            background-color: #f69284;
            color: #fff;
            font-weight: bold;
        }
        .table-primary th, .table-primary tbody td {text-align: center;}
        .table-primary tfoot .total {text-align: center;}
    </style>
@endsection

@section('styles')
    <link href="/js/plugin/stepper/jquery.fs.stepper.css" rel="stylesheet">
    <style>
        .stepper {width: 70px}
    </style>
@endsection

@section('content')
    <h2>Muchas gracias por su compra</h2>

    <table class="table table-striped table-bordered table-primary">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>
            @foreach (Cart::content() as $row)
                <tr>
                    <td>
                        <p><strong>{{ $row->name }}</strong></p>
                    </td>
                    <td>{{ $row->qty }}</td>
                    <td class="price">$ {{ $row->price(2, ',', '.') }}</td>
                    <td class="subtotal">$ {{ $row->subtotal(2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            @if ($purchase->total != $purchase->total_with_discount)
                <tr>
                    <td colspan="3">Subotal</td>
                    <td class="total">$ {{ Cart::subtotal(2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="3">Subtotal (descuento aplicado)</td>
                    <td class="total">$ {{ $purchase->total_with_discount }}</td>
                </tr>
                <tr>
                    <td colspan="3">Envío</td>
                    <td class="total">$ {{ $subzone->price }}</td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td class="total">$ {{ $purchase->total_with_discount * 1 + $subzone->price }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="3">Subtotal</td>
                    <td class="total">$ {{ Cart::subtotal(2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="3">Envío</td>
                    <td class="total">$ {{ $subzone->price }}</td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td class="total">$ {{ Cart::subtotal(2, '.', '') * 1 + $subzone->price }}</td>
                </tr>
            @endif
        </tfoot>
    </table>

    @php
        Cart::destroy();
        session()->forget('checkout');
    @endphp
@endsection
