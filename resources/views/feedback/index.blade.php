<form  method="post" action="{{route('feedback.store',['status' => 'work'])}}">
    @csrf 
      <div class="form-group">
          <label for="name">Введите имя</label>
          <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <br>
        <label for="comit">Комментарий</label>
        <textarea type="text" class="form-control" name="comit" id="comit" >{{old('comit')}}</textarea>
      </div>
      <br>
      <button type="submit" class="btn btn-success">Сохранить</button>
  </form>