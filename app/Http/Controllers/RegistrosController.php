<?php

namespace therapeasy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use therapeasy\Registro;
use therapeasy\User;

class RegistrosController extends Controller
{
    public function cliente(Request $request)
    {
        $dataForm = $request->all();

        if (!isset($dataForm['data'])) {
            $registros = Registro::where([
                'cliente' => Auth::id()
            ])->orderBy('data', 'desc')->get();
        } else{

            $data = explode('/',$dataForm['data']);
            $data = implode('-',$data);

            $data = new \DateTime($data);
            $data = $data->format('Y-m-d');

            $registros = Registro::where([
                'cliente' => Auth::id()
            ])->where(
                'data', 'like', $data.'%'
            )->orderBy('data', 'desc')->get();
        }

        return view('pensamentos/pensamentosCli', compact('registros'));
    }

    public function novo()
    {
        return view('pensamentos/criar/pensamentoFormCli');
    }

    public function cadastrar(Request $request)
    {
        $user = Auth::user();
        $dataForm = $request->all();

        $dataForm['data'] = new \DateTime();
        $dataForm['cliente'] = Auth::id();
        $this->createPensamento($dataForm);

        $registros = [];

        return view('pensamentos/pensamentosCli', compact('registros'));
    }

    protected function createPensamento(array $data)
    {
        return Registro::create([
            'situacao' => $data['situacao'],
            'pensamentos_automatico' => $data['pensamentos_automatico'],
            'emocoes' => $data['emocoes'],
            'conclusao' => $data['conclusao'],
            'resultado' => $data['resultado'],
            'cliente' => $data['cliente'],
            'data' => $data['data'],
        ]);
    }

    protected function editar(Request $request)
    {
        $id = $request->id;

        $registro = Registro::where([
            'id' => $id
        ])->get()[0];

        $registro['cliente'] = User::where([
            'id' => Auth::id()
        ])->get()[0]['name'];

        return view('pensamentos/visualizar/visualizarPensamentoCli', compact('registro'));
    }

    protected function salvar(Request $request)
    {
        $id = $request->id;
        $dataForm = $request->all();

        Registro::where([
            'id' => $id
        ])->update([
            'situacao' => $dataForm['situacao'],
            'pensamentos_automatico' => $dataForm['pensamentos_automatico'],
            'emocoes' => $dataForm['emocoes'],
            'conclusao' => $dataForm['conclusao'],
            'resultado' => $dataForm['resultado'],
        ]);

        $registros = [];

        return view('pensamentos/pensamentosCli', compact('registros'));
    }

    protected function excluir(Request $request)
    {
        $id = $request->id;

        Registro::where([
            'id' => $id
        ])->delete();

        $registros = [];

        return view('pensamentos/pensamentosCli', compact('registros'));
    }
}
