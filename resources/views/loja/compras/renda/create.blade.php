@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nova Venda</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    {!! Form::open(['route' => 'renda.store']) !!}
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <select name="pessoa_id" id="pessoa_id" class="form-control" data-live-search="true">
                    @foreach($pessoas as $pessoa)
                        <option value="{{$pessoa->pessoa_id}}">{{$pessoa->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Tipo de Comprovante</label>
                <select name="tipo_comprovante" class="form-group form-control">
                    <option value="">Selecione</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Fatura">Fatura</option>
                    <option value="Bilhete">Bilhete</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="serie_comprovante">Série do Comprovante</label>
                <input type="text" name="serie_comprovante" value="{{old('serie_comprovante')}}" class="form-control" placeholder="Série do comprovante">
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_comprovante">Numero do Comprovante</label>
                <input type="text" name="num_comprovante" required value="{{old('num_comprovante')}}" class="form-control" placeholder="Numero do comprovante">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label>Artigo</label>
                        <select name="partigo_id" id="partigo_id" class="form-control" data-live-search="true">
                            @foreach($artigos as $artigo)
                                <option value="{{$artigo->artigo_id}}">{{$artigo->artigo_id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" name="pquantidade" id="pquantidade" class="form-group" placeholder="Quantidade">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="preco_compra">Preço de Compra</label>
                        <input type="number" name="ppreco_compra" id="ppreco_compra" class="form-group" placeholder="Preço de Compra">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="preco_venda">Preço de Venda</label>
                        <input type="number" name="ppreco_venda" id="ppreco_venda" class="form-group" placeholder="Preço de Venda">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                        <th>Opções</th>
                        <th>Artigo</th>
                        <th>Quantidade</th>
                        <th>Preço de Compra</th>
                        <th>Preço de Venda</th>
                        <th>Sub-total</th>
                        </thead>
                        <tfoot>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th> <input type="text" name="total" id="total" class="form-group" readonly></th>
                        </tfoot>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
        <input name="_token" value="{{csrf_token()}}" type="hidden">
        <button class="btn btn-primary" type="submit">Enviar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
    </div>
    </div>
    </div>
    </div>
    {!!Form::close()!!}
    @push('scripts')
        <script>
            $('#bt_add').on("click", function(e) {
                agregar();
            });
            var cont = 0;
            total = 0;
            subtotal=[];
            $("#guardar").hide();

            function  limpar() {
                $("pquantidade").val("");
                $("ppreco_compra").val("");
                $("ppreco_venda").val("");
            }
            function validar() {
                if(total > 0){
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }
            function eliminar(index) {
                total = total-subtotal[index];
                $("#total").html5("S/. " + total);
                $("#fila + index");remove();
                validar();
            }
            function agregar() {
                artigo_id=$("#partigo_id").val();
                artigo=$("#partigo_id option:selected").text();
                quantidade=$("#pquantidade").val();
                preco_compra=$("#ppreco_compra").val();
                preco_venda=$("#ppreco_venda").val();

                if( (artigo_id!="") && (quantidade !="") && (quantidade > 0) && (preco_compra!="") && (preco_venda!="") ){
                    subtotal[cont]=(quantidade * preco_compra);
                    total = total+subtotal[cont];
                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td>' +
                        '<td><input type="hidden" name="artigo_id[]" value="'+artigo_id+'">'+artigo+'</td>' +
                        '<td><input type="number" name="quantidade[]" value="'+quantidade+'"></td>' +
                        '<td><input type="number" name="preco_compra[]" value="'+preco_compra+'"></td>' +
                        '<td><input type="number" name="preco_venda[]" value="'+preco_venda+'"></td>' +
                        '<td>'+subtotal[cont]+'</td></tr>';
                    cont++;
                    limpar();
                    $("#total").val("S/. " + total);
                    validar();
                    $('#detalhes').append(fila);
                }
                else {
                    alert('Erro ao guardar os dados por favor confira os campos ')
                }
            }
        </script>

    @endpush
@endsection