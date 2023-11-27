<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\pap;
use App\Models\Seccion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();
        $mes = $date->format('m');
        if($mes < '03'){
            $semestre = $date->format('Y').'-0';
        }else if($mes < '08'){
            $semestre = $date->format('Y').'-1';
        }else{
            $semestre = $date->format('Y').'-2';
        }

        $matriculado = Matricula::where('estudianteid', $this->dataEstudiante()->idestudiante)->where('semestre', $semestre)->get();

        if(count($matriculado) > 0){
            $asignaturas = Asignatura::join('seccions', 'asignaturas.idasignatura', '=', 'seccions.asignaturaid')
                                    ->join('matriculas', 'seccions.idseccion', '=', 'matriculas.seccionid')
                                    ->where('estudianteid', $this->dataEstudiante()->idestudiante)
                                    ->where('semestre', $semestre)->get();

            return view('matricula.index')->with('asignaturas',$asignaturas)->with('semestre',$semestre);
        }else{
            $llevados = Asignatura::join('seccions', 'asignaturas.idasignatura', '=', 'seccions.asignaturaid')
                                    ->join('matriculas', 'seccions.idseccion', '=', 'matriculas.seccionid')
                                    ->where('estudianteid', $this->dataEstudiante()->idestudiante)->get(); // falta si paso el curso

            $asignaturas = Asignatura::join('plan_estudios', 'asignaturas.planid', '=', 'plan_estudios.idplan')
                                    ->where('asignaturas.papid', $this->dataEstudiante()->idpap)
                                    ->where('idplan', '=', $this->dataEstudiante()->planid)
                                    ->get();

            $secciones = Seccion::where('estado', 1)->get();
            return view('matricula.matricula')->with('asignaturas',$asignaturas)->with('secciones',$secciones)->with('llevados',$llevados);
        }

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
        $date = Carbon::now();
        $mes = $date->format('m');
        if($mes < '03'){
            $semestre = $date->format('Y').'-0';
        }else if($mes < '08'){
            $semestre = $date->format('Y').'-1';
        }else{
            $semestre = $date->format('Y').'-2';
        }
        
        $matricular = false;
        foreach ($request->matricula as $key => $data) {
            if(isset($data['seleccionado'])){
                $matricular = Matricula::create([
                    'semestre' => $semestre,
                    'estudianteid' => $this->dataEstudiante()->idestudiante,
                    'seccionid' => $data['seccionid'],
                ]);
            }
        }
        
        if($matricular){
            return response()->json(['status' => true, 'msg' => 'Matrulado satisfactoriamente']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Matrulado no se ha podido procesar']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
    }

    public function verhorario($ciclo = 1, $idpap = 1){

        if(Auth::user()->rolid == env('ROL_ESTUDIANTE')){
            $idpap = $this->dataEstudiante()->idpap;
        }

        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
        $paps = pap::where('estado','=', 1)->orderBy('idpap')->get();
        
        $asignaturas = Asignatura::join('seccions', 'asignaturas.idasignatura', '=', 'seccions.asignaturaid')
                                    ->join('docentes', 'seccions.docenteid', '=', 'docentes.iddocente')
                                    ->join('users', 'docentes.userid', '=', 'users.id')
                                    ->select("asignaturas.*", "nombre",  "nombres", "apellidos", "seccion", "idseccion")
                                    ->where('ciclo', $ciclo)
                                    ->where('asignaturas.papid', $idpap)
                                    ->orderBy('seccion')
                                    ->orderBy('seccion')->get();

        $Horarios = Asignatura::join('seccions', 'asignaturas.idasignatura', '=', 'seccions.asignaturaid')
                                    ->join('horarios', 'seccions.idseccion', '=', 'horarios.seccionid')
                                    ->join('aulas', 'horarios.aulaid', '=', 'aulas.idaula')
                                    ->select(DB::raw("idseccion, dia, TIME_FORMAT(h_inicio,'%H:%i') as h_inicio, TIME_FORMAT(h_fin,'%H:%i') as h_fin, ubicacion"))
                                    ->where('asignaturas.papid', $idpap)
                                    ->where('ciclo', $ciclo)->get();

        return view('horario.verhorario')->with('asignaturas', $asignaturas)->with('horarios', $Horarios)->with('dias', $dias)->with('ciclo', $ciclo)->with('paps', $paps)->with('idpap', $idpap);
    }

    // pap y estudiante
    function dataEstudiante(){
        $estudiante = Estudiante::join('paps', 'estudiantes.papid', '=', 'paps.idpap')->where('userid',Auth::user()->id)->get();
        return $estudiante[0];
    }
}
