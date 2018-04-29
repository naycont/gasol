@extends('template.main')
@section('content')


		<div class="col s6">
			<h5 class="header"><i class="material-icons">attach_money</i>Precios</h5>
		</div>

        <div class="col s6">
            <a class="btn  right" href="{{route('clientes/Producto')}}">Crear Nuevo</a>
        </div>

		<div class="col s12">
			{!! Form::open(['route'=>'getPrecios','method'=>'POST'])!!}
			<div class="input-field col s5">
				{!! Form::select('cliente_id',$clientes,null,['placeholder'=>'Selecciona...']) !!}
				{!! Form::label('cliente_id','Cliente') !!}
			</div>

			<div class="input-field col s5">
				{!! Form::select('producto_id',$productos,null,['placeholder'=>'Selecciona...']) !!}
				{!! Form::label('producto_id','Producto') !!}
			</div>

			<div class="col s2">
				{!! Form::submit('Buscar',['class'=>'btn waves-effect waves-light blue right']) !!}
			</div>

			{!! Form::close() !!}
		</div><!-- col s12-->








@endsection()
