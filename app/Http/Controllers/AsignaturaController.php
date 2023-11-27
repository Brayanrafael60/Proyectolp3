<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Facultad;
use App\Models\PlanEstudio;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::where('estado','!=', 0)->get();
        $facultades = Facultad::where('estado', 1)->orderBy('facultad')->get();
        $planes = PlanEstudio::where('estado', 1)->orderBy('idplan','desc')->get();

        return view('asignatura.index')->with('asignaturas',$asignaturas)->with('facultades',$facultades)->with('planes',$planes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ;

        $request->request->add([
            'codigo' => random_int(100000,999999)
        ]);

        $asignatura = Asignatura::create($request->all());

        if($asignatura){
            return response()->json(['status' => true, 'msg' => 'Asignatura guardado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Asignatura no se guardo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }

    public function asigPap($pap){
        
        $asignaturas = Asignatura::where('papid',$pap)->get();
        return response()->json($asignaturas);
    }
}
