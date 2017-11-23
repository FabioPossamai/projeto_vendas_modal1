@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Artigo {{$artigo->nome}}</h3>
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
    {!!Form::open(['route' => ["artigo.update",$artigo->artigo_id],'method'=>'put']) !!}
    <div class="row">
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" required value="{{$artigo->nome}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-group">
                    @foreach($categorias as $cat)
                        @if($cat->categoria_id == $artigo->categoria_id)
                        <option value="{{$cat->categoria_id}}" selected>{{$cat->nome}}</option>
                        @else
                            <option value="{{$cat->categoria_id}}">{{$cat->nome}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" required value="{{$artigo->codigo}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Estoque</label>
                <input type="text" name="estoque" required value="{{$artigo->estoque}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descricao">Descricao</label>
                <input type="text" name="descricao" value="{{$artigo->descricao}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Imagem</label>
                <input type="file" name="imagem" class="form-control">
                @if(($artigo->imagem)!='')
                    <img src="{{asset('imagem/artigo/'.'$artigo->imagem')}}"height="300px" width="300px">
                @endif
            </div>
        </div>
        <div class="col-lg-5 col-sm-6 col-md-5 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>
            {!!Form::close()!!}

@endsection