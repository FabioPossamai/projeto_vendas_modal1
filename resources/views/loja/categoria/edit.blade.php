@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-offset-0 col-sm-3 col-xs-12">
            <h3>Editar Categoria: {{$categoria->nome}}</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!!Form::open(['route' => ["categoria.update",$categoria->categoria_id],'method'=>'put']) !!}
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{$categoria->nome}}" placeholder="Nome">
                <label for="nome">Descrição</label>
                <input type="text" name="descricao" class="form-control" value="{{$categoria->descricao}}" placeholder="Descricao">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@endsection