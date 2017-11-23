<!--Modal do cadastra de Categoria-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">Inserindo Categoria
                <button type="button" class="close" data-dismiss="modal"aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'categoria.store']) !!}
                {{Form::token()}}
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="nome">Descrição</label>
                    <input type="text" name="descricao" class="form-control" placeholder="Descricao">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn btn-danger" type="reset">Limpar</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
<!--Modal para deletar categoria-->
<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cat->categoria_id}}">
<div class="modal-dialog" role="document">
    {!!Form::open(['method' => 'GET', 'url' => '/categoria/'.$cat->categoria_id.'/destroy','style' =>  'display: inline;'])!!}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title">Eleminar Categoria: {{$cat->nome}}</h4>
        </div>
        <div class="modal-body">
            <p>Deseja mesmo excluir essa categoria ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            {!!Form::open(['method' => 'GET', 'url' => '/categoria/'.$cat->categoria_id.'/destroy', 'style' =>  'display: inline;']) !!}
            <button type="submit" class="btn btn-danger">
                Confirmar
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>
</div>
<!--Modal para editar categoria-->
<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$cat->categoria_id}}">
    <div class="modal-dialog" role="document">
        {!!Form::open(['method' => 'put', 'url' => "/categoria/".$cat->categoria_id.'/update','style' =>  'display: inline;']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Editar Categoria: {{$cat->nome}}</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{$cat->nome}}" placeholder="Nome">
                    <label for="nome">Descrição</label>
                    <input type="text" name="descricao" class="form-control" value="{{$cat->descricao}}" placeholder="Descricao">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!!Form::open(['method' => 'put', 'url' => "/categoria/".$cat->categoria_id.'/update','style' =>  'display: inline;']) !!}
                <button type="submit" class="btn btn-danger">
                    Confirmar
                </button>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>














