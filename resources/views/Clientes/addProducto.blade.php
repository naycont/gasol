@extends('template.main')
@section('content')


	
	<div class="card large">
		<div class = "card-content">
			{!! Form::open(['route'=>'addProducto', 'method'=>'POST', 'class'=>'col s12'])!!}

			<div class="input-field col s6">
				{!! Form::select('cliente_id',$clientes,null,['placeholder'=>'Selecciona...']) !!}
				{!! Form::label('cliente_id','Cliente') !!}
			</div>

			<div class="input-field col s6">
				{!! Form::select('producto_id',$productos,null,['placeholder'=>'Selecciona...']) !!}
				{!! Form::label('producto_id','Producto') !!}
			</div>

			<div class="input-field col s6">
				<i class="material-icons prefix">attach_money</i>
				{!! Form::text('precio',null, ['class'=>'']) !!}
				{!! Form::label('precio','Precio') !!}
			</div>

			   
		   <div class = "card-action">
                    {!! Form::submit('Guardar',['class'=>'btn waves-effect waves-light right']) !!}
					<a href="{{route('precios')}}" class="btn waves-effect waves-light right red" >Regresar</a>
           </div>
			  
			{!! Form::close()!!}

			
		</div><!-- card-content -->
	</div>



@endsection()


