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

    public function registros(Request $request)
    {
        $id = $request->idPaciente;
        $dataForm = $request->all();

        if (!isset($dataForm['data'])) {
            $registros = Registro::where([
                'cliente' => $id
            ])->orderBy('created_at', 'desc')->get();
        } else{

            $data = explode('/',$dataForm['data']);
            $data = implode('-',$data);

            $data = new \DateTime($data);
            $data = $data->format('Y-m-d');

            $registros = Registro::where([
                'cliente' => $id
            ])->where(
                'data', 'like', $data.'%'
            )->orderBy('created_at', 'desc')->get();
        }

        $cliente = User::where([
            'id' => $id
        ])->get()[0]['name'];

        foreach ($registros as $registro) {
            $registro['nome'] = $cliente;
            $registro['data'] = substr($registro['attributes']['created_at'],0,10);
        }

        return view('pensamentos/pensamentosPsi', compact('registros'));
    }

    public function pensamento(Request $request)
    {
        $idPaciente = $request->idPaciente;
        $idPensamento = $request->idPensamento;

        $registro = Registro::where([
            'id' => $idPensamento,
            'cliente' => $idPaciente
        ])->get()[0];

        $registro['nome'] = User::where([
            'id' => $idPaciente
        ])->get()[0]['name'];

        $registro['data'] = substr($registro['attributes']['created_at'],0,10);

        return view('pensamentos/visualizar/visualizarPensamentoPsi', compact('registro'));
    }
}
