@extends('template.main')
@section('content')


	<div class="row" style="padding-top:2%">
		<div class="col s6">
				<h5 class="header"><i class="material-icons">content_paste</i>Productos</h5>
		</div>
	
		<div class="col s6">
			<a class="waves-effect waves-light btn right" href="{{route('productos.create')}}">Crear Nuevo</a>
		</div>
	</div>
	

	
	<div class="card large">
		<div class = "card-content">
			
			<div class="col s12">
				<table class="bordered highlight centered responsive-table">
					<thead>
						<th>Nombre</th>
						<th>Clave</th>
						<th>Clave SAT</th>
						<th>Unidad Medida</th>
						<th>Unidad Medida SAT</th>
						<th>Acciones</th>
						
					</thead>
					<tbody>
						@foreach($productos as $producto)
							<tr>
								<td>{{$producto->nombre}}</td>
								<td>{{$producto->clave}}</td>
								<td>{{$producto->clave_sat}}</td>
								<td>{{$producto->um}}</td>
								<td>{{$producto->um_sat}}</td>

								<td> 
									<a href="{{route('productos.edit',$producto->id)}}" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">edit</i></a>
									<a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>	
								</td>
							</tr>
						@endforeach()
					</tbody>
				</table>
				{{$productos->links()}}
			</div><!-- col s12-->
		</div>
	</div>



@endsection()


