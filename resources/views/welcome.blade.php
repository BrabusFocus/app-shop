@extends('layouts.app')
@section('page-title','Bienvenido a '.config('app.name'))
@section('body-class','landing-page')
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
.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 220px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Bienvenido a {{ config('app.name') }}</h1>
        <h4>Realiza pedidos en línea y te contactaremos para coordinar la entrega.</h4>
        <br />
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
          <i class="fa fa-play"></i> ¿ Cómo funciona?
        </a>
      </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center section-landing">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="title">¿Por que {{ config('app.name') }} ?</h2>
          <h5 class="description">Puedes revisar nuestra relacion completa de productos, comparar precios y reutilizar tus pedidos cuanto estes seguro.</h5>
        </div>
      </div>

      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-primary">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Aclaramos tus dudas</h4>
              <p>Respodemos rapidamente tus dudas via chat, en nuestra plataforma
                no estas solo, se cuenta con personal calificado para sulucionar tus inquietudes.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons">verified_user</i>
              </div>
              <h4 class="info-title">Pago seguro</h4>
              <p>Todos los pedidos que se ralicen sera confirmados por medio de una llamada telefonica. Y
                Los pagos realizados en nuestra plaforma son cifrados. Sino  confias en pagos enlinea Puedes
                optar por pago contra entrega.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Información Privada</h4>
                <p>Los pedidos realizados solo los conocerás tu a traves de tu panel de usuario. Nadie mas tendra acceso a tu información.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section text-center">
        <h2 class="title">Visita nuestras Categorías</h2>

        <form class="form-inline" action="{{ url('/search') }}" method="get">
          <input class="form-control" id="search" type="text" name="query" placeholder="¿Qué necesitas?">
          <button class="btn btn-primary btn-just-icon" type="submit">
            <i class="material-icons">search</i>
          </button>
        </form>

        <div class="team">
          <div class="row">
            @foreach ( $categories as $category )
            <div class="col-md-4">
              <div class="team-player">
                <img src="{{  $category->getFeaturedImageUrl() }}" alt="No tiene imgen asignada" class="img-raised img-circle">
                <h4 class="title"> <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                </h4>
                <p class="description">{{ $category->description }} <a href="#">links</a> for people to be able to follow them outside the site.</p>

              </div>
            </div>
            @endforeach
          </div>
        </div>

      </div>


      <div class="section landing-section">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center title">Work with us</h2>
            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Your Name</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Your Email</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group label-floating">
                <label class="control-label">Your Messge</label>
                <textarea class="form-control" rows="4"></textarea>
              </div>

              <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <button class="btn btn-primary btn-raised">
                    Send Message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>
  @include('includes.footer')
  @endsection
  @section('scripts')
  <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
  <script>
  $(function () {
    // constructs the suggestion engine (motor de  sugerencia Bloodhound)
    var products = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // Definir arreglo
      prefetch:'{{ url("/products/json") }}'
    });
    // Inicializar typeahead sobre nuestro input de busqueda
    $('#search').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'products',
      source: products
    });
  });
  </script>
  @endsection
