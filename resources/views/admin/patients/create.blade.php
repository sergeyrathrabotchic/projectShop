@extends('layosts.admin')
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить нового пациента</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

      <div class="table-responsive">
        @include('inc.message')
        <form  method="post" action="{{route('admin.patients.store')}}">
            @csrf 
              <div class="form-group">
                <label for="first_name">Имя поциента</label>
                <input  type="test" class="form-control"  name="first_name" id="first_name" required>
              </div>
              <div class="form-group">
                <label for="last_name">Фамилия поциента</label>
                <input type="test" class="form-control" name="last_name" id="last_name" required>
              </div>
              <div class="birthdate">
                <label for="image">Дата рождения</label>
                <input type="date" class="form-control" name="birthdate" id="birthdate" required>
              </div>
              <br>
              <button type="submit" class="btn btn-success">Сохранить</button>  
          </form>
      </div>
@endsection