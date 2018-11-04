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
                                    <textarea id="situacao" name="situacao" class="form-control" rows="6" maxlength="250" required
                                    placeholder="1. Que situação real, fluxo de pensamentos, devaneios ou recordações levaram a emoção desagradavel?"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Pensamentos Automáticos</label>
                                    <textarea id="pensamentos_automatico" name="pensamentos_automatico" class="form-control" rows="6" maxlength="250" required
                                    placeholder="1. Quais foram os pensamentos automáticos que passaram pela sua cabeça?&#x0a;2. Quanto você acredita em cada um deles (0 a 100%)?"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Emoções</label>
                                    <textarea id="emocoes" name="emocoes" class="form-control" rows="6" maxlength="250" required
                                    placeholder="1. Que emoção(ões) você sentiu?(tristeza/ansiedade/raiva/etc...)&#x0a;2. Quanto a intensidade dessa emoção? (0 a 100%)"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Conclusão</label>
                                    <textarea id="conclusao" name="conclusao" class="form-control" rows="6" maxlength="250" required
                                    placeholder="1. Quais são suas respostas racionais aos pensamentos automáticos?&#x0a;2. Use as perguntas abaixo para compor uma resposta ao(s) pensamento(s) automático(s)&#x0a;3. Quanto você acredita em cada resposta (0 a 100%)?"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Resultado</label>
                                    <textarea id="resultado" name="resultado" class="form-control" rows="6" maxlength="250" required
                                    placeholder="1. Quanto você acredita agora em cada pensamento automático (0 a 100%)?&#x0a;2. Que emoção(ões) você sente agora? Qual a intensidade (0 - 100%)?&#x0a;3. O que você fará (ou fez)?"></textarea>
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
