<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nuevo pedido</title>
  </head>
  <body>
    <p>Se ha realizado un nuevo pedido</p>
    <p>Estos son los datos del cliente que realizó el pedido:</p>
    <u>
      <li>
        <strong>Nombre:</strong>
        {{ $user->name}}
      </li>
      <li>
        <strong>E-mail:</strong>
        {{ $user->email }}
      </li>
      <li>
        <strong>Fecha del pedido</strong>
        {{ $cart->order_date }}
      </li>
    </u>
    <hr>
    <hr>
    <p>Detalle del pedido</p>
    <ul>
      @foreach ( $cart->details as $detail)
      <li>
        {{ $detail->product->name }} x {{ $detail->quantity }}
        ($ {{ $detail->quantity * $detail->product->price }} )
      </li>
      @endforeach
    </ul>
    <p>
      <strong>Importe a pagar :</strong>$ {{ $cart->total }}
    </p>
    <p>
      <a href="{{ url('/admin/order/'.$cart->id) }}">Has clic aqui</a> para mas informacion
    </p>
  </body>
</html>
