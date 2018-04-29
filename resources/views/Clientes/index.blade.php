@extends('template.main')
@section('content')


	<div class="row" style="padding-top:2%">
		<div class="col s6">
				<h5 class="header"><i class="material-icons">group</i>Clientes</h5>	
		</div>
	
		<div class="col s6">
			<a class="waves-effect waves-light btn right" href="{{route('clientes.create')}}">Crear Nuevo</a>
		</div>
	</div>
	
	<div class="row">
	{!! Form::open(['route'=>'clientes.index','method'=>'POST'])!!}
	
	 <div class="col s6">
		<label>Factura?</label>	
		<div class="switch">
			<label>	No
			{!! Form::checkbox('factura',null ) !!}
			<span class="lever"></span>	Si  
			</label>
		</div>
	 </div>
	{!! Form::close() !!}
	</div>
	
	
	<div class="card large">
		<div class = "card-content">
			
			<div class="col s12">
				<table class="bordered highlight centered responsive-table">
					<thead>
						<th>Nombre</th>
						<th>RFC</th>
						<th>Teléfono</th>
						<th>Factura</th>
						<th>Acciones</th>
						
					</thead>
					<tbody>
						@foreach($clientes as $cliente)
							<tr>
								<td>{{$cliente->nombre}}</td>
								<td>{{$cliente->rfc}}</td>
								<td>{{$cliente->telefono}}</td>
								<td>
									@if (strcasecmp($cliente->factura,'Si')==0 )
										<i class="material-icons">done</i>
									@else
										<i class="material-icons">clear</i>
									@endif
								</td>
								<td> 
									<a href="{{route('clientes.edit',$cliente->id)}}" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">edit</i></a>	
									<a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>	
								</td>
							</tr>
						@endforeach()
					</tbody>
				</table>
				{{$clientes->links()}}
			</div><!-- col s12-->
		</div>
	</div>



@endsection()


