@extends('layouts.appPaciente')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Editar Pensamento
                </div>
                <form class="form-horizontal" method="POST" action="{!! route('pensamento.atualizar', ['id' => $registro->id]) !!}">
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
                                    <label>Cliente:</label><br>
                                    {{$registro->cliente}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Situação:</label>
                                    <textarea id="situacao" name="situacao" class="form-control" rows="6" maxlength="250" required>{{$registro->situacao}}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Pensamentos Automáticos:</label>
                                    <textarea id="pensamentos_automatico" name="pensamentos_automatico" class="form-control" rows="6" maxlength="250" required>{{$registro->pensamentos_automatico}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Emoções:</label>
                                    <textarea id="emocoes" name="emocoes" class="form-control" rows="6" maxlength="250" required>{{$registro->emocoes}}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Conclusão:</label>
                                    <textarea id="conclusao" name="conclusao" class="form-control" rows="6" maxlength="250" required>{{$registro->conclusao}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Resultado:</label>
                                    <textarea id="resultado" name="resultado" class="form-control" rows="6" maxlength="250" required>{{$registro->resultado}}</textarea>
                                </div>
                            </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12" align="right">
                                <a href="{{route('pensamentos.cliente')}}">
                                    <button type="button" class="btn btn-default">
                                        Voltar
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
