<?php

namespace therapeasy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use therapeasy\User;
use Khill\Lavacharts\Lavacharts;

class RelatorioController extends Controller
{
    public function relatorio(Request $request)
    {
        $id = $request->idPaciente;
        $lava = new Lavacharts;
        $stocksTable = $lava->DataTable();

        $stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Qtd');




        // Random Data For Example

        for ($a = 1; $a < 30; $a++)
        {
            $rowData = array(
              "2014-8-$a", rand(800,1000)
            );

            $stocksTable->addRow($rowData);
        }

        $lava->LineChart('Temps', $stocksTable, [
            'title' => 'Relatório de Registro do fulano'
        ]);
        return view('relatorio/relatorio', compact('lava'));
    }
}
