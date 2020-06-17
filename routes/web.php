<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

Route::view('cadastrar', 'website.cadastrar');
Route::get('produtos', 'ProdutoHomeController@index');
Route::view('sobre', 'website.sobre');
Route::view('contato', 'website.contato');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('home/cliente', 'ClienteHomeController@index')->name('cliente')->middleware('auth');
Route::get('dashboard', 'PrincipalHomeController@index')->name('dashboard')->middleware('auth');

Route::get('dashboard/cadastros', 'CadastrosController')->name('cadastros')->middleware('auth');

// CADASTROS //
Route::group(['prefix' => 'dashboard/cadastros', 'middleware' => ['auth']], function () {
    Route::prefix('usuario')->group(function (){
        Route::post('store', 'UserController@store')->name('usuario.store');
    });

    Route::prefix('produto')->group(function (){
        Route::post('store', 'ProdutoController@store')->name('produto.store');
        Route::post('marca/store', 'MarcaController@store')->name('marca.store');
        Route::post('tipoproduto/store', 'TipoProdutoController@store')->name('tipoproduto.store');

        Route::get('findMarcas', 'ProdutoController@getMarca');
    });

    Route::prefix('animal')->group(function (){
        Route::post('especie/store', 'EspecieController@store')->name('especie.store');
        Route::post('raca/store', 'RacaController@store')->name('raca.store');
        Route::post('porte/store', 'PorteController@store')->name('porte.store');
        Route::post('cor/store', 'CorController@store')->name('cor.store');
        Route::post('pelo/store', 'PeloController@store')->name('pelo.store');
    });

    Route::post('servico/store', 'ServicoController@store')->name('servico.store');
    Route::post('tiposervico/store', 'TipoServicoController@store')->name('tiposervico.store');
});

// VENDA //
Route::group(['prefix' => 'dashboard/venda', 'middleware' => ['auth']], function () {
    Route::get('carrinho', 'VendaController@index')->name('venda.index');
    Route::match(['post','delete'],'carrinho/confirmarVenda', 'VendaController@confirmarVenda')->name('venda.store');
    Route::post('carrinho/adicionarProduto', 'VendaController@addProduto')->name('adicionar.produto.store');
    Route::delete('carrinho/removerProduto/{id}', 'VendaController@remProduto')->name('remover.produto.destroy');
    Route::get('carrinho/cancelarVenda', 'VendaController@cancelarVenda')->name('cancelar.venda');
    Route::view('carrinho/vendaFinalizada', 'sistema.principal.venda.vendaFinalizada')->name('venda.finalizada');

    Route::get('findProdutos', 'VendaController@getProdutos');
    Route::get('findClientes', 'VendaController@getClientes');
});

// PESQUISA //
Route::group(['prefix' => 'dashboard/pesquisa', 'middleware' => ['auth']], function () {
    Route::get('', 'PesquisaController@index')->name('pesquisa.index');
});

// FINANCEIRO //
Route::group(['prefix' => 'dashboard/financeiro', 'middleware' => ['auth']], function () {
    Route::get('', 'FinanceiroController@index')->name('financeiro.index');
});

// ESTOQUE //
Route::group(['prefix' => 'dashboard/estoque', 'middleware' => ['auth']], function () {
    Route::get('', 'EstoqueController@index')->name('estoque.index');
    Route::put('novaentrada/{id}', 'EstoqueController@atualizarEntrada')->name('entrada.produto.update');

    Route::get('findProdutos', 'EstoqueController@getProdutos');
});

// RELATÓRIOS //
Route::group(['prefix' => 'dashboard/relatorios', 'middleware' => ['auth']], function () {
    Route::get('', 'RelatorioController@index')->name('relatorios.index');

    Route::get('clientes/compras', 'RelatorioController@clientesCompras')->name('relatorio.clientes.compras');
    Route::get('clientes/consultas', 'RelatorioController@clientesConsultas')->name('relatorio.clientes.consultas');
    Route::get('clientes/assiduidade', 'RelatorioController@clientesAssiduidade')->name('relatorio.clientes.assiduidade');

    Route::get('funcionarios/vendas', 'RelatorioController@funcionariosVendas')->name('relatorio.funcionarios.vendas');

    Route::get('animais/consultas', 'RelatorioController@animaisConsultas')->name('relatorio.animais.consultas');
    Route::get('animais/assiduidade', 'RelatorioController@animaisAssiduidade')->name('relatorio.animais.assiduidade');

    Route::get('financeiro/lucro', 'RelatorioController@financeiroLucro')->name('relatorio.financeiro.lucro');

    Route::get('estoque/produtos', 'RelatorioController@estoqueProdutos')->name('relatorio.estoque.produtos');
    Route::get('estoque/falta', 'RelatorioController@estoqueFalta')->name('relatorio.estoque.falta');
    Route::get('estoque/lancamentos', 'RelatorioController@estoqueLancamentos')->name('relatorio.estoque.lancamentos');
});

// CLIENTE //
Route::group(['prefix' => 'home/cliente', 'middleware' => ['auth']], function () {
    Route::put('update/{id}', 'ClienteHomeController@update')->name('cliente.update');
    Route::post('animal/store', 'AnimalController@store')->name('animal.store');
    Route::put('animal/update/{id}', 'AnimalController@update')->name('animal.update');
    Route::delete('animal/destroy/{id}', 'AnimalController@destroy')->name('animal.destroy');

    Route::get('findEspecies', 'AnimalController@getEspecie');
    Route::get('findRacas', 'AnimalController@getRacas');
    Route::get('findCores', 'AnimalController@getCores');

    Route::post('findAgendamentos', 'AgendamentoController@getAgendamentos')->name('agendamento.consultar');
    Route::get('findEventos', 'AgendamentoController@getEventos')->name('evento.consultar');
});



