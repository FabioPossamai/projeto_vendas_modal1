@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <h3>Listagem de Categoria
                <button type="button" class="modal-del btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Novo
                </button>
            </h3>
            @include('loja.categoria.buscar')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover categoria-table"  data-toggle="dataTable" data-form="deleteForm">
                    <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Opções</th>
                    </thead>
                    @foreach($categoria as $cat)
                        <tr>
                            <td>{{$cat->categoria_id}}</td>
                            <td>{{$cat->nome}}</td>
                            <td>{{$cat->descricao}}</td>
                            <td>
                                <div align="right">
                                    <button type="button" class="btn btn-primary btn-sm" data-target="#modal-edit-{{$cat->categoria_id}}" data-toggle="modal">Editar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-target="#modal-delete-{{$cat->categoria_id}}" data-toggle="modal">Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('loja.categoria.modal')
                    @endforeach
                </table>
                {!!$categoria->links() !!}
            </div>
        </div>
    </div>
@endsection
