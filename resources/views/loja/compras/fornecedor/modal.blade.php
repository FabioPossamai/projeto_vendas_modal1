<!--Modal do cadastro de Fornecedor-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">Inserindo Categoria
                <button type="button" class="close" data-dismiss="modal"aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'fornecedor.store']) !!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-5 col-xs-12">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" required value="{{old('nome')}}" class="form-control" placeholder="Nome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-sm-6 col-md-5 col-xs-12">
                            <div class="form-group">
                                <label for="direcao">Direção</label>
                                <input type="text" name="direcao" value="{{old('direcao')}}" class="form-control" placeholder="Direcao">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-5 col-md-5 col-xs-12">
                            <div class="form-group">
                                <label>Documento</label>
                                <select name="tipo_documento" class="form-group">
                                    <option value="">Selecione</option>
                                    <option value="RG">RG</option>
                                    <option value="CPF">CPF</option>
                                    <option value="CNPJ">CPNJ</option>
                                    <option value="PAS">PASSAPORTE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-5 col-xs-12">
                            <div class="form-group">
                                <label for="num_documento">Numero Documento</label>
                                <input type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="numero do documento">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-5 col-xs-12">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" value="{{old('telefone')}}" class="form-control" placeholder="Telefone (xx)xxxxxxxxx">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-5 col-xs-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="E-mail xxxx@xxxx.com.br">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-5 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
        </div>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
<!--Modal para deletar fornecedor-->
<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$pes->pessoa_id}}">
    <div class="modal-dialog" role="document">
        {!!Form::open(['method' => 'GET', 'url' => '/fornecedor/'.$pes->pessoa_id.'/destroy','style' =>  'display: inline;'])!!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eleminar Fornecedor: {{$pes->nome}}</h4>
            </div>
            <div class="modal-body">
                <p>Deseja mesmo excluir esse Fornecedor?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!!Form::open(['method' => 'GET', 'url' => '/fornecedor/'.$pes->pessoa_id.'/destroy', 'style' =>  'display: inline;']) !!}
                <button type="submit" class="btn btn-danger">
                    Confirmar
                </button>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
<!--Modal para editar fornecedor-->
<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$pes->pessoa_id}}">
    <div class="modal-dialog" role="document">
        {!!Form::open(['method' => 'put', 'url' => "/fornecedor/".$pes->pessoa_id.'/update','style' =>  'display: inline;']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Editar Fornecedor: {{$pes->nome}}</h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" required value="{{$pes->nome}}" class="form-control" placeholder="Nome">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="direcao">Direção</label>
                            <input type="text" name="direcao" value="{{$pes->direcao}}" class="form-control" placeholder="Direcao">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Documento</label>
                            <select name="tipo_documento" class="form-group">
                                @if($pes->tipo_documento='RG')
                                    <option value="">Selecione</option>
                                    <option value="RG" selected>RG</option>
                                    <option value="CPF">CPF</option>
                                    <option value="CNPJ">CPNJ</option>
                                    <option value="PAS">PASSAPORTE</option>
                                @elseif($pes->tipo_documento='CPF')
                                    <option value="">Selecione</option>
                                    <option value="RG">RG</option>
                                    <option value="CPF" selected>CPF</option>
                                    <option value="CNPJ">CPNJ</option>
                                    <option value="PAS">PASSAPORTE</option>
                                @else
                                    <option value="">Selecione</option>
                                    <option value="RG">RG</option>
                                    <option value="CPF" selected>CPF</option>
                                    <option value="CNPJ">CPNJ</option>
                                    <option value="PAS" selected>PASSAPORTE</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="num_documento">Numero Documento</label>
                            <input type="text" name="num_documento" value="{{$pes->num_documento}}" class="form-control" placeholder="numero do documento">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" value="{{$pes->telefone}}" class="form-control" placeholder="Telefone (xx)xxxxxxxxx">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" value="{{$pes->email}}" class="form-control" placeholder="E-mail xxxx@xxxx.com.br">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!!Form::open(['method' => 'put', 'url' => "/fornecedor/".$pes->pessoa_id.'/update','style' =>  'display: inline;']) !!}
                <button type="submit" class="btn btn-danger">
                    Confirmar
                </button>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
