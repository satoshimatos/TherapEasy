<?php

namespace therapeasy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use therapeasy\User;
use Khill\Lavacharts\Lavacharts;
use therapeasy\Registro;

class RelatorioController extends Controller
{
    public function lista(Request $request)
    {
        $clientes = User::where([
            'psicologo' => Auth::id()
        ])->orderBy('name', 'asc')->get();

        return view('relatorio/relatorios', compact('clientes'));
    }

    public function relatorio(Request $request)
    {
        $dataForm = $request->all();

        $lava = new Lavacharts;
        $stocksTable = $lava->DataTable();

        $stocksTable->addDateColumn('Dia do Mês')
            ->addNumberColumn('Qtd');

        $dataInteira = new \DateTime($dataForm['data']);
        $mes = $dataInteira->format('m');

        while ($mes == $dataInteira->format('m'))
        {
            $de = $dataInteira->format('Y-m-d');
            $dataInteira->modify('+1 day');
            $ate = $dataInteira->format('Y-m-d');

            $registros = Registro::where([
                'cliente' => $dataForm['idCliente']
            ])->where(
                'created_at', '>=', $de
            )->where(
                'created_at', '<', $ate
            )->orderBy('created_at', 'desc')->get();

            $rowData = array(
              $de, count($registros)
            );

            $stocksTable->addRow($rowData);
        }

        $nome = User::where([
            'id' => $dataForm['idCliente']
        ])->get()[0]['name'];

        $lava->LineChart('Temps', $stocksTable, [
            'title' => 'Relatório de Registro do Paciente '.$nome
        ]);
        return view('relatorio/relatorio', compact('lava'));
    }
}
