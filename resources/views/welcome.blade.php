@extends('layouts.app') 
@section('content')
    <cidade-estado  v-bind:estados="{{$estados}}"></cidade-estado>
@endsection
