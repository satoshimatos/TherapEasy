@extends('layouts.appPaciente')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Olá {{ Auth::user()->name }}, seja bem vindo(a).
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
