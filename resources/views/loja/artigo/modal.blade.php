<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">Inserindo Artigo
                <button type="button" class="close" data-dismiss="modal"aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'artigo.store']) !!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" required value="{{old('nome')}}" class="form-control" placeholder="Nome">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Categoria</label>
                            {{--<select name="categoria_id" class="form-group">--}}
                            {{--@foreach($categorias as $cat)--}}
                            {{--<option value="{{$cat->categoria_id}}">{{$cat->nome}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {!!Form::select('categoria_id',App\Categoria::pluck('nome', 'categoria_id')->toArray(),null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="codigo do artigo">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Estoque</label>
                            <input type="text" name="estoque" required value="{{old('estoque')}}" class="form-control" placeholder="estoque do artigo">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Descricao</label>
                            <input type="text" name="descricao" value="{{old('descricao')}}" class="form-control" placeholder="descricao do artigo">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Imagem</label>
                            <input type="file" name="imagem" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

    <!--Modal para deletar artigo-->
    <div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$art->artigo_id}}">
        <div class="modal-dialog" role="document">
            {!!Form::open(['method' => 'GET', 'url' => '/artigo/'.$art->artigo_id.'/destroy','style' =>  'display: inline;'])!!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Eleminar Artigo: {{$art->nome}}</h4>
                </div>
                <div class="modal-body">
                    <p>Deseja mesmo excluir esse Artigo?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {!!Form::open(['method' => 'GET', 'url' => '/artigo/'.$art->artigo_id.'/destroy', 'style' =>  'display: inline;']) !!}
                    <button type="submit" class="btn btn-danger">
                        Confirmar
                    </button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
    <!--Modal para editar artigo-->
    <div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$art->artigo_id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!!Form::open(['method' => 'put', 'url' => "/artigo/".$art->artigo_id.'/update','style' =>  'display: inline;']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                        </button>
                        <h4 class="modal-title">Editar Artigo: {{$art->nome}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" value="{{$art->nome}}" placeholder="Nome">
                            <label>Categoria</label>
                            {!!Form::select('categoria_id',App\Categoria::pluck('nome', 'categoria_id')->toArray(),$art->categoria,['class'=>'form-control']) !!}

                            <label for="codigo">Codigo</label>
                            <input type="text" name="codigo" required value="{{$art->codigo}}" class="form-control">
                            <label for="codigo">Estoque</label>
                            <input type="text" name="estoque" required value="{{$art->estoque}}" class="form-control">
                            <label for="codigo">Imagem</label>
                            <input type="file" name="imagem" class="form-control">
                            @if(($art->imagem)!='')
                                <img src="{{asset('imagem/artigo/'.'$artigo->imagem')}}"height="300px" width="300px">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        {!!Form::open(['method' => 'put', 'url' => "/artigo/".$art->artigo_id.'/update','style' =>  'display: inline;']) !!}
                        <button type="submit" class="btn btn-danger">
                            Confirmar
                        </button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>