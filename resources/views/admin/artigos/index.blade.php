@extends('layouts.app') 
@section('content')
<pagina tamanho="12">
  @if($errors->all())
<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>
        <ul>
        @foreach($errors->all() as $key => $value)
        <li>{{$value}}</li>
        @endforeach
        </ul>
 </strong> 
</div>
    @endif

    
    <painel titulo="Lista de Artigos">
        <migalhas v-bind:lista="{{$migalhas}}"></migalhas>
       <tabela-lista 
        v-bind:titulos="['#', 'Titulo', 'Descrição', 'Data']"
        v-bind:itens="{{$artigos}}"
        ordem="desc" coluna="1"
        criar="adicionar" editar="#editar" deletar="#deletar" token="87878545" detalhe="/admin/artigos/" modal="sim"
        ></tabela-lista>
    </painel>
</pagina>
<modal nome="adicionar" titulo="Adicionar Artigo">
    <formulario action="{{ route('artigos.store') }}" css="" method="post" token="{{ csrf_token() }}">
        <div class="form-group">
          <label for="titulo">Titulo</label>
          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Entre com o título" value="{{ old('titulo') }}">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label> 
          <input type="text" class="form-control" name="descricao" id="descricao" value="{{ old('descricao') }}" placeholder="Entre com a descrição">
        </div>
        <div class="form-group">
          <label for="">Data</label>
          <input type="date" name="data" id="data" value="{{ old('data') }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Conteudo</label>
          <textarea class="form-control" name="conteudo"  id="conteudo" rows="5">{{ old('conteudo') }}</textarea>
        </div>
        <button class="btn btn-info">Adicionar</button>
    </formulario>
</modal>
<modal nome="editar" titulo="Editar Artigo">
    <formulario action="#" css="" method="put" token="">
        <div class="form-group">
          <label for="titulo">Titulo</label>
          <input type="text" class="form-control" v-model="$store.state.item.titulo" name="titulo" id="titulo" placeholder="Entre com o título">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" v-model="$store.state.item.descricao" name="descricao" id="descricao" placeholder="Entre com a descrição">
        </div>
        <button class="btn btn-info">Atualizar</button>
    </formulario>
</modal>

<modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
    <p>@{{$store.state.item.descricao}}</p>
    <p>@{{$store.state.item.conteudo}}</p>
</modal>
@endsection
