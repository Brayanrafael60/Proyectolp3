<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PapController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PlanEstudioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// facultad
Route::get('/facultad', [FacultadController::class, 'index'])->name('facultad');
Route::get('/facultad/create', [FacultadController::class, 'create'])->name('facultad.create');
Route::post('/facultad/store', [FacultadController::class, 'store'])->name('facultad.store');
Route::get('/facultad/show/{id}', [FacultadController::class, 'show'])->name('facultad.show');
Route::get('/facultad/edit/{id}', [FacultadController::class, 'edit'])->name('facultad.edit');
Route::post('/facultad/update', [FacultadController::class, 'update'])->name('facultad.update');
Route::get('/facultad/delete/{id}', [FacultadController::class, 'delete'])->name('facultad.delete');
Route::post('/facultad/destroy', [FacultadController::class, 'destroy'])->name('facultad.destroy');

// pap
Route::get('/pap', [PapController::class, 'index'])->name('pap');
Route::get('/pap/create', [PapController::class, 'create'])->name('pap.create');
Route::post('/pap/store', [PapController::class, 'store'])->name('pap.store');
Route::get('/pap/show/{id}', [PapController::class, 'show'])->name('pap.show');
Route::get('/pap/edit/{id}', [PapController::class, 'edit'])->name('pap.edit');
Route::post('/pap/update', [PapController::class, 'update'])->name('pap.update');
Route::get('/pap/delete/{id}', [PapController::class, 'delete'])->name('pap.delete');
Route::post('/pap/destroy', [PapController::class, 'destroy'])->name('pap.destroy');
Route::get('/pap/papFac/{id}', [PapController::class, 'papFac'])->name('pap.papFac');

// plan
Route::get('/planEstudio', [PlanEstudioController::class, 'index'])->name('planEstudio');
Route::get('/planEstudio/create', [PlanEstudioController::class, 'create'])->name('planEstudio.create');
Route::post('/planEstudio/store', [PlanEstudioController::class, 'store'])->name('planEstudio.store');
Route::get('/planEstudio/edit/{id}', [PlanEstudioController::class, 'edit'])->name('planEstudio.edit');
Route::post('/planEstudio/update', [PlanEstudioController::class, 'update'])->name('planEstudio.update');
Route::get('/planEstudio/delete/{id}', [PlanEstudioController::class, 'delete'])->name('planEstudio.delete');
Route::post('/planEstudio/destroy', [PlanEstudioController::class, 'destroy'])->name('planEstudio.destroy');

// docente
Route::get('/docente', [DocenteController::class, 'index'])->name('docente');
Route::get('/docente/create', [DocenteController::class, 'create'])->name('docente.create');
Route::post('/docente/store', [DocenteController::class, 'store'])->name('docente.store');
Route::get('/docente/edit/{codigo}', [DocenteController::class, 'edit'])->name('docente.edit');
Route::put('/docente/update/{docente}', [DocenteController::class, 'update'])->name('docente.update');
Route::get('/docente/delete/{codigo}', [DocenteController::class, 'delete'])->name('docente.delete');
Route::delete('/docente/destroy/{docente}', [DocenteController::class, 'destroy'])->name('docente.destroy');

