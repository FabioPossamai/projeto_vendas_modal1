@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nova Artigo</h3>
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
    {!! Form::open(['route' => 'artigo.store']) !!}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" required value="{{old('nome')}}" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-group">
                @foreach($categorias as $cat)
                    <option value="{{$cat->categoria_id}}">{{$cat->nome}}</option>
                    @endforeach
                </select>
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
@endsection