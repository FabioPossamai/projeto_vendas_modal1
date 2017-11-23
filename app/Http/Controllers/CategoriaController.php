<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;
class CategoriaController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('textodebusca'));
            $categoria=DB::table('categoria')->where('nome','LIKE','%'.$query.'%')
                ->where ('condicao','=','1')->orderBy('categoria_id','asc')->paginate(7);
            return view('loja.categoria.index',["categoria"=>$categoria,"textodebusca"=>$query]);
        }

    }
    public function buscar(){

    }

    public  function create(){
        return view('loja.categoria.create');
    }

    public  function store(CategoriaFormRequest $request){
        $categoria =new  Categoria;
        $categoria->nome=$request->get('nome');
        $categoria->descricao=$request->get('descricao');
        $categoria->condicao= '1';
        $categoria->save();
        return redirect()->route('categoria');
    }

    public function show($id){
        return view('loja.categoria.show',["categoria"=>Categoria::findOrFail($id)]);
    }

    public  function edit($id){
        return view('loja.categoria.edit',["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request,$id){
        $categoria=Categoria::findOrFail($id);
        $categoria->nome=$request->get('nome');
        $categoria->descricao=$request->get('descricao');
        $categoria->update();
        return redirect()->route('categoria');
    }

    public  function destroy($id){
        $categoria=Categoria::findOrFail($id);
        $categoria->condicao = '0';
        $categoria->update();
        return redirect()->route('categoria');
    }
}
