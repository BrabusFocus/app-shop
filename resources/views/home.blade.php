@extends('layouts.app')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title">Dasboard</h2>
      @if (session('notitication'))
      <div class="alert alert-success">
        {{ session('notitication') }}
      </div>
      @endif
      <ul class="nav nav-pills nav-pills-primary" role="tablist">
        <li class="active">
          <a href="#dashboard" role="tab" data-toggle="tab">
            <i class="material-icons">dashboard</i>
            Carrito de Compras
          </a>
        </li>
        <li>
          <a href="#tasks" role="tab" data-toggle="tab">
            <i class="material-icons">list</i>
            Pedidos Realizados
          </a>
        </li>
      </ul>
      <hr>
      <p>Tu carrito de compras contiene <b>{{ auth()->user()->cart->details->count() }} </b> productos</p>
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">Img</th>
            <th class="text-center">Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>SubTotal</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach (auth()->user()->cart->details as $detail)
          <tr>
            <td class="text-center">
              <img src="{{ $detail->product->featured_image_url }}" height="50p" alt="">
            </td>
            <td class="text-center"><a href="{{ url('/products/'.$detail->id) }}" target="_blank">{{ $detail->product->name }}</a></td>
            <td>$ {{ $detail->product->price }}</td>
            <td> {{ $detail->quantity }}</td>
            <td>$ {{ $detail->quantity * $detail->product->price }}</td>
            <td class="td-actions">
              <form action="{{ url('/cart') }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <!-- Es equivalente a
                <input type="hidden" name="_token" value="{{ csrf_field() }}">
                <input type="hidden" name="_method" value="DELETE"> -->
                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                <a href="{{ url('/products/'.$detail->id) }}" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                  <i class="fa fa-info"></i>
                </a>
                <button type="submit" rel="tooltip" title="Elminar" class="btn btn-danger btn-simple btn-xs">
                  <i class="fa fa-times"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        <form class="" action="{{ url('/order') }}" method="post">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary btn-round" name="button">
            <i class="material-icons">done</i> Realizar Pedido
          </button>
        </form>
      </div>
    </div>
  </div>

</div>
@include('includes.footer');
@endsection
