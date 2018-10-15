@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <label class="panel-title">Visualizar Pensamento</label>
                </div>
                <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Código:</label><br>
                                {{$registro->id}}
                            </div>
                            <div class="col-sm-4">
                                <label>Data:</label><br>
                                {{date('d/m/Y', strtotime($registro->data))}}
                            </div>
                            <div class="col-sm-4">
                                <label>Paciente:</label><br>
                                {{$registro->nome}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Situação:</label><br>
                                {{$registro->situacao}}
                            </div>
                            <div class="col-sm-6">
                                <label>Pensamentos Automáticos:</label><br>
                                {{$registro->pensamentos_automatico}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Emoções:</label><br>
                                {{$registro->emocoes}}
                            </div>
                            <div class="col-sm-6">
                                <label>Conclusão:</label><br>
                                {{$registro->conclusao}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Resultado:</label><br>
                                {{$registro->resultado}}
                            </div>
                        </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12" align="right">
                            <a href="{!! route('pensamentos.psicologo', ['idPaciente' => $registro->cliente]) !!}">
                                <button type="button" class="btn btn-default">
                                    Voltar
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
