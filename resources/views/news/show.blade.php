@extends('layosts.main')
@section('title') Новость с #ID <?= $id?> - @parent @stop
@section('content')
   <h1>Новость с #ID <?= $id?></h1> 
@endsection

@push('js')
   <script>
      console.log('Work');
   </script>
@endpush
