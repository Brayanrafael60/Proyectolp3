<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
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
        $personales = User::join('rols', 'users.rolid', '=', 'rols.idrol')
                    ->where('rolid', '!=', env('ROL_DOCENTE'))
                    ->where('rolid', '!=', env('ROL_ESTUDIANTE'))
                    ->get();
        $roles = Rol::where('estado', 1)->where('idrol', '!=', env('ROL_ESTUDIANTE'))->where('idrol', '!=', env('ROL_DOCENTE'))->get();

        return view('usuarios.personal.index')->with('personales',$personales)->with('roles',$roles);
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
            'rolid' => $request->rolid
        ]);

        if($usuario){
            $personal = Personal::create([
                'sueldoxh' => $request->sueldoxh,
                'area' => $request->area,
                'userid' => $usuario->id
            ]);
        }

        if($personal){
            return response()->json(['status' => true, 'msg' => 'Personal guardado']);
        }else{
            return response()->json(['status' => false, 'msg' => 'Personal no se guardo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
