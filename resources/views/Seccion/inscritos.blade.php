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

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row text-uppercase text-center">
                                <h5 class="text-success">ESTUDIANTES DE LA ASIGNATURA {{$asignatura[0]->nombre}}, SECCION {{$asignatura[0]->seccion}} </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Apellidos y Nombres</th>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">DNI</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Sexo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inscritos as $key => $inscrito)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$inscrito->apellidos.' '.$inscrito->nombres}}</td>
                                                <td>{{$inscrito->codigo}}</td>
                                                <td>{{$inscrito->DNI}}</td>
                                                <td>{{$inscrito->celular}}</td>
                                                <td>{{$inscrito->sexo}}</td>
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