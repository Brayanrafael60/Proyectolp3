<?php

namespace App\Http\Controllers;

use App\Models\PlanEstudio;
use Illuminate\Http\Request;

class PlanEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planEstudios = PlanEstudio::where('estado','!=', 0)->get();

        return view('planEstudio.index')->with('planEstudios',$planEstudios);
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
        $plan = PlanEstudio::create($request->all());

        if($plan){
            return response()->json(['status' => true, 'msg' => 'Plan de estudios guardado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Plan de estudios no se guardo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function show(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanEstudio $planEstudio)
    {
        //
    }
}
