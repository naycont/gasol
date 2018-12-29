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
				{!! Form::select('cliente_id',$clientes,null,['placeholder'=>'Seleccione Cliente...','style'=>'display:block']) !!}

			</div>


			<div class="col s3"  style="float:right">
				{!! Form::submit('Buscar',['class'=>'btn waves-effect waves-light blue right']) !!}
			</div>

			{!! Form::close() !!}
		</div><!-- col s12-->








@endsection()
