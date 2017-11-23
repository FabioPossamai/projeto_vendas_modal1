<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RendaFormRequest;
use App\Renda;
use App\DetalheRenda;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class RendaController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('textodebusca'));
            $renda=DB::table('renda as i')->join('pessoa as p','i.pessoa_id','=','p.pessoa_id')
                ->join('tabela_renda as ti','i.renda_id','=','ti.renda_id')
                ->select('i.renda_id','i.data_hora','p.nome','i.tipo_comprovante','i.serie_comprovante'
                ,'i.num_comprovante','i.imposto','i.estado',DB::raw('sum(ti.quantidade * preco_compra) as total'))
                ->where('i.num_comprovante','LIKE','%'.$query.'%')->orderby('i.renda_id','desc')
                ->groupBy('i.renda_id','i.date_hora','p.nome','i.tipo_comprovante','i.serie_comprovante'
                ,'i.num_comprovante','i.imposto','i.estado')->paginate(7);
            return view('loja.compras.renda.index',["renda"=>$renda,"textodebusca"=>$query]);
        }

    }
    public function create(){
        $pessoas=DB::table('pessoa')->where('tipo_pessoa','=','fornecedor')->get();
        $artigos=DB::table('artigo as art')->select(DB::raw('CONCAT(art.codigo, "",art.nome) as artigo'),'art.artigo_id')
            ->where('art.estado','=','Ativo')->get();
        return view('loja.compras.renda.create',["pessoas"=>$pessoas,"artigos"=>$artigos]);
    }
    public  function store(RendaFormRequest $request){
        try{
            DB::beginTransaction();
            $renda = new Renda;
            $renda->pessoa_id=$request->get('pessoa_id');
            $renda->tipo_comprovante=$request->get('tipo_comprovante');
            $renda->serie_comprovante=$request->get('serie_comprovante');
            $renda->num_comprovante=$request->get('num_comprovante');
            $mytime = Carbon::now('America\Brasil');
            $renda->date_hora=$mytime->toDateTimeString();
            $renda->imposto='18';
            $renda->estado='A' ;
            $renda->save();
            $artigo_id = $request->get('artigo_id');
            $quantidade = $request->get('quantidade');
            $preco_compra = $request->get('preco_compra');
            $preco_venda = $request->get('preco_venda');

            $cont = 0;
                while($cont < count($artigo_id)){
                    $detalhe = new DetalheRenda();
                    $detalhe->artigo_id= $renda->renda_id;
                    $detalhe->artigo_id= $artigo_id[$cont];
                    $detalhe->quantidade= $quantidade[$cont];
                    $detalhe->preco_compra= $preco_compra[$cont];
                    $detalhe->preco_venda= $$preco_venda[$cont];
                    $detalhe->save();
                    $cont = $cont + 1;
                }
            DB::commit();
        }catch (\Exception $e){

            DB::rollback();
        }
        return redirect()->route('renda');
    }
    public function show($id){
        $renda = DB::table('renda as i')->join('pessoa as p','i.pessoa_id','=','p.pessoa_id')
            ->join('tabela_renda as ti','i.renda_id','=','ti.renda_id')
            ->select('i.renda_id','i.data_hora','p.nome','i.tipo_comprovante','i.serie_comprovante'
                ,'i.num_comprovante','i.imposto','i.estado',DB::raw('sum(ti.quantidade * preco_compra) as total'))
            ->where('i.renda_id','=',$id)->first();
        $detalhes = DB::table('tabela_renda as d')->join('artigo as a','d.artigo_id','=','a.artigo_id')
            ->join('tabela_renda as ti','i.renda_id','=','ti.renda_id')
            ->select('a.nome as artigo','d.quantidade','d.preco_compra','d.preco_venda')
            ->where('d.renda_id','=',$id)->get();
        return view("compras.renda.show",["renda"=>$renda,"detalhes"=>$detalhes]);
    }
    public function destroy($id){
        $renda=Renda::findOrFail($id);
        $renda->Estado='C';
        $renda->update();
        return Redirect::to('compras/renda');
    }
}
