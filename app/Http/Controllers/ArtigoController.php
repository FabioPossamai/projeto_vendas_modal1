<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ArtigoFormRequest;
use App\Artigo;
use DB;

class ArtigoController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('textodebusca'));
            $artigo=DB::table('artigo as a')->join('categoria as c','a.categoria_id','=','c.categoria_id')
                ->select('a.artigo_id','a.nome','a.codigo','a.estoque','c.nome as categoria','a.imagem','a.estado')
                ->where('a.nome','LIKE','%'.$query.'%')
                ->orwhere('a.codigo','LIKE','%'.$query.'%')
                ->orderBy('a.artigo_id','desc')->paginate(7);
            return view('loja.artigo.index',["artigo"=>$artigo,"textodebusca"=>$query]);
        }

    }
    public function buscar(){

    }

    public function create(){
        $categoria=DB::table('categoria')->where('condicao','=','1')->get();
        return view('loja.artigo.create',['categorias'=>$categoria]);
    }

    public  function store(ArtigoFormRequest $request){
        $this->validate($request,['imagem'=>'requerid|mimes>jpeg,png,bmp,jpg,gif,svg|max:2048']);
        $artigo = new  Artigo;
        $artigo->categoria_id=$request->get('categoria_id');
        $artigo->codigo=$request->get('codigo');
        $artigo->nome=$request->get('nome');
        $artigo->estoque=$request->get('estoque');
        $artigo->descricao=$request->get('descricao');
        $artigo->estado='Ativo';
        if(Input::hasFile('imagem')){
            $file=Input::file('imagem');
            $file->move(public_path().'/imagem/artigo',$file->getClientOriginalName());
            $artigo->imagem=$file->getClientOriginalName();
        }
        $artigo->descricao= '1';
        $artigo->save();
        return redirect()->route('artigo');
    }

    public  function show($id){
        return view('loja.artigo.show',["artigo"=>Artigo::findOrFail($id)]);
    }

    public function edit($id){
        $artigo=Artigo::findOrFail($id);
        $categoria=DB::table('categoria')->where('descricao','=','1')->get();
        return view('loja.artigo.edit',['artigo'=>$artigo,'categorias'=>$categoria]);
    }

    public function update(ArtigoFormRequest $request,$id){
        $artigo=Artigo::findOrFail($id);
        $artigo = new  Artigo;
        $artigo->categoria_id=$request->get('categoria_id');
        $artigo->codigo=$request->get('codigo');
        $artigo->nome=$request->get('nome');
        $artigo->estoque=$request->get('estoque');
        $artigo->descricao=$request->get('descricao');
        if(Input::hasFile('imagem')){
            $file=Input::file('imagem');
            $file->move(public_path().'/imagem/artigo',$file->getClientOriginalName());
            $artigo->imagen=$file->getClientOriginalName();
        }
        $artigo->update();
        return redirect()->route('artigo');
    }

    public  function destroy($id){
        $artigo=Artigo::findOrFail($id);
        $artigo->estado = 'Inativo';
        $artigo->update();
        return redirect()->route('artigo');
    }
}
