<?php

namespace App\Http\Controllers;

use App\Tercero;
use App\Departamento;
use App\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class terceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$terceros=Tercero::All();

        $terceros = DB::table('tercero')
            ->join('departamento', 'tercero.iddepartamento', '=', 'departamento.id')
            ->join('municipio', 'tercero.idmunicipio', '=', 'municipio.id')
            ->join('tipotercero','tercero.tipotercero','=','tipotercero.id')
            ->select('tercero.id','tercero.tipoidentificacion', 'tercero.numeroidentificacion', 'tercero.nombre1','tercero.apellido1','departamento.nombdepa','municipio.nombmuni','tipotercero.nombtipo')
            ->orderBy('departamento.nombdepa', 'asc')
            ->get();

         
        return view('mostrarAll_tercero',compact('terceros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $departamentos = Departamento::All();
        return view('crear_tercero',compact('departamentos'));
    }

    public function municipio($id){
        
        return Municipio::where('iddepa','=',$id)->get();
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'tipoDocumentos'=>'required',
            'numeroidentificacion' => 'required|unique:tercero',
            'tipoDepartamento'=>'required',
            'tipoMunicipio'=>'required',
            'nombre1'=>'required',
            'nombre2'=>'required',
            'apellido1'=>'required',
            'apellido2'=>'required',
            'tipoTercero'=>'required'
        
        ]);

        $AddTercero = new Tercero();

        $AddTercero->tipoidentificacion = $request->tipoDocumentos;
        $AddTercero->numeroidentificacion = $request->identificacion;
        $AddTercero->iddepartamento= $request->tipoDepartamento;
        $AddTercero->idmunicipio= $request->tipoMunicipio;
        $AddTercero->nombre1 = $request->nombre1;
        $AddTercero->nombre2 = $request->nombre2;
        $AddTercero->apellido1 = $request->apellido1;
        $AddTercero->apellido2 = $request->apellido2;
        $AddTercero->tipotercero = $request->tipoTercero;

        $AddTercero->save();

        return redirect()->route('tercero.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function show(Tercero $tercero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $EditTercero = DB::table('tercero')
            ->join('departamento', 'tercero.iddepartamento', '=', 'departamento.id')
            ->join('municipio', 'tercero.idmunicipio', '=', 'municipio.id')
            ->join('tipotercero','tercero.tipotercero','=','tipotercero.id')
            ->where('tercero.id','=',$id)
            ->select('tercero.id','tercero.tipoidentificacion', 'tercero.numeroidentificacion', 'tercero.nombre1','tercero.nombre2','tercero.apellido1','tercero.apellido2','departamento.nombdepa','tercero.iddepartamento','tercero.idmunicipio','municipio.nombmuni','tipotercero.nombtipo')
            ->get();
        
        $departamentos = Departamento::All();

        return view('edit_tercero',compact('EditTercero','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ActualizarTercero = Tercero::findOrFail($id);

        $ActualizarTercero->tipoidentificacion = $request->tipoDocumentos;
        $ActualizarTercero->numeroidentificacion = $request->identificacion;
        $ActualizarTercero->iddepartamento = $request->tipoDepartamento;
        $ActualizarTercero->idmunicipio=$request->tipoMunicipio;
        $ActualizarTercero->nombre1=$request->nombre1;
        $ActualizarTercero->nombre2=$request->nombre2;
        $ActualizarTercero->apellido1=$request->apellido1;
        $ActualizarTercero->apellido2=$request->apellido2;
        $ActualizarTercero->tipotercero=$request->tipoTercero;

        $ActualizarTercero->save();

        return redirect()->route('tercero.index');

    }

    public function borrar($id)
    {
         $BorrarTercero = DB::table('tercero')
            ->join('departamento', 'tercero.iddepartamento', '=', 'departamento.id')
            ->join('municipio', 'tercero.idmunicipio', '=', 'municipio.id')
            ->join('tipotercero','tercero.tipotercero','=','tipotercero.id')
            ->where('tercero.id','=',$id)
            ->select('tercero.id','tercero.tipoidentificacion', 'tercero.numeroidentificacion', 'tercero.nombre1','tercero.apellido1','departamento.nombdepa','tercero.iddepartamento','tercero.idmunicipio','municipio.nombmuni','tipotercero.nombtipo')
            ->get();

        return view('borrar_tercero',compact('BorrarTercero'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyTerceros = Tercero::FindOrFail($id);

        $destroyTerceros->delete();

         return redirect()->route('tercero.index');

    }
}
