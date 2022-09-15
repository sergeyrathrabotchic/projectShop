@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>      
    @endforeach   
@endif

@if (session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success')}}</div>
@endif
