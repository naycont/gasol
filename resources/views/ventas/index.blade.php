@extends('template.main')
@section('content')

<div class="row" style="padding-top:2%">
	<div class="col s6">
			<h5 class="header"><i class="material-icons">add_shopping_cart</i>Ventas</h5>
	</div>

	<div class="col s6">
		<a class="waves-effect waves-light btn right" href="{{route('ventas/create')}}">Registrar Venta</a>
	</div>
</div>

	<div class="row" style="padding-top:10%">
    <div class="col s12">
      <table class="bordered highlight centered responsive-table">
        <thead>
          <th>Cliente</th>
          <th>Producto</th>
          <th>Total</th>
          <th>Fecha Venta</th>
          <th>Estatus</th>
        </thead>
        <tbody>
          @foreach($ventas as $venta)
          <tr>
            <td></td>
            <td></td>
            <td>{{$venta->total}}</td>
            <td>{{$venta->fecha_venta}}</td>
            <td>{{$venta->estatus}}</td>
          </tr>

          @endforeach
        </tbody>
    </div>
  </div>
@endsection()
