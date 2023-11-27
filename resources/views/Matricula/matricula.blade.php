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
                <div class="card-header text-uppercase">Matricularse</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">

                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" id="formMatricularse" name="formMatricularse">
                                @csrf
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Asignatura</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Ciclo</th>
                                            <th scope="col" class="text-center">Seccion</th>
                                            <th class="text-center" scope="col">Seleccion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asignaturas as $key => $asignatura)

                                            <?php $paso = false; ?>
                                            @foreach ($llevados as $llevado)
                                                @if ($asignatura->prerequisito == $llevado->codigo)
                                                    <?php $paso = true; break;?>
                                                @endif
                                            @endforeach

                                            @if ($paso || count($llevados) == 0)
                                                <tr>
                                                    <td>{{$asignatura->codigo}}</td>
                                                    <td>{{$asignatura->nombre}}</td>
                                                    <td>{{$asignatura->tipo}}</td>
                                                    <td>{{$asignatura->ciclo}}</td>
                                                    <td class="text-center">
                                                        <?php $i = 0 ?>
                                                        @foreach ($secciones as $seccion)
                                                            @if ($asignatura->idasignatura == $seccion->asignaturaid)
                                                                <?php $i++ ?>
                                                            @endif
                                                        @endforeach
                                                        
                                                        @if ($i > 0)
                                                            <input type="hidden" name="matricula[{{$key}}][asignaturaid]" value="{{$asignatura->idasignatura}}" required >
                                                            <select name="matricula[{{$key}}][seccionid]" id="seccionid">
                                                                @foreach ($secciones as $seccion)
                                                                    @if ($asignatura->idasignatura == $seccion->asignaturaid)
                                                                        <option value="{{$seccion->idseccion}}">{{$seccion->seccion}}</option>
                                                                    @endif
                                                                @endforeach   
                                                            </select>
                                                        @else
                                                            <i class="fa-solid fa-ban"></i>
                                                        @endif
                                                        
                                                    </td>
                                                    <td class="text-center" style="width: 200px">
                                                        @if ($i > 0)
                                                            <input type="checkbox" name="matricula[{{$key}}][seleccionado]" id="seleccionado">
                                                        @else
                                                            <input type="checkbox" name="" id="" disabled>
                                                        @endif
                                                    </td>
                                                </tr>  
                                            @endif
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-end">
                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> --}}
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-paper-plane"></i> Matricularme</button>
                                </div>
                                </form>
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
                <h5 class="modal-title" id="modaltitle">Nuevo facultad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                todo los campos con (*) son obligatorios
                <br><br>

                <form action="#" method="POST">
                    
                    @csrf 
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nombre facultad</label>
                            <input type="text" class="form-control" name="facultad" id="facultad" autocomplete="off">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">estado</label>
                            <select type="text" class="form-select" name="estatus" autocomplete="off">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success"><i class="fa-solid fa-paper-plane"></i> Guardar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- ver -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitle">Mas información de facultad</h5>
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
                <h5 class="modal-title" id="modaltitle">Eliminar facultad</h5>
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
    <script src="{{asset('js/function-matricula.js')}}"></script>  
@endsection