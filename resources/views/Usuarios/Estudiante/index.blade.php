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
                <div class="card-header text-uppercase">Estudiantes</div>

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
                                    <button type="button" class="btn btn-success create">
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
                                            <th scope="col">Sexo</th>
                                            <th class="text-center" scope="col">funciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudiantes as $key => $estudiante)
                                            <tr>
                                                <td>{{$estudiante->codigo}}</td>
                                                <td>{{$estudiante->DNI}}</td>
                                                <td>{{$estudiante->nombres}}</td>
                                                <td>{{$estudiante->apellidos}}</td>
                                                <td>{{$estudiante->celular}}</td>
                                                <td>{{$estudiante->sexo}}</td>
                                                <td class="text-center" style="width: 200px">
                                                    <button type="button" class="btn btn-secondary btn-sm view" dat="{{$estudiante->id}}"><i class="fa-solid fa-eye"></i></button>
                                                    <button type="button" class="btn btn-primary btn-sm edit" dat="{{$estudiante->id}}"><i class="fa-solid fa-pen"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm delete" dat="{{$estudiante->idestudiante}}"><i class="fa-solid fa-trash"></i></button>
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
                    <h5 class="modal-title" id="modaltitle">Nuevo estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="newData" id="newData">
                    <div class="modal-body">
                        @csrf 
                        <div class="row">
                            <input type="hidden" name="userid" id="userid">
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
                                <input type="date" class="form-control" name="f_nacimiento" id="f_nacimiento" autocomplete="off">
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
                                <select type="text" class="form-select" name="sexo" id="sexo" autocomplete="off">
                                    <option value="" hidden>Seleccione...</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Colegio egreso</label>
                                <input type="text" class="form-control" name="col_egreso" id="col_egreso" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Plan de estudios</label>
                                <select type="text" class="form-select" name="planid" id="planid" autocomplete="off">
                                        @foreach ($planes as $plan)
                                            <option value="{{$plan->idplan}}">{{$plan->año}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Facultad</label>
                                <select type="text" class="form-select" name="facultad" id="facultad" autocomplete="off">
                                    <option value="" hidden>Seleccione...</option>
                                    @foreach ($facultades as $facultad)
                                        <option value="{{$facultad->idfacultad}}">{{$facultad->facultad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Programa academico</label>
                                <select type="text" class="form-select" name="papid" id="papid" autocomplete="off">
                                    <option value="" hidden>Seleccione...</option>
                                    <option value="Masculino">Ing sistemas</option>
                                    <option value="Femenino">Ing civil</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-paper-plane"></i> <span class="btnsave">Guardar</span></button>
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
                <h5 class="modal-title" id="modaltitle">Mas información del docente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-button">
                    <tbody>
                        <tr>
                            <td>ID:</td>
                            <td id="celidestudiante">Null</td>
                        </tr>
                        <tr>
                            <td>Codigo:</td>
                            <td id="celcodigo">Null</td>
                        </tr>
                        <tr>
                            <td>DNI:</td>
                            <td id="celDNI">Null</td>
                        </tr>
                        <tr>
                            <td>Nombres:</td>
                            <td id="celnombres">Null</td>
                        </tr>
                        <tr>
                            <td>Apellidos:</td>
                            <td id="celapellidos">Null</td>
                        </tr>
                        <tr>
                            <td>Celular:</td>
                            <td id="celcelular">Null</td>
                        </tr>
                        <tr>
                            <td>Sexo:</td>
                            <td id="celsexo">Null</td>
                        </tr>
                        <tr>
                            <td>Fecha de nacimiento:</td>
                            <td id="celf_nacimiento">Null</td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td id="celestado">Null</td>
                        </tr>
                        <tr>
                            <td>Colegio de egreso:</td>
                            <td id="celcol_egreso">Null</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- elimininar -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltitle">Eliminar estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="destroy" name="destroy">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        
                        <div class="d-flex align-items-center justify-content-center px-2">
                            <i class="fa-solid fa-triangle-exclamation fa-5x text-danger"></i>
                            <span class="ps-4">Desea eliminar <b id="name"></b> ?</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/function-estudiante.js')}}"></script>  
@endsection
