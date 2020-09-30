@extends('welcome')

@section('seccion')
	<div class="container mt-5">
		<h5 class="card-title mt-5 font-weight-bold text-center">¿ Realmente desea borrar este elemento ?</h5>
		@foreach($BorrarTercero as $item)
			<form method="POST" action="">

				@method('delete')

				<div class="card text-center">
					  <div class="card-header">
					    {{ $item->tipoidentificacion }} - {{ $item->numeroidentificacion }}
					  </div>
					  <div class="card-body">
					    <h5 class="card-title">{{ $item->nombre1 }} {{ $item->apellido1 }}</h5>
					    <p class="card-text">Departamento: {{ $item->nombdepa }}</p>
					    <p class="card-text">Municipio: {{ $item->nombmuni }}</p>
					    <p class="card-text">Tipo tercero: {{ $item->nombtipo }}</p>
					  </div>
					  <div class="card-footer text-muted">
						<a href=" {{ route('destroy.terceros', $item->id)}}" class="btn btn-danger">Eliminar</a>
					    <a href="{{ route('tercero.index') }}" class="btn btn-secondary">Cancelar</a>
					  </div>
				</div>
				
			</form>
		@endforeach
	</div>
@endsection