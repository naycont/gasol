<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Gasol') | Panel de Administrador</title>
    <link rel="stylesheet" href="{{asset('public/plugins/materialize/css/materialize.css')}}">
	<link rel="stylesheet" href="{{asset('public/plugins/materialize/fonts/materialize_icons.css')}}" >
</head>

<body>




  @include('template.partials.nav')

  <div id="app">

      <div class="container">
          <div class="row" >


              @yield('content')
          </div><!--row -->
</div>

      </div><!--container-->

<script src="{{ asset('public/js/app.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{asset('public/plugins/materialize/js/materialize.js')}}"></script>

</body>
</html>

<!--<script>
    $(document).ready(function() {
        $('select').material_select();
    });

</script>-->
