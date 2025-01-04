@extends('layouts.app')
@section('content')
    <h2>Привет {{Auth::user()->name}}</h2>
    <br>
    <a href="{{route('admin.index')}}">Перейти в админку</a>
@endsection