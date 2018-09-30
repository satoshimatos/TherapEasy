<?php

namespace therapeasy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use therapeasy\User;

class PessoaController extends Controller
{
    public function dados(Request $request)
    {
        $pessoa = User::where([
            'id' => Auth::id()
        ])->get()[0];

        if ($pessoa->getAttributes()['crp']) {
            return view('dados/pessoaisPsi', compact('pessoa'));
        }

        $pessoa['psicologo'] = User::where([
            'id' => $pessoa['psicologo']
        ])->get()[0]['name'];

        return view('dados/pessoaisCli', compact('pessoa'));
    }

    public function salvar(Request $request)
    {
        $dataForm = $request->all();

        if (count($dataForm) && $dataForm['senha'] == $dataForm['novaSenha']) {
            User::where([
                'id' => Auth::id()
            ])->update([
                'password' => bcrypt($dataForm['senha']),
            ]);
        }

        Auth::logout();
        return redirect('/login');
    }
}
