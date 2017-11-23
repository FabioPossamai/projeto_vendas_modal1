@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <p>{{$renda->nome}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Tipo de Comprovante</label>
                <p>{{$renda->tipo_comprovante}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="serie_comprovante">Série do Comprovante</label>
                <p>{{$renda->serie_comprovante}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_comprovante">Numero do Comprovante</label>
                <p>{{$renda->num_comprovante}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-primary">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                        <th>Artigo</th>
                        <th>Quantidade</th>
                        <th>Preço de Compra</th>
                        <th>Preço de Venda</th>
                        <th>Sub-total</th>
                        </thead>
                        <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total">{{$renda->total}}</h4></th>
                        </tfoot>
                        <tbody>
                        <tr>
                            @foreach($detalhes as $det)
                            <tr>
                                <td>{{$det->artigo}}</td>
                                <td>{{$det->quantidade}}</td>
                                <td>{{$det->preco_compra}}</td>
                                <td>{{$det->preco_venda}}</td>
                                <td>{{$det->quantidade * $det->preco_compra}}</td>
                            </tr>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection