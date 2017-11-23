<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\VendaFormRequest;
use App\Venda;
use App\DetalheVenda;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VendaController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('textodebusca'));
            $venda=DB::table('venda as v')->join('pessoa as p','v.pessoa_id','=','p.pessoa_id')
                ->join('tabela_venda as dv','v.venda_id','=','dv.venda_id')
                ->select('v.venda_id','v.data_hora','p.nome','v.tipo_comprovante','v.serie_comprovante'
                    ,'v.num_comprovante','v.imposto','v.estado','v.total_venda',DB::raw('sum(quantidade * preco_venda) as total'))
                ->where('v.num_comprovante','LIKE','%'.$query.'%')->orderby('v.venda_id','desc')
                ->groupBy('v.venda_id','v.data_hora','p.nome','v.tipo_comprovante','v.serie_comprovante'
                    ,'v.num_comprovante','v.imposto','v.estado')->paginate(7);
            return view('loja.vendas.venda.index',["vendas"=>$venda,"textodebusca"=>$query]);
        }

    }
    public function create(){
        $pessoas=DB::table('pessoa')->where('tipo_pessoa','=','cliente')->get();
        $artigos=DB::table('artigo as art')->select(DB::raw('CONCAT(art.codigo, "",art.nome) as artigo'),'art.estoque',
            DB::raw('avg(preco_compra) as preco_venda'))
            ->join('tabela_renda as di','art.artigo_id','=','di.artigo_id')
            ->where('art.estado','=','Ativo')->where('art.estoque','>','0')
            ->groupBy('artigo','art.artigo_id','art.estoque')
            ->get();
        return view('loja.vendas.venda.create',["pessoas"=>$pessoas,"artigos"=>$artigos]);
    }
    public  function store(VendaFormRequest $request){
        try{
            DB::beginTransaction();
            $venda = new Venda;
            $venda->pessoa_id=$request->get('pessoa_id');
            $venda->tipo_comprovante=$request->get('tipo_comprovante');
            $venda->serie_comprovante=$request->get('serie_comprovante');
            $venda->num_comprovante=$request->get('num_comprovante');
            $venda->total_venda=$request->get('total_venda');
            $mytime = Carbon::now('America\Brasil');
            $venda->date_hora=$mytime->toDateTimeString();
            $venda->imposto='18';
            $venda->estado='A' ;
            $venda->save();
            $artigo_id = $request->get('artigo_id');
            $quantidade = $request->get('quantidade');
            $desconto = $request->get('desconto');
            $preco_venda = $request->get('preco_venda');

            $cont = 0;
            while($cont < count($artigo_id)){
                $detalhe = new DetalheVenda();
                $detalhe->venda_id= $venda->venda_id;
                $detalhe->artigo_id= $artigo_id[$cont];
                $detalhe->quantidade= $quantidade[$cont];
                $detalhe->desconto= $desconto[$cont];
                $detalhe->preco_venda= $$preco_venda[$cont];
                $detalhe->save();
                $cont = $cont + 1;
            }
            DB::commit();
        }catch (\Exception $e){

            DB::rollback();
        }
        return Redirect::to('loja/compras/venda');
    }
    public function show($id){
        $venda = DB::table('venda as v')->join('pessoa as p','v.pessoa_id','=','p.pessoa_id')
            ->join('tabela_venda as dv','v.venda_id','=','dv.venda_id')
            ->select('v.renda_id','v.data_hora','p.nome','v.tipo_comprovante','v.serie_comprovante'
                ,'v.num_comprovante','v.imposto','v.estado','v.total_venda')
            ->where('v.venda_id','=',$id)->first();
        $detalhes = DB::table('tabela_venda as d')->join('artigo as a','d.artigo_id','=','a.artigo_id')
            ->join('tabela_renda as ti','i.renda_id','=','ti.renda_id')
            ->select('a.nome as artigo','d.quantidade','d.desconto','d.preco_venda')
            ->where('d.venda_id','=',$id)->get();
        return view("compras.venda.show",["venda"=>$venda,"detalhes"=>$detalhes]);
    }
    public function destroy($id){
        $venda=Vend::findOrFail($id);
        $venda->Estado='C';
        $venda->update();
        return Redirect::to('compras/venda');
    }
}
