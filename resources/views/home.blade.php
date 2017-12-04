@extends('layouts.app') 
@section('content')
<pagina tamanho="10">
    <painel titulo="Titulo do painel">
        <migalhas v-bind:lista="{{$migalhas}}"></migalhas>
        <div class="row">
            <div class="col-md-4">
                <caixa quantidade="10" titulo="Artigos" url="{{route('artigos.index')}}" cor="#3b5998" icone="fa fa-paste"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="15" titulo="Youtubers" url="https://youtube.com" cor="#e52d27" icone="fa fa-youtube"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="12" titulo="Googlers" url="https://google.com" cor="#34A853" icone="fa fa-google"></caixa>
            </div>
        </div>
    </painel>
</pagina>
@endsection
