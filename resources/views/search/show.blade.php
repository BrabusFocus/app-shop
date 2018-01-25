@extends('layouts.app')
@section('page-title','Resultado de  busqueda')
@section('body-class','profile-page')
@section('styles')
<style>
.team .row .col-md-4{
  margin-bottom: 5em;
}
.team .row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
}
.team .row > [class*='col-']{
  display: flex;
  flex-direction: column;
}
</style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="profile">
          <div class="avatar">
            <img src="/img/search.png" alt="Imagen de una lupa que representa a la pagina de resultados" class="img-circle img-responsive img-raised">
          </div>
          <div class="name">
            <h3 class="title">Resultado de búsquedas</h3>
          </div>
            @if (session('notitication'))
            <br>
            <div class="alert alert-success">
              {{ session('notitication') }}
            </div>
            @endif
        </div>
      </div>
      <div class="description text-center">
        <p>Se encontrarón {{ $products->count() }} resultados para el término <b> {{ $query}} </b></p>
      </div>
      <div class="team text-center">
        <div class="row">
          @foreach ( $products as $product )
          <div class="col-md-4">
            <div class="team-player">
              <img src="{{  $product->featured_image_url  }}" class="img-raised img-circle">
              <h4 class="title"> <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                <br />
              </h4>
              <p class="description">{{ $product->description }} <a href="#">links</a> for people to be able to follow them outside the site.</p>

            </div>
          </div>
          @endforeach
        </div>
        <div class="text-center">
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer');
@endsection
