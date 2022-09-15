<form  method="post" action="{{route('data.store')}}">
    @csrf 
      <div class="form-group">
          <label for="name">Введите имя заказчика</label>
          <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="name">Введите номер телефона</label>
        <input type="tel" class="form-control" name="name" id="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
      <label for="name">Введите email</label>
      <input type="email" class="form-control" name="name" id="name" value="{{old('name')}}">
   </div>
     
      <div class="form-group">
        <br>
        <label for="comit">Введите сообщение</label>
        <textarea type="p" class="form-control" name="comit" id="comit" >{{old('comit')}}</textarea>
      </div>
      <br>
      <button type="submit" class="btn btn-success">Сохранить</button>
  </form>