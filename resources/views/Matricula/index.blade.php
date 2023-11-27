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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-uppercase">CONSTANCIA DE MATRICULA SEMESTRE {{$semestre}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="card-body">
                            <p class="text-uppercase">ESTUDIANTE: <span class="p-2"></span> {{Auth::user()->nombres.' '.Auth::user()->apellidos.' - '.Auth::user()->codigo}}</p>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Asignatura</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Ciclo</th>
                                            <th scope="col">Cred.</th>
                                            <th scope="col">Seccion</th>
                                            <th class="text-center" scope="col">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asignaturas as $key => $asignatura)
                                            <tr>
                                                <td>{{$asignatura->codigo}}</td>
                                                <td>{{$asignatura->nombre}}</td>
                                                <td>{{$asignatura->tipo}}</td>
                                                <td>{{$asignatura->ciclo}}</td>
                                                <td>{{$asignatura->creditos}}</td>
                                                <td>{{$asignatura->seccion}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('seccion.inscritos',$asignatura->idseccion)}}" class="btn btn-secondary btn-sm view" dat="">INSCRITOS</a>
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

@section('script')
    <script src="{{asset('js/function-matricula.js')}}"></script>  
@endsection
