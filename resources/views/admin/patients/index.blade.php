@extends('layosts.admin')
@section('title') Список пациентов - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список пациентов </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{route('admin.patients.create')}}" class="btn btn-sm btn-outline-secondary">Добавить нового поциента</a>
      </div>
      {{-- <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
      </div>
      <div class="btn-group me-2">
        <a href="{{route('news444444.create')}}" class="btn btn-sm btn-outline-secondary">Проверка</a>
      </div> --}}
    </div>
  </div>

      <h2>Пациенты</h2>
      <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">№</th>
              <th scope="col">Имя пациента и фамилия пациента</th>
              <th scope="col">Дата рождения</th>
              <th scope="col">Возраст</th>
            </tr>
          </thead>
          <tbody>
             @forelse ($patients as $patient)
                 <tr>
                    <td>{{$patient->id}}</td>
                    <td>{{$patient->first_name . " " . $patient->last_name}}</td>
                    <td>
                      {{$patient->birthdate->format('d/m/Y')}}
                    </td>
                    {{-- <td>
                        {{ $patient->updated_at->format('d-m-Y')}}
                    </td> --}}
                    <td>
                        {{ $patient->age}} {{$category->age_type}}
                    </td>
                    {{-- <td>
                      <a href="{{route('admin.categories.edit', ['category' => $category->id ])}}">Ред.</a>&nbsp;|&nbsp;<a href="javascript:;" style="color: red">Уд.</a>
                    </td> --}}
                 </tr>
             @empty
                 <tr>
                    <td colspan="4">Таких записей нет</td>
                 </tr>
             @endforelse
            
          </tbody>
        </table>
      </div>
      <div>
        {{ $patients->links()}}
      </div>
@endsection