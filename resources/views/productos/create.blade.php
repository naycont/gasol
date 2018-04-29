@extends('template.main')
@section('content')


	
	<div class="card large">
		<div class = "card-content">
			{!! Form::open(['route'=>'productos.store', 'method'=>'POST', 'class'=>'col s12'])!!}
			  <div class="input-field col s6">
					<i class="material-icons prefix">spellcheck</i>
                    {!! Form::text('nombre',null, ['class'=>'validate','required']) !!}
                    {!! Form::label('nombre','Nombre') !!}
              </div>
			
			  
			  <div class="input-field col s6">
					<i class="material-icons prefix">vpn_key</i>
					{!! Form::text('clave',null,['class'=>'validate','required'])!!}
					{!! Form::label('clave','Clave interna') !!}
			  </div>
			  
			     <div class="input-field col s6">
					<i class="material-icons prefix">flag</i>
					{!! Form::text('clave_sat',null,['class'=>'validate','required'])!!}
					{!! Form::label('clave_sat','Clave SAT') !!}
			  </div>
			  <div class="input-field col s6">
					<i class="material-icons prefix">tab</i>
					{!! Form::text('um',null,['class'=>'validate','required'])!!}
					{!! Form::label('um','Unidad de medida Interna') !!}
			  </div>
			  <div class="input-field col s6">
					<i class="material-icons prefix">assignment</i>
                    {!! Form::text('um_sat',null, ['class'=>'materialize-textarea validate','required']) !!}
                    {!! Form::label('um_sat','Unidad de Medida SAT') !!}
              </div>
			  
			   <div class="input-field col s6">
					<i class="material-icons prefix">description</i>
                    {!! Form::textarea('descripcion',null, ['class'=>'materialize-textarea']) !!}
                    {!! Form::label('descripcion','descripción') !!}
              </div>

			   
			   <div class = "card-action">
                    {!! Form::submit('Guardar',['class'=>'btn waves-effect waves-light right']) !!}
					<a href="{{route('productos.index')}}" class="btn waves-effect waves-light right red" >Regresar</a>
                </div>
			  
			{!! Form::close()!!}

			
		</div><!-- card-content -->
	</div>



@endsection()


