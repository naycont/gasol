@extends('template.main')
@section('content')



<div class="row" style="padding-top:2%">
	<div class="col s6">
			<h5 class="header"><i class="material-icons">attach_money</i>Precios</h5>
	</div>

	<div class="col s6">
		<a class="waves-effect waves-light btn right" href="{{route('clientes/Producto')}}">Crear Nuevo</a>
	</div>
</div>

		<div class="col s12">
			{!! Form::open(['route'=>'getPrecios','method'=>'POST'])!!}
			<div class=" col s4">
				{!! Form::label('cliente_id','Cliente') !!}
				{!! Form::select('cliente_id',$clientes,$respuesta['info']->id,['placeholder'=>'Selecciona...','style'=>'display:block']) !!}
			</div>


			<div class="col s3" style="float:right">
				{!! Form::submit('Buscar',['class'=>'btn waves-effect waves-light blue right']) !!}
			</div>

			{!! Form::close() !!}
		</div><!-- col s12-->

		<div class="col s12">
			<div class="col s6">
				<br />
				<label>Nombre: <strong>{{$respuesta['info']->nombre}}</strong></label><br />
				<label>RFC: <strong>{{$respuesta['info']->rfc}}</strong></label><br />
				<label>Dirección: <strong>{{$respuesta['info']->direccion}}</strong></label><br />
				<label>Telefono: <strong>{{$respuesta['info']->telefono}}</strong></label><br />
				<label>Factura: <strong>{{$respuesta['info']->factura}}</strong></label><br />
				<br />
			</div>
		</div>

		<div class="row" style="padding-top:10%">

							<div class="col s12">
								@if (count($respuesta['desglose']) > 0)
								<table class="bordered highlight centered responsive-table">
									<thead>
										<th>Nombre</th>
										<th>Precio</th>
										<th>Clave</th>
										<th>Clave SAT</th>
										<th>U. MEDIDA</th>
										<th>U. MEDIDA SAT</th>
									</thead>
									<tbody>
												@foreach($respuesta['desglose'] as $producto)
												<tr>
													<td>{{$producto['nombre']}}</td>
													<td><strong>{{'$'.$producto['pivot']['precio']}}</strong></td>
													<td>{{$producto['clave']}}</td>
													<td>{{$producto['clave_sat']}}</td>
													<td>{{$producto['um']}}</td>
													<td>{{$producto['um_sat']}}</td>

												</tr>

												@endforeach
									</tbody>
								</table>
								@else
										<label style="text-align:center">No hay registros</label>
								@endif

							</div><!-- col s12-->

		</div>







@endsection()
