@extends('layosts.admin')
@section('content')
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
  </form>
@endsection