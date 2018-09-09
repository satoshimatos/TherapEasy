@extends('layouts.appPaciente')

@section('content')
<div class="container">
    <form class="form-horizontal" method="GET" action="{{ route('pensamentos.cliente') }}">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Filtros
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Data:</label>
                                <input class="form-control" type="text" name="data">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">Filtrar</button>
                                <a href="{{route('pensamentoCreate.cliente')}}">
                                    <button type="button" class="btn btn-default">
                                        Novo Pensamento
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @foreach($registros as $registro)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                                <a href="{!! route('pensamentoUpdate.cliente', ['id' => $registro->id]) !!}">
                                    <button type="button" class="btn btn-info">
                                        Visualizar
                                    </button>
                                </a>
                                <a href="{!! route('pensamento.excluir', ['id' => $registro->id]) !!}">
                                    <button type="button" class="btn btn-danger">
                                        Excluir
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
