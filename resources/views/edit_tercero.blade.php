@extends('welcome')

@section('seccion')
	<div class="container">
		@foreach($EditTercero as $item2)
		<form  action="{{ route('update.terceros',$item2->id) }}" id="form" method="POST" class="border border-light p-5">
		      @csrf
		      @method('PUT')

		      <p class="h4 mb-4 text-center">Editar terceros</p>

			    
				      <select name="tipoDocumentos" id="tipoDocumento" class="form-control mb-4">
				      	<option value="">Selecione el tipo de documento</option>
				        <option value="TI" @if("TI" === $item2->tipoidentificacion) selected @endif>TI</option>
				        <option value="CC" @if("CC" === $item2->tipoidentificacion) selected @endif>CC</option>
				        <option value="CE" @if("CE" === $item2->tipoidentificacion) selected @endif>CE</option>
				      </select>
			    

			      
					  <input name="identificacion" type="text" class="form-control mb-4" placeholder="Identificación" value=" {{ $item2->numeroidentificacion }}">

				
				      <select name="tipoDepartamento" id="Departamento" class="form-control mb-4">
				        <option value="">Selecione el departamento</option>
				        
							@foreach($departamentos as $item)
								
					        	<option value="{{ $item->id }}" 
					        		@if($item->id === $item2->iddepartamento) selected @endif>
					        		{{ $item->nombdepa }}
					        	</option>
					        	
					        @endforeach
				        
				      </select>
			      
			    
				      <select name="tipoMunicipio" id="Municipio" class="form-control mb-4">

				             <option value="{{ $item2->idmunicipio }}" 
				             	@if($item->nombmuni === $item2->nombmuni) selected @endif>
				             	{{ $item2->nombmuni }}
				             </option>

				      </select>
		      
			      <input type="text" name="nombre1" value="{{ $item2->nombre1 }}" class="form-control mb-4" placeholder="Primer Nombre">

			      <input type="text" name="nombre2" value="{{ $item2->nombre2 }}" class="form-control mb-4" placeholder="Segundo Nombre">

			      <input type="text" name="apellido1" value="{{ $item2->apellido1 }}" class="form-control mb-4" placeholder="Primer Apellido">

			      <input type="text" name="apellido2" value="{{ $item2->apellido2 }}" class="form-control mb-4" placeholder="Segundo Apellido">
		      
				      <select name="tipoTercero" id="tipoTercer" class="form-control">
				        <option value=""  >Selecione el tipo de tercero</option>
				        <option value="1" @if("paciente" === $item2->nombtipo) selected @endif>paciente</option>
				        <option value="2" @if("empleado" === $item2->nombtipo) selected @endif>empleado</option>
				        <option value="3" @if("contratista" === $item2->nombtipo) selected @endif>contratista</option>
				        <option value="4" @if("otro" === $item2->nombtipo) selected @endif>
				        otro</option>
				      </select>

		      @endforeach

		      <input class="btn btn-info btn-block my-4" id="boton" type="submit" value="Modificar">
		      <a href="{{ route('tercero.index') }}" class="btn btn-secondary btn-block my-4">Cancelar</a>
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
	                  producto_select+='<option value="'+data[i].id+'" >'+data[i].nombmuni+'</option>';
	                $("#Municipio").html(producto_select);
	          });
	        });  	
	    });
      
</script>

@endsection