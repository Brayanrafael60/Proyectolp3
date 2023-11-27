@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <img class="user-img" src="https://png.pngtree.com/png-vector/20190710/ourlarge/pngtree-user-vector-avatar-png-image_1541962.jpg" height="120px">
                        </div>
                        <div class="col-md-8 mt-3">
                            <h4>{{$data[0]->nombres.' '.$data[0]->apellidos}}</h4>
                            <p>{{$data[0]->rol}}</p>
                            @if ($data[0]->idrol == env('ROL_ESTUDIANTE'))
                                <div class="d-flex">
                                    <h5 class="fa-solid fa-graduation-cap"></h5> &nbsp;<h5>{{$data[0]->pap}}</h5>
                                </div>
                            @endif
                            @if ($data[0]->idrol == env('ROL_DOCENTE'))
                                <div class="d-flex">
                                    <h5 class="fa-solid fa-chalkboard-user"></h5></h5> &nbsp;<h5>{{$data[0]->profesion}}</h5>
                                </div>
                            @endif
                            @if ($data[0]->idrol != env('ROL_DOCENTE') and $data[0]->idrol != env('ROL_ESTUDIANTE'))
                                <div class="d-flex">
                                    <h5 class="fa-solid fa-id-card-clip"></h5> &nbsp;<h5>{{$data[0]->area}}</h5>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="info">
                        
                        
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
