<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        if(Auth::user()->rolid == env('ROL_ESTUDIANTE')){
            $data = User::join('estudiantes', 'users.id', '=', 'estudiantes.userid')
                        ->join('rols', 'users.rolid', '=', 'rols.idrol')
                        ->join('paps', 'estudiantes.papid', '=', 'paps.idpap')
                        ->where('id',Auth::user()->id)->get();

        }else if(Auth::user()->rolid == env('ROL_ESTUDIANTE')){
            $data = User::join('docentes', 'users.id', '=', 'docentes.userid')
                        ->join('rols', 'users.rolid', '=', 'rols.idrol')
                        ->where('id',Auth::user()->id)->get();

        }else{
            $data = User::join('personals', 'users.id', '=', 'personals.userid')
                        ->join('rols', 'users.rolid', '=', 'rols.idrol')
                        ->where('id',Auth::user()->id)->get();
        }
    
        return view('home')->with('data',$data);
    }
}
