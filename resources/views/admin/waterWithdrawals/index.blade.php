@extends('layosts.admin')
@section('title') Водозабор - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Водозабор</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      {{-- <div class="btn-group me-2">
        <a href="{{route('admin.addresses.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новый адресс</a>
      </div> --}}
      {{-- <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
      </div>
      <div class="btn-group me-2">
        <a href="{{route('news444444.create')}}" class="btn btn-sm btn-outline-secondary">Проверка</a>
      </div> --}}
    </div>
  </div>

      <h2>Список адресов</h2>
      <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"></th>
              <th scope="col"></th>
              {{-- <th scope="col">Описание</th>
              <th scope="col">кв метров</th> --}}
              <!--<th scope="col">Автор</th>-->
              {{-- <th scope="col">Дота последнего обновления</th>
              <th scope="col">Действие</th> --}}
            </tr>
          </thead>
          <tbody>
             {{-- @forelse ($categories as $category)
                 <tr>
                   <td>{{$category->id}}</td>
                   <td>{{$category->title}} ({{$category->news()->get()->first()->title ?? null}})</td>
                   <td>
                     @if ($category->updated_at)
                      {{$category->updated_at->format('d-m-Y H:i')}}
                     @else - @endif
                    </td>
                    <td>
                      <a href="{{route('admin.slide.edit', ['slide' => $category->id ])}}">Ред.</a>&nbsp;|&nbsp;<a href="javascript:;" style="color: red">Уд.</a>
                    </td>
                 </tr>
             @empty
                 <tr>
                    <td colspan="4">Таких записей нет</td>
                 </tr>
             @endforelse --}}
             {{-- @for ($i = 0; $i < count($slideImages); $i++)
              <td>1</td>
              <td>
                @if ($slideImages[$i]->updated_at)
                 {{$slideImages[$i]->updated_at->format('d-m-Y H:i')}}
                @else - @endif
              </td>
             @endfor --}}
             @php
                 $i = $page;
             @endphp
            @forelse ($addresses as $address)
                  @php
                      $i = $i +1;
                  @endphp
                 <tr>
                  <td>{{$i}}</td>
                  <td>
                    {{-- <h6>{{$address->street}}</h6> --}}
                    дынные 
                  </td>

                  <td>
                    <div style="width: 200px;height: 300px;">
                      <canvas id="popChart" width="200" height="300"></canvas>
                    </div>
                    {{-- <h6>{{$address->meterGroup->title}}</h6> --}}
                  </td>
                  {{-- <td>
                    <h6>{{$address->meterGroup->meter[0]->amount}}</h6>
                  </td>
                  <td>
                    @if ($address->updated_at)
                     {{$address->updated_at->format('d-m-Y H:i')}}
                    @else - @endif
                   </td> 
                    <td>
                      @php
                          // $amulet = $ceramic;
                      @endphp
                      <a href="{{route('admin.addresses.edit', ['address' => $address->id ])}}" class="btn btn-primary">Ред.</a>
                      
                      <form  action="{{ route('admin.addresses.destroy' , ['address' => $address->id ])}}" method="POST">
                        {{ csrf_field() }}           
                        <button name="_method" type="hidden" value="DELETE" class="btn btn-danger" style="margin-top: 5px;">Удалить</button> --}}
                    </form>
                    </td>
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
        {{ $addresses->links()}}
      </div>
      <script src="../../js/chartjs/chart.js/dist/chart.umd.js"></script>
      <script>
          var popCanvas = document.getElementById("popChart").getContext("2d");
          var barChart = new Chart(popCanvas, {
            type: 'bar',
            data: {
              labels: ["1", "2"],
              datasets: [{
                label: 'Population',
                data: [1000, 500],
                backgroundColor: [
                  'rgba(54, 162, 235, 0.6)',
                  'rgba(54, 162, 235, 0.6)',
                ],
              }],
              options: { responsive: false, maintainAspectRatio: false, width: 200, height: 300 },
            }
          });
          setInterval(() => {
            barChart.data.datasets[0].data = [ barChart.data.datasets[0].data[0]-2, barChart.data.datasets[0].data[1] -1];
            barChart.update();
          },2000)
      </script>
@endsection