// estudiante
Route::get('/estudiante', [EstudianteController::class, 'index'])->name('estudiante');
Route::get('/estudiante/create', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiante/store', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('/estudiante/show/{id}', [EstudianteController::class, 'show'])->name('estudiante.show');
Route::get('/estudiante/edit/{codigo}', [EstudianteController::class, 'edit'])->name('estudiante.edit');
Route::post('/estudiante/update', [EstudianteController::class, 'update'])->name('estudiante.update');
Route::get('/estudiante/delete/{codigo}', [EstudianteController::class, 'delete'])->name('estudiante.delete');
Route::post('/estudiante/destroy', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');

// personal
Route::get('/personal', [PersonalController::class, 'index'])->name('personal');
Route::get('/personal/create', [PersonalController::class, 'create'])->name('personal.create');
Route::post('/personal/store', [PersonalController::class, 'store'])->name('personal.store');
Route::get('/personal/edit/{codigo}', [PersonalController::class, 'edit'])->name('personal.edit');
Route::put('/personal/update/{personal}', [PersonalController::class, 'update'])->name('personal.update');
Route::get('/personal/delete/{codigo}', [PersonalController::class, 'delete'])->name('personal.delete');
Route::delete('/personal/destroy/{personal}', [PersonalController::class, 'destroy'])->name('personal.destroy');

// asignatura
Route::get('/asignatura', [AsignaturaController::class, 'index'])->name('asignatura');
Route::get('/asignatura/create', [AsignaturaController::class, 'create'])->name('asignatura.create');
Route::post('/asignatura/store', [AsignaturaController::class, 'store'])->name('asignatura.store');
Route::get('/asignatura/edit/{codigo}', [AsignaturaController::class, 'edit'])->name('asignatura.edit');
Route::put('/asignatura/update/{asignatura}', [AsignaturaController::class, 'update'])->name('asignatura.update');
Route::get('/asignatura/delete/{codigo}', [AsignaturaController::class, 'delete'])->name('asignatura.delete');
Route::delete('/asignatura/destroy/{asignatura}', [AsignaturaController::class, 'destroy'])->name('asignatura.destroy');
Route::get('/asignatura/asigPap/{idpap}', [AsignaturaController::class, 'asigPap'])->name('asignatura.asigPap');

// aulas
Route::get('/aula', [AulaController::class, 'index'])->name('aula');
Route::get('/aula/create', [AulaController::class, 'create'])->name('aula.create');
Route::post('/aula/store', [AulaController::class, 'store'])->name('aula.store');
Route::get('/aula/edit/{id}', [AulaController::class, 'edit'])->name('aula.edit');
Route::put('/aula/update/{aula}', [AulaController::class, 'update'])->name('aula.update');
Route::get('/aula/delete/{id}', [AulaController::class, 'delete'])->name('aula.delete');
Route::delete('/aula/destroy/{aula}', [AulaController::class, 'destroy'])->name('aula.destroy');

// seccion
Route::get('/seccion/{asignatura}', [SeccionController::class, 'index'])->name('seccion');
Route::get('/seccion/create', [SeccionController::class, 'create'])->name('seccion.create');
Route::post('/seccion/store', [SeccionController::class, 'store'])->name('seccion.store');
Route::get('/seccion/edit/{id}', [SeccionController::class, 'edit'])->name('seccion.edit');
Route::put('/seccion/update/{seccion}', [SeccionController::class, 'update'])->name('seccion.update');
Route::get('/seccion/delete/{id}', [SeccionController::class, 'delete'])->name('seccion.delete');
Route::delete('/seccion/destroy/{seccion}', [SeccionController::class, 'destroy'])->name('seccion.destroy');
Route::get('/seccion/inscritos/{id}', [SeccionController::class, 'inscritos'])->name('seccion.inscritos');

// horario
Route::get('/horario/{seccion}', [HorarioController::class, 'index'])->name('horario');
Route::get('/horario/create', [HorarioController::class, 'create'])->name('horario.create');
Route::post('/horario/store', [HorarioController::class, 'store'])->name('horario.store');
Route::get('/horario/edit/{id}', [HorarioController::class, 'edit'])->name('horario.edit');
Route::put('/horario/update/{horario}', [HorarioController::class, 'update'])->name('horario.update');
Route::get('/horario/delete/{id}', [HorarioController::class, 'delete'])->name('horario.delete');
Route::delete('/horario/destroy/{horario}', [HorarioController::class, 'destroy'])->name('horario.destroy');

// matricula
Route::get('/matricula', [MatriculaController::class, 'index'])->name('matricula');
Route::get('/matricula/create', [MatriculaController::class, 'create'])->name('matricula.create');
Route::post('/matricula/store', [MatriculaController::class, 'store'])->name('matricula.store');
Route::get('/matricula/edit/{id}', [MatriculaController::class, 'edit'])->name('matricula.edit');
Route::put('/matricula/update/{matricula}', [MatriculaController::class, 'update'])->name('matricula.update');
Route::get('/matricula/delete/{id}', [MatriculaController::class, 'delete'])->name('matricula.delete');
Route::delete('/matricula/destroy/{matricula}', [MatriculaController::class, 'destroy'])->name('matricula.destroy');

Route::get('/verhorario/{ciclo?}/{pap?}', [MatriculaController::class, 'verhorario'])->name('verhorario');

// nota
Route::get('/nota', [NotaController::class, 'index'])->name('nota');
Route::get('/nota/create', [NotaController::class, 'create'])->name('nota.create');
Route::post('/nota/store', [NotaController::class, 'store'])->name('nota.store');
Route::get('/nota/edit/{id}', [NotaController::class, 'edit'])->name('nota.edit');
Route::put('/nota/update/{nota}', [NotaController::class, 'update'])->name('nota.update');
Route::get('/nota/delete/{id}', [NotaController::class, 'delete'])->name('nota.delete');
Route::delete('/nota/destroy/{nota}', [NotaController::class, 'destroy'])->name('nota.destroy');

// rol
Route::get('/rol', [RolController::class, 'index'])->name('rol');
Route::get('/rol/create', [RolController::class, 'create'])->name('rol.create');
Route::post('/rol/store', [RolController::class, 'store'])->name('rol.store');
Route::get('/rol/edit/{id}', [RolController::class, 'edit'])->name('rol.edit');
Route::put('/rol/update/{rol}', [RolController::class, 'update'])->name('rol.update');
Route::get('/rol/delete/{id}', [RolController::class, 'delete'])->name('rol.delete');
Route::delete('/rol/destroy/{rol}', [RolController::class, 'destroy'])->name('rol.destroy');

// usuario
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario');
Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/edit/{codigo}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/update/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::get('/usuario/delete/{codigo}', [UsuarioController::class, 'delete'])->name('usuario.delete');
Route::delete('/usuario/destroy/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
