@extends('welcome')

@section('seccion')

<div class="container mt-5">


    <form  action="{{ Route('store.tercero') }}" method="POST" class="border border-light p-5">
      @csrf
      <p class="h4 mb-4 text-center">Agregar terceros</p>

      <div class="mb-4">
        <select name="tipoDocumentos" id="tipoDocumento" class="form-control" >
          <option value="">Selecione el tipo de documento</option>
          <option value="TI" @if(old('tipoDocumentos') == 'TI') {{'selected'}} @endif>TI</option>
          <option value="CC" @if(old('tipoDocumentos') == 'CC') {{'selected'}} @endif>CC</option >
          <option value="CE" @if(old('tipoDocumentos') == 'CE') {{'selected'}} @endif>CE</option>
        </select>
        {!! $errors->first('tipoDocumentos', '<small class="text-danger"> Este campo es obligatorio </small>') !!}
      </div>

      <div class="mb-4">
        <input name="numeroidentificacion" type="number" class="form-control" placeholder="Identificación" value="{{old('numeroidentificacion')}}">
        {!! $errors->first('numeroidentificacion', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <div class="mb-4">
        <select name="tipoDepartamento" id="Departamento" class="form-control" value="{{old('tipoDepartamento')}}">
          <option value="">Selecione el departamento</option>
          @foreach($departamentos as $item)
            <option value="{{ $item->id }}">{{ $item->nombdepa }}</option>
          @endforeach
        </select>
        {!! $errors->first('tipoDepartamento', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <div class="mb-4">
        <select name="tipoMunicipio" id="Municipio" class="form-control" 
        value="{{old('tipoMunicipio')}}">
               <option value="">Seleccione Municipio</option>
        </select>
      {!! $errors->first('tipoMunicipio', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <div class="mb-4">
        <input type="text" name="nombre1" class="form-control" placeholder="Primer Nombre" value="{{old('nombre1')}}">
        {!! $errors->first('nombre1', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <div class="mb-4">
        <input type="text" name="nombre2" class="form-control" placeholder="Segundo Nombre" value="{{old('nombre2')}}">
        {!! $errors->first('nombre2', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <div class="mb-4">
        <input type="text" name="apellido1" class="form-control" placeholder="Primer Apellido" value="{{old('apellido1')}}">
      {!! $errors->first('apellido1', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <div class="mb-4">
        <input type="text" name="apellido2" class="form-control" placeholder="Segundo Apellido" value="{{old('apellido2')}}">
      {!! $errors->first('apellido2', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <div class="mb-4">
        <select name="tipoTercero" id="tipoTercer" class="form-control" value="{{old('tipoTercero')}}">
          <option value="">Selecione el tipo de tercero</option>
          <option value="1" @if(old('tipoTercero') == '1') {{'selected'}} @endif >Paciente</option>
          <option value="2" @if(old('tipoTercero') == '2') {{'selected'}} @endif>Empleado</option>
          <option value="3" @if(old('tipoTercero') == '3') {{'selected'}} @endif>Contratista</option>
          <option value="4" @if(old('tipoTercero') == '4') {{'selected'}} @endif>Otro</option>
        </select>
      {!! $errors->first('tipoTercero', '<small class="text-danger"> Este campo es obligatorio </small><br>') !!}
      </div>

      <button class="btn btn-info btn-block my-4" type="submit">Guardar</button>

      <a href="{{ route('tercero.index') }}" class="btn btn-secondary btn-block my-4">Cancelar</a>

  </form>       
</div>

<script>   
      $(document).ready(function(){
        $("#Departamento").change(function(){
          var categoria = $(this).val();
          $.get('getMunicipios/'+categoria, function(data){
    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
            console.log(data);
              var producto_select = '<option value="">Seleccione Municipio</option>'
                for (var i=0; i<data.length;i++)
                  producto_select+='<option value="'+data[i].id+'">'+data[i].nombmuni+'</option>';

                $("#Municipio").html(producto_select);
          });
        });
      });
</script>

@endsection

