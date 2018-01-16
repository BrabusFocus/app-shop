@extends('layouts.app')

@section('page-title','Facrinama-listado de Productos')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
<div class="container">
    <div class="section text-center">
          <h2 class="title">Listado de Productos</h2>
        <div class="team">
        <div class="row">
          <a  href="{{ url('admin/products/create') }}"class="btn btn-primary btn-round">Añadir Producto</a>
          <table class="table">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th class="col-md-2 text-center">Nombre</th>
                      <th class="col-md-5 text-center">Descripción</th>
                      <th text-center>Categoría</th>
                      <th class="text-right">Precio</th>
                      <th class="text-right">Acciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($products as $row )
                  <tr>
                      <td class="text-center">{{ $row->id }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->description }}</td>
                      <td>{{ $row->category ? $row->category->name : 'General' }}</td>
                      <td class="text-right">$ {{ $row->price }}</td>
                      <td class="td-actions text-right">
                          <form action="{{ url('/admin/products/'.$row->id) }}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <!-- Es equivalente a
                              <input type="hidden" name="_token" value="{{ csrf_field() }}">
                              <input type="hidden" name="_method" value="DELETE"> -->
                              <a href="#" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                  <i class="fa fa-info"></i>
                              </a>
                              <a href="{{ url('/admin/products/'.$row->id.'/edit') }}" type="button" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                  <i class="fa fa-edit"></i>
                              </a>
                              <a href="{{ url('/admin/products/'.$row->id.'/images') }}" type="button" rel="tooltip" title="Imágenes  del Producto" class="btn btn-warning btn-simple btn-xs">
                                  <i class="fa fa-image"></i>
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
            {{ $products->links() }}
        </div>
    </div>

      </div>
  </div>

</div>

@include('includes.footer');
@endsection
