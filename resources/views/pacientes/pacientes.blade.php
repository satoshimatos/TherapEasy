@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form-horizontal" method="GET" action="{{ route('lista.pacientes') }}">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <label class="panel-title">Filtros</label>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Nome:</label>
                                <input class="form-control" type="text" name="nome">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">Filtrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <label class="panel-title">Clientes</label>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-hover table-striped" align="center">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Código</th>
                                    <th style="text-align: center;">Nome</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Idade</th>
                                    <th style="text-align: center;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr align="center">
                                        <td>
                                            {{ $cliente->id }}
                                        </td>
                                        <td>
                                            {{ $cliente->name }}
                                        </td>
                                        <td>
                                            {{ $cliente->email }}
                                        </td>
                                        <td>
                                            {{ $cliente->idade }}
                                        </td>
                                        <td>
                                            <a href="{!! route('pensamentos.psicologo', ['idPaciente' => $cliente->id]) !!}">
                                                <button type="button" class="btn btn-info">
                                                    Registros
                                                </button>
                                            </a>
                                            <!-- <button type="button" class="btn btn-danger">
                                                Excluir
                                            </button> -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
