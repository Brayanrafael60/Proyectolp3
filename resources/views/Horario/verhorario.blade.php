@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
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
                <div class="card-header text-uppercase">HORARIOS POR CICLO</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <div class="row">
                        <div class="card-body">

                            CICLO: 
                            <select name="ciclo" id="ciclo">
                                @for ($i = 1; $i <= 14; $i++)
                                    @if ($i == $ciclo)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                             &nbsp; P.A.P: 
                            <select name="pap" id="pap" @if (Auth::user()->rolid == env('ROL_ESTUDIANTE')) disabled @endif>
                                @foreach ($paps as $pap)
                                    @if ($pap->idpap == $idpap)
                                        <option value="{{$pap->idpap}}" selected>{{$pap->pap}}</option>
                                    @else
                                        <option value="{{$pap->idpap}}">{{$pap->pap}}</option>
                                    @endif
                                @endforeach
                            </select><br><br>

                            <div class="table-responsive">
                                <table class="table table-bordered border-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Asignatura</th>
                                            <th scope="col">Docente</th>
                                            <th scope="col">Seccion</th>
                                            <th scope="col">Ciclo</th>
                                            <th scope="col">Lunes</th>
                                            <th scope="col">Martes</th>
                                            <th scope="col">Miercoles</th>
                                            <th scope="col">Jueves</th>
                                            <th scope="col">Viernes</th>
                                            <th scope="col">Sabado</th>
                                            <th scope="col">Domingo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asignaturas as $key => $asignatura)
                                            <tr>
                                                <td>{{$asignatura->codigo}}</td>
                                                <td>{{$asignatura->nombre}}</td>
                                                <td>{{$asignatura->nombres.' '.$asignatura->apellidos}}</td>
                                                <td class="text-center">{{$asignatura->seccion}}</td>
                                                <td class="text-center">{{$asignatura->ciclo}}</td>

                                                @foreach ($dias as $dia)
                                                <?php $band = true; ?>
                                                    @foreach ($horarios as $horario)
                                                        @if ($horario->idseccion == $asignatura->idseccion AND $horario->dia == $dia )
                                                            <td style="font-size: 11px">
                                                                {{$horario->h_inicio.'-'.$horario->h_fin}} <br>
                                                                <i class="fa-solid fa-door-open"></i>&nbsp;&nbsp; {{$horario->ubicacion}}
                                                            </td>
                                                            <?php $band = false; break;?>
                                                        @endif
                                                    @endforeach
                                                    @if ($band)
                                                        <td></td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            {{-- $horario->idseccion == $asignatura->idseccion and  --}}
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