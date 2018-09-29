@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Registros de Pensamentos</h3>
    @foreach($registros as $registro)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Código:</label>
                                {{ $registro->id }}
                            </div>
                            <div class="col-sm-4">
                                <label>Data:</label>
                                {{date('d/m/Y', strtotime($registro->data))}}
                            </div>
                            <div class="col-sm-4">
                                <label>Cliente:</label>
                                {{$registro->nome}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Emoção:</label>
                                {{ $registro->emocoes }}
                            </div>
                            <div class="col-sm-8">
                                <label>Situação:</label>
                                {{ $registro->situacao }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Resultado:</label>
                                {{ $registro->resultado }}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{!! route('pensamento.visualizar', ['idPaciente' => $registro->cliente, 'idPensamento' => $registro->id ]) !!}">
                                    <button type="button" class="btn btn-info">
                                        Visualizar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
