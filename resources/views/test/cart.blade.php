<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/admin/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>

                @foreach (Cart::content() as $row)
                    <tr>
                        <td>
                            <p><strong>{{ $row->name }}</strong></p>
                            <p>{{ $row->options->has('size') ? $row->options->size : '' }}</p>
                        </td>
                        <td>{{ $row->qty }}</td>
                        <td>${{ $row->options->cost }}</td>
                        <td>${{ $row->price(2) }}</td>
                        <td>${{ $row->subtotal }}</td>
                    </tr>

                @endforeach

            </tbody>
            
            <tfoot>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td>Total</td>
                    <td>{{ Cart::subtotal(2, '.', '') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    
</body>
</html>
