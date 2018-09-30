@extends('layouts.appPaciente')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <label class="panel-title">Dados Pessoais</label>
                </div>
                <form class="form-horizontal" method="POST" action="{{route('dados.pessoais.salvar')}}">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Código:</label>
                                {{$pessoa->id}}
                            </div>
                            <div class="col-sm-4">
                                <label>Nome:</label>
                                {{$pessoa->name}}
                            </div>
                            <div class="col-sm-4">
                                <label>Email:</label>
                                {{$pessoa->email}}
                            </div>
                            <div class="col-sm-4">
                                <label>Idade:</label>
                                {{$pessoa->idade}}
                            </div>
                            <div class="col-sm-4">
                                <label>Psicologo:</label>
                                {{$pessoa->psicologo}}
                            </div>
                        </div><hr>
                        <h3>Mudar Senha</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Nova Senha</label>
                                <input id="senha" type="password" class="form-control" name="senha" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Confirmação de Nova Senha</label>
                                <input id="novaSenha" type="password" class="form-control" name="novaSenha" required>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12" align="right">
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
