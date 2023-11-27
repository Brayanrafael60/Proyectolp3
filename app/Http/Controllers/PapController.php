<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\pap;
use Illuminate\Http\Request;

class PapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paps = pap::where('estado','!=', 0)->get();
        $facultades = Facultad::where('estado', 1)->orderBy('facultad', 'desc')->get();

        return view('pap.index')->with('paps',$paps)->with('facultades',$facultades);
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
        $pap = pap::create($request->all());

        if($pap){
            return response()->json(['status' => true, 'msg' => 'Programa academico guardado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Programa academico no se guardo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pap  $pap
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pap = pap::where('idpap',$id)->get();
        return response()->json($pap);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pap  $pap
     * @return \Illuminate\Http\Response
     */
    public function edit(pap $pap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pap  $pap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pap = pap::where('idpap', $request->idpap)->update([
            'pap' => $request->pap,
            'tipo' => $request->tipo,
            'ciclos' => $request->ciclos,
            'aniversario' => $request->aniversario,
            'estado' => $request->estado,
            'facultadid' => $request->facultadid
        ]);

        if($pap){
            return response()->json(['status' => true, 'msg' => 'pap actualizado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'pap no se ha actualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pap  $pap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pap = pap::where('idpap', $request->id)->update(['estado' => 0]);

        if($pap){
            return response()->json(['status' => true, 'msg' => 'pap eliminado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'pap no se ha eliminado']);
        }
    }

    public function papFac($facultad){
        $paps = pap::where('facultadid',$facultad)->get();
        return response()->json($paps);
    }
}
