@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <style>
            @media (max-width: 800px) {
                .pagination {
                    flex-wrap: wrap;
                    justify-content: center;
                    margin-top: 15px;
                }
            }
        </style>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-uppercase">Asignaturas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create">
                                        <i class="fa-solid fa-plus"></i> Create
                                    </button>
                                </div>
                                <div class="col-md-7">
                                    <div class="d-flex float-lg-start">
                                        {{-- {!! $fallecidos->links() !!} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <form class="d-flex">
                                        <input class="form-control me-2" name="buscar" type="Search" autocomplete="off">
                                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">nombre</th>
                                            <th scope="col">ciclo</th>
                                            <th scope="col">creditos</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">ht</th>
                                            <th scope="col">Hp</th>
                                            <th scope="col">Ht</th>
                                            <th scope="col">requisito</th>
                                            <th scope="col">Estado</th>
                                            <th class="text-center" scope="col">funciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asignaturas as $key => $asignatura)
                                            <tr>
                                                <td>{{$asignatura->idasignatura}}</td>
                                                <td>{{$asignatura->codigo}}</td>
                                                <td>{{$asignatura->nombre}}</td>
                                                <td class="text-center">{{$asignatura->ciclo}}</td>
                                                <td class="text-center">{{$asignatura->creditos}}</td>
                                                <td>{{$asignatura->tipo}}</td>
                                                <td>{{$asignatura->ht}}</td>
                                                <td>{{$asignatura->hp}}</td>
                                                <td>{{$asignatura->ht + $asignatura->hp}}</td>
                                                <td>{{$asignatura->prerequisito}}</td>
                                                <td>@if ($asignatura->estado == 1) {{'Activo'}} @else {{'Inactivo'}} @endif</td>
                                                <td class="text-center" style="width: 200px">
                                                    <a href="{{route('seccion',$asignatura->idasignatura)}}" class="btn btn-warning btn-sm view" dat=""><i class="fa-solid fa-arrow-down-a-z"></i></a>
                                                    <button type="button" class="btn btn-secondary btn-sm view" dat="" data-bs-toggle="modal" data-bs-target="#view"><i class="fa-solid fa-eye"></i></button>
                                                    <button type="button" class="btn btn-primary btn-sm update" dat="" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-pen"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm delete" dat="" data-bs-toggle="modal" data-bs-target="#delete"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                {{-- {!! $fallecidos->links() !!} --}}
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    <!-- crear/actualizar -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltitle">Nuevo asignatura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="newData" id="newData">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Asingatura</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Cliclo</label>
                                <input type="number" class="form-control" name="ciclo" id="ciclo" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Creditos</label>
                                <input type="number" class="form-control" name="creditos" id="creditos" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Tipo</label>
                                <select type="text" class="form-select" name="tipo" autocomplete="off">
                                    <option value="General">General</option>
                                    <option value="Carrera">Carrera</option>
                                    <option value="Especialidad">Especialidad</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Horas teoricas</label>
                                <input type="number" class="form-control" name="ht" id="ht" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Horas practicas</label>
                                <input type="number" class="form-control" name="hp" id="hp" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">estado</label>
                                <select type="text" class="form-select" name="estado" id="estado" autocomplete="off">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Plan de estudios</label>
                                <select type="text" class="form-select" name="planid" id="planid" autocomplete="off">
                                        @foreach ($planes as $plan)
                                            <option value="{{$plan->idplan}}">{{$plan->año}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="form-label">Facultad</label>
                                <select type="text" class="form-select"  id="facultad" autocomplete="off">
                                    <option value="" hidden>Seleccione...</option>
                                    @foreach ($facultades as $facultad)
                                        <option value="{{$facultad->idfacultad}}">{{$facultad->facultad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Programa academico</label>
                                <select type="text" class="form-select" name="papid" id="papid" autocomplete="off">
                                    <option value="" hidden selected>Seleccione... </option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Curso Pre requisito</label>
                                <select type="text" class="form-select" name="prerequisito" id="prerequisito" autocomplete="off">
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-paper-plane"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ver -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitle">Mas información de la asignatura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ver
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- elimininar -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitle">Eliminar asignatura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Eliminar
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/function-asignatura.js')}}"></script>  
@endsection