@extends('template.main')
@section('content')



	<div class="card large">
		<div class = "card-content">
			{!! Form::open(['route'=>'addClienteProducto', 'method'=>'POST', 'class'=>'col s12'])!!}

			<div class="col s6">
				{!! Form::label('cliente_id','Cliente') !!}
				{!! Form::select('cliente_id',$clientes,null,['placeholder'=>'Selecciona...','style'=>'display:block']) !!}
			</div>

			<div class="col s6">
				{!! Form::label('producto_id','Producto') !!}
				{!! Form::select('producto_id',$productos,null,['placeholder'=>'Selecciona...','style'=>'display:block']) !!}
			</div>

			<div class="col s6">
				<br />

				{!! Form::label('precio','Precio') !!}
				{!! Form::text('precio',null, ['class'=>'validate','required']) !!}

			</div>


		   <div class = "card-action">
          {!! Form::submit('Guardar',['class'=>'btn waves-effect waves-light right']) !!}
					<a href="{{route('precios')}}" class="btn waves-effect waves-light right red" >Regresar</a>
           </div>

			{!! Form::close()!!}


		</div><!-- card-content -->
	</div>



@endsection()
