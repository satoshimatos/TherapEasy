@extends('layouts.app')

@section('content')
<div class="container">
    <div id="temps_div"></div>
    <?= $lava->render('LineChart', 'Temps', 'temps_div') ?>
</div>
@endsection
