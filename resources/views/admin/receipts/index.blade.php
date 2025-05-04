@extends('layosts.admin')
@section('title') Переплата - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   {{-- {{dd($account[0]->personal)}}  --}}
  <h1 class="h2">Переплата  </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{route('admin.overpayments.index')}}" class="btn btn-sm btn-outline-secondary">Все</a>
        <a href="{{route('admin.overpayments.index', ['param' => 1 ])}}" class="btn btn-sm btn-outline-secondary">Должники</a>
        <a href="{{route('admin.overpayments.index', ['param' => 2 ])}}" class="btn btn-sm btn-outline-secondary">Переплата</a>
      </div>
      {{-- <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
      </div>
      <div class="btn-group me-2">
        <a href="{{route('news444444.create')}}" class="btn btn-sm btn-outline-secondary">Проверка</a>
      </div> --}}
    </div>
  </div>

      <h2>Список начислений</h2>
      <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Абонент</th>
              <th scope="col">Потребление</th>
              <th scope="col">Начисления</th>
              <th scope="col">Оплата</th>
              {{-- <th scope="col">Долг</th> --}}
              <!--<th scope="col">Автор</th>-->
              <th scope="col">Дота последнего обновления</th>
              {{-- <th scope="col">Действие</th> --}}
            </tr>
          </thead>
          <tbody>


              @php
                $k = 0;
              @endphp
              @php
                $i = $page;
              @endphp
            @forelse ($accounts as $account)
                  @php
                      // $i = $i +1;
                      // if($param == 0) {
                      //   $condition =true;
                      // } else if ($param == 1)
                      //   $condition = $arrDifference[$k] > 0;
                      // else if ($param == 2){
                      //   $condition = $arrDifference[$k] < 0;
                      // }
                      $condition = $arrMeterSumCharge[$k][$account->id];
                  @endphp
                  @if ($condition)
                 <tr>
                  <td>{{$i}}</td>
                  {{-- {{dd($account->personal->where('id_account','=',$account->id))}} --}}
                  <td>
                    <h6>{{$account->personal->where('id_account','=',$account->id)[0]->sub_addr}} {{$account->personal->where('id_account','=',$account->id)[0]->FIO}}</h6>
                  </td>
                  <td>
                    <h6>{{$arrMeterSumCharge[$k][$account->id]}}</h6>
                  </td>
                  <td>
                    <h6>{{$arrMeterSum[$k][$account->id]}}</h6>
                  </td>
                  <td>
                      {{-- @if ($pump->condition == 1)
                        Да
                      @else
                        Нет
                      @endif --}}
                      {{-- <h6>{{$account[0]->charges->charge[$i-1]}}</h6> --}}
                      {{-- <h6>{{$account->payment->where('id_account','=',$account->id)[0]->amount }}</h6> --}}
                      <h6>{{$arrAmountSum[$k][$account->id]}}</h6> 
                    </td>
                  {{-- <td>
                    <h6>{{$arrDifference[$k]}}</h6>
                  </td> --}}
                  <td>
                    @if ($account->payment->where('id_account','=',$account->id)->last()->updated_at)
                     {{$account->payment->where('id_account','=',$account->id)->last()->updated_at->format('d-m-Y H:i')}}
                    @else - @endif
                   </td> 
  
                 </tr>
                 @endif
                 @php
                  $k = $k +1;
                @endphp
                
             @empty
                 <tr>
                    <td colspan="4">Таких записей нет</td>
                 </tr>
             @endforelse
            
          </tbody>
        </table>
      </div>
      <div>
        {{ $accounts->links()}}
      </div>
@endsection