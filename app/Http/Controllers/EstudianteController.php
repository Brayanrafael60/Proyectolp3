<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Facultad;
use App\Models\PlanEstudio;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::join('users', 'estudiantes.userid', '=', 'users.id')
        ->where('rolid', env('ROL_ESTUDIANTE'))->where('estudiantes.estado','!=',0)->orderBy('id')->get();
        $facultades = Facultad::where('estado', 1)->orderBy('facultad')->get();
        $planes = PlanEstudio::where('estado', 1)->orderBy('idplan','desc')->get();

        return view('usuarios.estudiante.index')->with('estudiantes',$estudiantes)->with('facultades',$facultades)->with('planes',$planes);
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
        $usuario = User::create([
            'codigo' => '2022'.$request->DNI,
            'DNI' => $request->DNI,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,
            'sexo' => $request->sexo,
            'f_nacimiento' => $request->f_nacimiento,
            'password' => Hash::make($request->DNI),
            'rolid' => env('ROL_ESTUDIANTE'),
        ]);

        if($usuario){
            $estudiante = Estudiante::create([
                'col_egreso' => $request->col_egreso,
                'userid' => $usuario->id,
                'planid' => $request->planid,
                'papid' => $request->papid,
            ]);
        }

        if($estudiante){
            return response()->json(['status' => true, 'msg' => 'Estudiante guardado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Estudiante no se guardo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::join('users', 'estudiantes.userid', '=', 'users.id')
        ->where('userid', $id)
        ->get();
        return response()->json($estudiante);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $usuario = User::where('id', $request->userid)->update([
            'DNI' => $request->DNI,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,
            'sexo' => $request->sexo,
            'f_nacimiento' => $request->f_nacimiento,
            'password' => Hash::make($request->DNI)
        ]);

        if($usuario){
            $estudiante = Estudiante::where('userid', $request->userid)->update([
                'col_egreso' => $request->col_egreso,
                'planid' => $request->planid,
                'papid' => $request->papid,
            ]);
        }

        if($estudiante){
            return response()->json(['status' => true, 'msg' => 'Estudiante actualizado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Estudiante no se ha actualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $estudiante = Estudiante::where('idestudiante', $request->id)->update(['estado' => 0]);

        if($estudiante){
            return response()->json(['status' => true, 'msg' => 'Estudiante eliminado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Estudiante no se ha eliminado']);
        }
    }
}
