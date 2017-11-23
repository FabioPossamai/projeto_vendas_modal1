@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Novo Fornecedor</h3>
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
@endsection