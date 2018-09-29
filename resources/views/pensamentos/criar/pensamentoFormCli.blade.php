@extends('layouts.appPaciente')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <label class="panel-title">Pensamento</label>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('pensamento.cadastrar') }}">
                    <div class="panel-body">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Situação</label>
                                    <textarea id="situacao" name="situacao" class="form-control" rows="6" maxlength="250" required></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Pensamentos Automáticos</label>
                                    <textarea id="pensamentos_automatico" name="pensamentos_automatico" class="form-control" rows="6" maxlength="250" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Emoções</label>
                                    <textarea id="emocoes" name="emocoes" class="form-control" rows="6" maxlength="250" required></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Conclusão</label>
                                    <textarea id="conclusao" name="conclusao" class="form-control" rows="6" maxlength="250" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Resultado</label>
                                    <textarea id="resultado" name="resultado" class="form-control" rows="6" maxlength="250" required></textarea>
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
                                <button type="submit" class="btn btn-success">Criar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
