@extends('template.main')
@section('content')


	
	<div class="card large">
		<div class = "card-content">
			{!! Form::open(['route'=>['clientes.update',$cliente], 'method'=>'PUT', 'class'=>'col s12'])!!}
			  <div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
                    {!! Form::text('nombre',$cliente->nombre, ['class'=>'validate','required']) !!}
                    {!! Form::label('nombre','Nombre') !!}
              </div>
			
			  
			  <div class="input-field col s6">
					<i class="material-icons prefix">fingerprint</i>
					{!! Form::text('rfc',$cliente->rfc,['class'=>''])!!}
					{!! Form::label('rfc','RFC') !!}
			  </div>
			  
			
			  
			   <div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					{!! Form::text('telefono',$cliente->telefono,['class'=>''])!!}
					{!! Form::label('telefono','Teléfono') !!}
			  </div>
			  
			   <div class="input-field col s6">
					<i class="material-icons prefix">email</i>
					{!! Form::email('email',$cliente->email,['class'=>''])!!}
					{!! Form::label('email','Email') !!}
			  </div>
			  
			    <div class="input-field col s6">
					<i class="material-icons prefix">room</i>
                    {!! Form::textarea('direccion',$cliente->direccion, ['class'=>'materialize-textarea']) !!}
                    {!! Form::label('direccion','Dirección') !!}
              </div>
			  
			   <div class="input-field col s6">
					<i class="material-icons prefix">message</i>
                    {!! Form::textarea('nota',$cliente->nota, ['class'=>'materialize-textarea']) !!}
                    {!! Form::label('nota','Nota') !!}
              </div>
			  
			  
			   <div class="col s6">
			   	<i class="material-icons prefix">book</i>
					<label>Requiere Factura?</label>	
					
					<div class="switch">
						<label>	No
							{!! Form::checkbox('factura',null, $band = strcasecmp($cliente->factura,'Si')==0? true: '' ) !!}
							<span class="lever"></span>	Si  
						</label>
					</div>
			  </div>
			   <div class = "card-action">
					
                    {!! Form::submit('Actualizar',['class'=>'btn waves-effect waves-light right']) !!}
					<a href="{{route('clientes.index')}}" class="btn waves-effect waves-light right red" >Regresar</a>
                </div>
			  
			{!! Form::close()!!}

			
		</div><!-- card-content -->
	</div>



@endsection()


