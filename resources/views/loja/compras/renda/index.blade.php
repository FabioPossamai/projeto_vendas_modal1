<html>
@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listagem de Vendas<a href="renda/create"><button class="btn btn-success">Novo</button></a> </h3>
            @include('loja.compras.renda.buscar')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Data</th>
                    <th>Fornecedor</th>
                    <th>Comprovante</th>
                    <th>Imposto</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Opções</th>
                    </thead>
                    @foreach($renda as $ren)
                        <tr>
                            <td>{{$ren->data_hora}}</td>
                            <td>{{$ren->nome}}</td>
                            <td>{{$ren->tipo_comprovante.': '.$ren->serie_comprovante.' - '.$ren->num_comprovante}}</td>
                            <td>{{$ren->imposto}}</td>
                            <td>{{$ren->total}}</td>
                            <td>{{$ren->estado}}</td>
                            <td>
                                <div align="right">
                                    <a href="renda/{{$ren->renda_id}}/edit" class="btn btn-info btn-sm">Editar</a>
                                    <button type="button" class="modal-del btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#id{{$ren->renda_id}}">Excluir
                                    </button>
                                    <div class="modal fade" id="id{{$ren->renda_id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <br>
                                                    <h5 class="modal-title" id="exampleModalLabel">Deletar Renda: {{$ren->nome}}</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                                    {!!Form::open(['method' => 'DELETE', 'url' => '/renda/'.$ren->renda_id, 'style' =>  'display: inline;']) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Confirmar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!!Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{$renda->render()}}
        </div>
    </div>
@endsection
</html>