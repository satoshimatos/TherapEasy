@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form-horizontal" method="GET" action="{{ route('lista.pacientes') }}">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Filtros
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
    @foreach($clientes as $cliente)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <label class="panel-title">Clientes</label>
                    </div>
                    <div class="panel-body">
                        <table>
                            
                        </table>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Código:</label>
                                {{ $cliente->id }}
                            </div>
                            <div class="col-sm-4">
                                <label>Nome:</label>
                                {{$cliente->name}}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                    <button type="button" class="btn btn-info">
                                        Visualizar
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        Excluir
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
