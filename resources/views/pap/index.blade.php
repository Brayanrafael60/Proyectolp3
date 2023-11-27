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
                <div class="card-header text-uppercase">Programas academicos</div>

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
                                            <th scope="col">ID</th>
                                            <th scope="col">programa</th>
                                            <th scope="col">Ciclos</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">aniversario</th>
                                            <th scope="col">Estado</th>
                                            <th class="text-center" scope="col">funciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paps as $key => $pap)
                                            <tr>
                                                <td>{{$pap->idpap}}</td>
                                                <td>{{$pap->pap}}</td>
                                                <td>{{$pap->ciclos}}</td>
                                                <td>{{$pap->tipo}}</td>
                                                <td>{{$pap->aniversario}}</td>
                                                <td>@if ($pap->estado == 1) {{'Activo'}} @else {{'Inactivo'}} @endif</td>
                                                <td class="text-center" style="width: 200px">
                                                    <button type="button" class="btn btn-secondary btn-sm view" dat="{{$pap->idpap}}"><i class="fa-solid fa-eye"></i></button>
                                                    <button type="button" class="btn btn-primary btn-sm edit" dat="{{$pap->idpap}}"><i class="fa-solid fa-pen"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm delete" dat="{{$pap->idpap}}"><i class="fa-solid fa-trash"></i></button>
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
                    <h5 class="modal-title" id="modaltitle">Nuevo programa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="newData" id="newData">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="idpap" id="idpap">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nombre programa</label>
                                <input type="text" class="form-control" name="pap" id="pap" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Ciclos</label>
                                <input type="number" class="form-control" name="ciclos" id="ciclos" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tipo</label>
                                <select type="text" class="form-select" name="tipo" id="tipo" autocomplete="off">
                                    <option value="Pregrado">Pregrado</option>
                                    <option value="Postgrado">Postgrado</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Aniversario</label>
                                <input type="date" class="form-control" name="aniversario" id="aniversario" autocomplete="off">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">estado</label>
                                <select type="text" class="form-select" name="estado" id="estado" autocomplete="off">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Facultad</label>
                                <select type="text" class="form-select" name="facultadid" id="facultadid" autocomplete="off">
                                    @foreach ($facultades as $facultad)
                                        <option value="{{$facultad->idfacultad}}">{{$facultad->facultad}}</option>
                                    @endforeach
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
                <h5 class="modal-title" id="modaltitle">Mas información del programa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-button">
                    <tbody>
                        <tr>
                            <td>ID:</td>
                            <td id="celidpap">Null</td>
                        </tr>
                        <tr>
                            <td>Programa:</td>
                            <td id="celpap">Null</td>
                        </tr>
                        <tr>
                            <td>Tipo:</td>
                            <td id="celtipo">Null</td>
                        </tr>
                        <tr>
                            <td>Ciclos:</td>
                            <td id="celciclos">Null</td>
                        </tr>
                        <tr>
                            <td>Aniversario:</td>
                            <td id="celaniversario">Null</td>
                        </tr>
                        <tr>
                            <td>Creacion:</td>
                            <td id="celdatecreated">Null</td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td id="celestado">Null</td>
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
                    <h5 class="modal-title" id="modaltitle">Eliminar prograna</h5>
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
    <script src="{{asset('js/function-pap.js')}}"></script>  
@endsection