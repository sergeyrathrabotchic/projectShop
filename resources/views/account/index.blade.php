@extends('layouts.app')
@section('content')
    <div class="offset-2">
        <h2>Привет {{Auth::user()->name}}</h2>
        <br>
        <a href="{{route('admin.index')}}">Перейти в админку</a>
    </div>

@endsection