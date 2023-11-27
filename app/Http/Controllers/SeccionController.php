<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Docente;
use App\Models\Matricula;
use App\Models\Seccion;
use App\Models\User;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($asignatura)
    {
        $secciones = Seccion::join('docentes', 'seccions.docenteid', '=', 'docentes.iddocente')
        ->join('users', 'docentes.userid', '=', 'users.id')
        ->where('asignaturaid',$asignatura)
        ->get();



        $docentes = Docente::join('users', 'docentes.userid', '=', 'users.id')
                    ->where('estado', 1)
                    ->get();

        return view('seccion.index')->with('secciones',$secciones)->with('asignatura',$asignatura)->with('docentes',$docentes);
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
        $seccion = Seccion::create($request->all());

        if($seccion){
            return response()->json(['status' => true, 'msg' => 'Seccion guardado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Seccion no se guardo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion $seccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccion $seccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        //
    }

    public function inscritos($seccion){

        $incritos = Matricula::join('estudiantes', 'matriculas.estudianteid', '=', 'estudiantes.idestudiante')
                            ->join('users', 'estudiantes.userid', '=', 'users.id')
                            ->where('matriculas.seccionid', $seccion)->orderBy("apellidos")->get();
        $asignatura = Asignatura::join('seccions', 'asignaturas.idasignatura', '=', 'seccions.asignaturaid')
                            ->where('seccions.idseccion', $seccion)->get();

        return view('seccion.inscritos')->with('inscritos',$incritos)->with('asignatura',$asignatura);
    }
}
