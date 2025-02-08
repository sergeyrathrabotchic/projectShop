@extends('layosts.admin')
@section('title') Список пациентов - @parent @stop
@section('content')
<div class="btn-group me-2">
    <a href="{{route('admin.patients.create')}}" class="btn btn-sm btn-outline-secondary">Добавить нового поциента</a>
</div>