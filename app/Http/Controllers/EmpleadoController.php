<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado=Empleados::all();
        return $empleado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $empleado=Empleados::findOrFail($request->id);

        if($empleado){
            return response()->json([
                'message'=>'Datos Extraidos Correctamente',
                'type'=>1,
                'data'=>$empleado
            ],200);
        }else{
            return response()->json([
                'message'=>'No Data',
                'type'=>2
            ],200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado= new Empleados();
        $empleado->nombre=$request->nombre;
        $empleado->estado=$request->estado;
        $empleado->sexo=$request->sexo;
        $empleado->salario=$request->salario;

        if($empleado->save()){
            return response()->json([
                'message'=>'Empleado Registrado correctamente',
                'type'=>1
            ],200);
        }else{
            return response()->json([
                'message'=>'Error Registrando el Empleado',
                'type'=>2
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $empleado=Empleados::findOrFail($request->id);
        $empleado->nombre=$request->nombre;
        $empleado->estado=$request->estado;
        $empleado->sexo=$request->sexo;
        $empleado->salario=$request->salario;

        if($empleado->save()){
            return response()->json([
                'message'=>'Empleado Actualizando el correctamente',
                'type'=>1
            ],200);
        }else{
            return response()->json([
                'message'=>'Error Actualizando el Empleado',
                'type'=>2
            ],200);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $empleado=Empleados::findOrFail($request->id);
        $empleado->estado='I';

        if($empleado->save()){
            return response()->json([
                'message'=>'Empleado Eliminado correctamente',
                'type'=>1
            ],200);
        }else{
            return response()->json([
                'message'=>'Error Eliminando el Empleado',
                'type'=>2
            ],200);
        }
    }
}
