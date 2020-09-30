@extends('welcome')

@section('seccion')
<div class="container">
      
        <table class="table table-responsive">
          <thead class="bg-primary text-white">
            <tr class="text-center">
              <th scope="col">Departamento</th>
              <th scope="col">Municipio</th>
              <th scope="col" colspan="2">Identificacion</th>
              <th scope="col">Nombres</th>
              <th scope="col">Tipo Tercero</th>
              <th scope="col" colspan="2">Opcion</th>
            </tr>
          </thead>
          <tbody>
            @foreach($terceros as $item)
            <tr class="bg-info">
              <th scope="row">{{ $item->nombdepa }} </th>
              <th>{{ $item->nombmuni }}</th>
              <th>{{ $item->tipoidentificacion }}</th>
              <th>{{ $item->numeroidentificacion }}</th>
              <th>{{ $item->nombre1 }} {{ $item->apellido1 }}</th>
              <th>{{ $item->nombtipo }}</th>
              <th> <a href="{{ route('modificar.terceros', $item->id) }}" class="text-white">Modificar</a> </th>
              <th> <a href="{{ route('borrar.terceros', $item->id) }}" class="text-white">Borrar</a> </th>
            </tr>
            @endforeach

          </tbody>
        </table>
      
</div>
@endsection