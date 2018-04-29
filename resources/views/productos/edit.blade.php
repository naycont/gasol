@extends('template.main')
@section('content')


	
	<div class="card large">
		<div class = "card-content">
			{!! Form::open(['route'=>['productos.update',$producto], 'method'=>'PUT', 'class'=>'col s12'])!!}

			<div class="input-field col s6">
				<i class="material-icons prefix">spellcheck</i>
				{!! Form::text('nombre',$producto->nombre, ['class'=>'validate','required']) !!}
				{!! Form::label('nombre','Nombre') !!}
			</div>


			<div class="input-field col s6">
				<i class="material-icons prefix">vpn_key</i>
				{!! Form::text('clave',$producto->clave,['class'=>'validate','required'])!!}
				{!! Form::label('clave','Clave interna') !!}
			</div>

			<div class="input-field col s6">
				<i class="material-icons prefix">flag</i>
				{!! Form::text('clave_sat',$producto->clave_sat,['class'=>'validate','required'])!!}
				{!! Form::label('clave_sat','Clave SAT') !!}
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix">tab</i>
				{!! Form::text('um',$producto->um,['class'=>'validate','required'])!!}
				{!! Form::label('um','Unidad de medida Interna') !!}
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix">assignment</i>
				{!! Form::text('um_sat',$producto->um_sat, ['class'=>'materialize-textarea validate','required']) !!}
				{!! Form::label('um_sat','Unidad de Medida SAT') !!}
			</div>

			<div class="input-field col s6">
				<i class="material-icons prefix">description</i>
				{!! Form::textarea('descripcion',$producto->descripcion, ['class'=>'materialize-textarea']) !!}
				{!! Form::label('descripcion','descripción') !!}
			</div>





			<div class = "card-action">
					
                    {!! Form::submit('Actualizar',['class'=>'btn waves-effect waves-light right']) !!}
					<a href="{{route('productos.index')}}" class="btn waves-effect waves-light right red" >Regresar</a>
                </div>
			  
			{!! Form::close()!!}

			
		</div><!-- card-content -->
	</div>



@endsection()


