<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = Facultad::where('estado','!=', 0)->get();

        return view('facultad.index')->with('facultades',$facultades);
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
        $facultad = Facultad::create($request->all());

        if($facultad){
            return response()->json(['status' => true, 'msg' => 'Facultad guardado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Facultad no se guardo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facultades = Facultad::where('idfacultad',$id)->get();
        return response()->json($facultades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function edit(Facultad $facultad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $facultad = Facultad::where('idfacultad', $request->idfacultad)->update([
            'facultad' => $request->facultad,
            'estado' => $request->estado
        ]);

        if($facultad){
            return response()->json(['status' => true, 'msg' => 'Facultad actualizado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Facultad no se ha actualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $facultad = Facultad::where('idfacultad', $request->id)->update(['estado' => 0]);

        if($facultad){
            return response()->json(['status' => true, 'msg' => 'Facultad eliminado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Facultad no se ha eliminado']);
        }
    }
}
