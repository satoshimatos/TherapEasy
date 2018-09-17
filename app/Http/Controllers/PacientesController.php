<?php

namespace therapeasy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use therapeasy\Registro;
use therapeasy\User;

class PacientesController extends Controller
{
    public function paciente(Request $request)
    {
        $dataForm = $request->all();

        if (!isset($dataForm['nome'])) {
            $clientes = User::where([
                'psicologo' => Auth::id()
            ])->orderBy('name', 'asc')->get();
        } else{

            $nome = explode(' ',$dataForm['nome']);
            $nome = implode('%',$nome);

            $clientes = User::where([
                'psicologo' => Auth::id()
            ])->where(
                'name', 'ilike', '%'.$nome.'%'
            )->orderBy('name', 'asc')->get();
        }

        return view('pacientes/pacientes', compact('clientes'));
    }
}
