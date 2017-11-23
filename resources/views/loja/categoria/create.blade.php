@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nova Categoria</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                </ul>
            </div>
                @endif
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
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
@endsection