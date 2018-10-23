@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form-horizontal" method="GET" action="{{ route('relatorio.cliente') }}">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <label class="panel-title">Filtros</label>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Data:</label>
                                <input class="form-control" type="month" name="data" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Paciente:</label>
                                <select class="form-control" name="idCliente" required>
                                    <option value=""></option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">Gerar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
