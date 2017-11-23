<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PessoaFormRequest;
use DB;

class FornecedorController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('textodebusca'));
            $pessoa=DB::table('pessoa')->where('nome','LIKE','%'.$query.'%')
                ->where ('tipo_pessoa','=','Fornecedor')
                ->orwhere('num_documento','LIKE','%'.$query.'%')
                ->where ('tipo_pessoa','=','Fornecedor')->orderBy('pessoa_id','desc')->paginate(7);
            return view('loja.compras.fornecedor.index',["pessoas"=>$pessoa,"textodebusca"=>$query]);
        }

    }

    public  function create(){
        return view('loja.compras.fornecedor.create');
    }

    public  function store(PessoaFormRequest $request){
        $pessoa =new  Pessoa;
        $pessoa->tipo_pessoa='Fornecedor';
        $pessoa->nome=$request->get('nome');
        $pessoa->tipo_documento=$request->get('tipo_documento');
        $pessoa->num_documento=$request->get('num_documento');
        $pessoa->direcao=$request->get('direcao');
        $pessoa->telefone=$request->get('telefone');
        $pessoa->email=$request->get('email');
        $pessoa->save();
        return redirect()->route('fornecedor');
    }

    public  function show($id){
        return view('loja.compras.fornecedor.show',["pessoa"=>Pessoa::findOrFail($id)]);
    }

    public  function edit($id){
        return view('loja.compras.fornecedor.edit',["pessoa"=>Pessoa::findOrFail($id)]);
    }

    public function update(PessoaFormRequest $request,$id){
        $pessoa=Pessoa::findOrFail($id);
        $pessoa->nome=$request->get('nome');
        $pessoa->tipo_documento=$request->get('tipo_documento');
        $pessoa->num_documento=$request->get('num_documento');
        $pessoa->direcao=$request->get('direcao');
        $pessoa->telefone=$request->get('telefone');
        $pessoa->email=$request->get('email');
        $pessoa->update();
        return redirect()->route('fornecedor');
    }

    public function destroy($id){
        $pessoa=Pessoa::findOrFail($id);
        $pessoa->tipo_pessoa = 'Inativo';
        $pessoa->update();
        return Redirect::to('fornecedor');
    }
}
