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
                <div class="card-header text-uppercase">Personal</div>

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
                                            <th scope="col">Codigo</th>
                                            <th scope="col">DNI</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Rol</th>
                                            <th class="text-center" scope="col">funciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($personales as $key => $personal)
                                            <tr>
                                                <td>{{$personal->codigo}}</td>
                                                <td>{{$personal->DNI}}</td>
                                                <td>{{$personal->nombres}}</td>
                                                <td>{{$personal->apellidos}}</td>
                                                <td>{{$personal->celular}}</td>
                                                <td>{{$personal->rol}}</td>
                                                <td class="text-center" style="width: 200px">
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
                    <h5 class="modal-title" id="modaltitle">Nuevo personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="newData" id="newData">
                    <div class="modal-body">
                        @csrf 
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">DNI</label>
                                <input type="text" class="form-control" name="DNI" id="DNI" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Celular</label>
                                <input type="text" class="form-control" name="celular" id="celular" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Fecha nacimiento</label>
                                <input type="date" class="form-control" name="f_nacimiento" name="f_nacimiento" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres" id="nombres" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">sexo</label>
                                <select type="text" class="form-select" name="sexo" autocomplete="off">
                                    <option value="" hidden>Seleccione...</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Sueldo por Hora</label>
                                <input type="text" class="form-control" name="sueldoxh" id="sueldoxh" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Area</label>
                                <input type="text" class="form-control" name="area" id="area" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Rol</label>
                                <select type="text" class="form-select" name="rolid" id="rolid" autocomplete="off">
                                    @foreach ($roles as $rol)
                                        <option value="{{$rol->idrol}}">{{$rol->rol}}</option>
                                    @endforeach
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
                <h5 class="modal-title" id="modaltitle">Mas información del personal</h5>
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
                <h5 class="modal-title" id="modaltitle">Eliminar personal</h5>
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
    <script src="{{asset('js/function-personal.js')}}"></script>  
@endsection