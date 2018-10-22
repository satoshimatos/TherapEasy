<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dados-pessoais', 'PessoaController@dados')->name('dados.pessoais');
Route::post('/dados-pessoais/salvar', 'PessoaController@salvar')->name('dados.pessoais.salvar');

Route::post('/register', 'Auth\RegisterController@store')->name('cadastrar');
Route::get('/register', 'Auth\RegisterController@selecao')->name('register');
Route::get('/register/cliente', 'Auth\RegisterController@cliente')->name('register.cliente');
Route::get('/register/psicologo', 'Auth\RegisterController@psicologo')->name('register.psicologo');

Route::get('/pensamentos-cliente', 'RegistrosController@cliente')->name('pensamentos.cliente');
Route::get('/pensamentos-cliente/new', 'RegistrosController@novo')->name('pensamentoCreate.cliente');
Route::post('/pensamentos-cliente', 'RegistrosController@cadastrar')->name('pensamento.cadastrar');
Route::get('/pensamento-cliente/{id}', 'RegistrosController@excluir')->name('pensamento.excluir');
Route::get('/pensamentos-cliente/{id}/editar', 'RegistrosController@editar')->name('pensamentoUpdate.cliente');
Route::post('/atualizar-pensamento/{id}', 'RegistrosController@salvar')->name('pensamento.atualizar');

Route::get('/lista-clientes', 'PacientesController@paciente')->name('lista.pacientes');
Route::get('/lista-clientes/{idPaciente}', 'PacientesController@registros')->name('pensamentos.psicologo');
Route::get('/lista-clientes/{idPaciente}/pensamento/{idPensamento}/visualizar', 'PacientesController@pensamento')->name('pensamento.visualizar');

Route::get('/relatorio/cliente/{idPaciente}', 'RelatorioController@relatorio')->name('relatorio.cliente');
