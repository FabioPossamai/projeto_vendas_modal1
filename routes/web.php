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
    return view('auth/login');
});
Route::group(['prefix'=>'categoria','where'=>['id'=>'[0-9]+']],function(){
    Route::get('',['as'=>'categoria','uses'=>'CategoriaController@index'])->middleware(['auth']);
    Route::get('busca',['as'=>'categoria.busca','uses'=>'CategoriaController@busca'])->middleware(['auth']);
    Route::get('create',['as'=>'categoria.create','uses'=>'CategoriaController@create'])->middleware(['auth']);
    Route::get('{id}/destroy',['as'=>'categoria.destroy','uses'=>'CategoriaController@destroy'])->middleware(['auth']);
    Route::get('{id}/edit',['as'=>'categoria.edit','uses'=>'CategoriaController@edit'])->middleware(['auth']);
    Route::put('{id}/update',['as'=>'categoria.update','uses'=>'CategoriaController@update'])->middleware(['auth']);
    Route::post('store',['as'=>'categoria.store','uses'=>'CategoriaController@store'])->middleware(['auth']);
});
Route::group(['prefix'=>'artigo','where'=>['id'=>'[0-9]+']],function(){
    Route::get('',['as'=>'artigo','uses'=>'ArtigoController@index']);
    Route::get('busca',['as'=>'categoria.busca','uses'=>'CategoriaController@busca'])->middleware(['auth']);
    Route::get('create',['as'=>'artigo.create','uses'=>'ArtigoController@create'])->middleware(['auth']);
    Route::get('{id}/destroy',['as'=>'artigo.destroy','uses'=>'ArtigoController@destroy'])->middleware(['auth']);
    Route::get('{id}/edit',['as'=>'artigo.edit','uses'=>'ArtigoController@edit'])->middleware(['auth']);;
    Route::put('{id}/update',['as'=>'artigo.update','uses'=>'ArtigoController@update'])->middleware(['auth']);
    Route::post('store',['as'=>'artigo.store','uses'=>'ArtigoController@store'])->middleware(['auth']);
});
Route::group(['prefix'=>'fornecedor','where'=>['id'=>'[0-9]+']],function(){
    Route::get('',['as'=>'fornecedor','uses'=>'FornecedorController@index'])->middleware(['auth']);
    Route::get('busca',['as'=>'categoria.busca','uses'=>'CategoriaController@busca'])->middleware(['auth']);
    Route::get('create',['as'=>'fornecedor.create','uses'=>'FornecedorController@create'])->middleware(['auth']);
    Route::get('{id}/destroy',['as'=>'fornecedor.destroy','uses'=>'FornecedorController@destroy'])->middleware(['auth']);
    Route::get('{id}/edit',['as'=>'fornecedor.edit','uses'=>'FornecedorController@edit'])->middleware(['auth']);
    Route::put('{id}/update',['as'=>'fornecedor.update','uses'=>'FornecedorController@update'])->middleware(['auth']);
    Route::post('store',['as'=>'fornecedor.store','uses'=>'FornecedorController@store'])->middleware(['auth']);
});
Route::group(['prefix'=>'renda','where'=>['id'=>'[0-9]+']],function(){
    Route::get('',['as'=>'renda','uses'=>'RendaController@index'])->middleware(['auth']);;
    Route::get('busca',['as'=>'categoria.busca','uses'=>'CategoriaController@busca'])->middleware(['auth']);
    Route::get('create',['as'=>'renda.create','uses'=>'RendaController@create'])->middleware(['auth']);;
    Route::get('{id}/destroy',['as'=>'renda.destroy','uses'=>'RendaController@destroy'])->middleware(['auth']);
    Route::get('{id}/edit',['as'=>'renda.edit','uses'=>'RendaController@edit'])->middleware(['auth']);
    Route::put('{id}/update',['as'=>'renda.update','uses'=>'RendaController@update'])->middleware(['auth']);
    Route::post('store',['as'=>'renda.store','uses'=>'RendaController@store'])->middleware(['auth']);
});
Route::group(['prefix'=>'cliente','where'=>['id'=>'[0-9]+']],function(){
    Route::get('',['as'=>'cliente','uses'=>'ClienteController@index'])->middleware(['auth']);;
    Route::get('busca',['as'=>'categoria.busca','uses'=>'CategoriaController@busca'])->middleware(['auth']);
    Route::get('create',['as'=>'cliente.create','uses'=>'ClienteController@create'])->middleware(['auth']);
    Route::get('{id}/destroy',['as'=>'cliente.destroy','uses'=>'ClienteController@destroy'])->middleware(['auth']);
    Route::get('{id}/edit',['as'=>'cliente.edit','uses'=>'ClienteController@edit'])->middleware(['auth']);;
    Route::put('{id}/update',['as'=>'cliente.update','uses'=>'ClienteController@update'])->middleware(['auth']);
    Route::post('store',['as'=>'cliente.store','uses'=>'ClienteController@store'])->middleware(['auth']);
});
Route::group(['prefix'=>'venda','where'=>['id'=>'[0-9]+']],function(){
    Route::get('',['as'=>'venda','uses'=>'VendaController@index'])->middleware(['auth']);
    Route::get('busca',['as'=>'categoria.busca','uses'=>'CategoriaController@busca'])->middleware(['auth']);
    Route::get('create',['as'=>'venda.create','uses'=>'VendaController@create'])->middleware(['auth']);
    Route::get('{id}/destroy',['as'=>'venda.destroy','uses'=>'VendaController@destroy'])->middleware(['auth']);
    Route::get('{id}/edit',['as'=>'venda.edit','uses'=>'VendaController@edit'])->middleware(['auth']);
    Route::put('{id}/update',['as'=>'venda.update','uses'=>'VendaController@update'])->middleware(['auth']);
    Route::post('store',['as'=>'venda.store','uses'=>'VendaController@store'])->middleware(['auth']);
});
Route::resource('seguranca/usuarios','UsuarioController');
Route::auth();
Route::get('/home','CategoriaController@index');
Route::get('/{slug?}','HomeController@index');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::resource('loja/categoria','CategoriaController');
Route::resource('loja/categoria','CategoriaController');
Route::resource('loja/artigo','ArtigoController');
Route::resource('loja/vendas/cliente','ClienteController');
Route::resource('loja/compras/fornecedor','FornecedorController');
Route::resource('loja/compras/renda','RendaController');
Route::resource('loja/compras/venda','VendaController');
Route::resource('seguranca/usuarios','UsuarioController');
Route::auth();
Route::get('/home','CategoriaController@index');
Route::get('/{slug?}','HomeController@index');
*/