<html>
@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listagem de Clientes
                <button type="button" class="modal-del btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Novo
                </button>
            </h3>
            @include('loja.vendas.cliente.buscar');
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Tipo Doc.</th>
                    <th>Numero Doc.</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Opções</th>
                    </thead>
                    @foreach($pessoas as $pes)
                        <tr>
                            <td>{{$pes->pessoa_id}}</td>
                            <td>{{$pes->nome}}</td>
                            <td>{{$pes->tipo_documento}}</td>
                            <td>{{$pes->num_documento}}</td>
                            <td>{{$pes->telefone}}</td>
                            <td>{{$pes->email}}</td>
                            <td>
                                <div align="right">
                                    <button type="button" class="btn btn-primary btn-sm" data-target="#modal-edit-{{$pes->pessoa_id}}" data-toggle="modal">Editar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-target="#modal-delete-{{$pes->pessoa_id}}" data-toggle="modal">Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('loja.vendas.cliente.modal')
                    @endforeach
                </table>
            </div>
            {{$pessoas->render()}}
        </div>
    </div>
@endsection
</html>