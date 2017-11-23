@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h2>Listagem de Artigo
            <button type="button" class="modal-del btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Novo
            </button>
            </h2>
            @include('loja.artigo.buscar')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-10 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover categoria-table"  data-toggle="dataTable" data-form="deleteForm">
                    <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Estoque</th>
                    <th>Imagem</th>
                    <th>Estado</th>
                    <th>Opções</th>
                    </thead>
                    @foreach($artigo as $art)
                        <tr>
                            <td>{{$art->artigo_id}}</td>
                            <td>{{$art->nome}}</td>
                            <td>{{$art->codigo}}</td>
                            <td>{{$art->categoria}}</td>
                            <td>{{$art->estoque}}</td>
                            <td>
                                <img src="{{asset('imagem/artigo/'.$art->imagem)}}" alt="{{$art->nome}}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            <td>{{$art->estado}}</td>
                            <td>
                                <div align="right">
                                    <button type="button" class="btn btn-primary btn-sm" data-target="#modal-edit-{{$art->artigo_id}}" data-toggle="modal">Editar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-target="#modal-delete-{{$art->artigo_id}}" data-toggle="modal">Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('loja.artigo.modal')
                    @endforeach
                </table>
            </div>
            {{$artigo->render()}}

        </div>
    </div>
@endsection