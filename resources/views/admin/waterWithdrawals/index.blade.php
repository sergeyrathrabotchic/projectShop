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
                  @if ($i == 1)
                 <tr>
                  <td>{{$i}}</td>
                  <td>
                    {{-- <h6>{{$address->street}}</h6> --}}
                    <div class="form-group" style="display: flex;flex-direction: column;">
                      <div style="display: flex;">
                        <label for="image">Насос №1 (емк. 1)</label>
                        <div style="display: flex;">
                          <input type="number" id="pump_1_value" style="margin: 4px;width:98%;" class="form-control pump_1_value" name="title" id="title">
                          <button name="_method" id="pump_1" type="hidden" value="DELETE" class="btn btn-danger pump_1" style="margin: 4px;">Остановить</button>
                        </div>
                      </div>
                      <div style="display: flex;">
                        <label for="image">Водозабор (емк. 1)</label>
                        <input type="number" id="waterWithdrawals_1_value" style="margin: 4px;width:98%;" class="form-control" name="title" id="title">
                      </div>
                    </div>
                    <div class="form-group" style="display: flex;flex-direction: column;">
                      <div style="display: flex;">
                        <label for="image">Насос №1 (емк. 2)</label>
                        <div style="display: flex;">
                          <input type="number" id="pump_2_value" style="margin: 4px;width:98%;" class="form-control" name="title" id="title">
                          <button name="_method" id="pump_2" type="hidden" value="DELETE" class="btn btn-danger" style="margin: 4px;">Остановить</button>
                        </div>
                      </div>
                      <div style="display: flex;">
                        <label for="image">Водозабор (емк. 2)</label>
                        <input type="number" id="waterWithdrawals_2_value" style="margin: 4px;width:98%;" class="form-control" name="title" id="title">
                      </div>
                    </div>  
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
                 @endif
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
      <script src="{{asset('js/chartjs/chart.js/dist/chart.umd.js')}}"></script>
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

          var waterWithdrawals_1_value = document.querySelector('#waterWithdrawals_1_value');


          var pump_1 = document.querySelectorAll(".pump_1");
          var pump_1_value = document.querySelectorAll(".pump_1_value");
          var pump_1_condition = [];
          for(i=0;i<pump_1.length;i++){
            if (pump_1[i].innerHTML == "Остановить") {
              pump_1_condition.push(1);
            } else { 
              pump_1_condition.push(0);
            }
          }
          var pump_1_condition = []
          
          var pump_1_i;
          for(i=0;i<pump_1.length;i++){
            pump_1_i = pump_1[i];
            pump_1_i.addEventListener('click', function (){
              if (pump_1_i.innerHTML == "Остановить") {
                pump_1_i.innerHTML = "Запустить" 
                pump_1_condition.push(0);
                pump_1_i.classList.remove('costumeChange', 'btn-danger');
                pump_1_i.classList.add('btn-success')
              } else {
                pump_1_i.innerHTML = "Остановить" 
                pump_1_condition.push(1);
                pump_1_i.classList.remove('costumeChange', 'btn-success');
                pump_1_i.classList.add('btn-danger')
              }
            });
          }
          // var pump_1 = document.getElementById("pump_1");
          // var waterWithdrawals_1_value = document.querySelector('#waterWithdrawals_1_value');
          // var pump_1_value = document.getElementById("pump_1_value");
          // if (pump_1.innerHTML == "Остановить") {
          //   var pump_1_condition = 1;
          // } else { 
          //   var pump_1_condition = 0;
          // }
          // pump_1.addEventListener('click', function (){
          //   if (pump_1.innerHTML == "Остановить") {
          //   pump_1.innerHTML = "Запустить" 
          //   pump_1_condition = 0;
          //   pump_1.classList.remove('costumeChange', 'btn-danger');
          //   pump_1.classList.add('btn-success')
          // } else {
          //   pump_1.innerHTML = "Остановить" 
          //   pump_1_condition = 1;
          //   pump_1.classList.remove('costumeChange', 'btn-success');
          //   pump_1.classList.add('btn-danger')
          // }
          // });

          var pump_2 = document.getElementById("pump_2");
          var waterWithdrawals_2_value = document.querySelector('#waterWithdrawals_2_value');
          var pump_2_value = document.getElementById("pump_2_value");
          if (pump_2.innerHTML == "Остановить") {
            var pump_2_condition = 1;
          } else { 
            var pump_2_condition = 0;
          }
          
          pump_2.addEventListener('click', function (){
            if (pump_2.innerHTML == "Остановить") {
            pump_2.innerHTML = "Запустить" 
            pump_2_condition = 0;
            pump_2.classList.remove('costumeChange', 'btn-danger');
            pump_2.classList.add('btn-success')
          } else {
            pump_2.innerHTML = "Остановить" 
            pump_2_condition = 1;
            pump_2.classList.remove('costumeChange', 'btn-success');
            pump_2.classList.add('btn-danger')
          }
          });
          setInterval(() => {
            if (pump_1_condition) {
                if (pump_1_value.value == '') {
                  value_1 = 0;
                } else {
                  value_1 = pump_1_value.value;
                } 
            } else {
                value_1 = 0;
            }


            if (waterWithdrawals_1_value.value == '') {
              waterWithdrawals_1_value_get = 0;
            } else {
              waterWithdrawals_1_value_get = waterWithdrawals_1_value.value;
            } 
            if (pump_2_condition) {
                if (pump_2_value.value == '') {
                  value_2 = 0;
                } else {
                  value_2 = pump_2_value.value;
                } 
            } else {
                value_2 = 0;
            }
            if (waterWithdrawals_2_value.value == '') {
              waterWithdrawals_2_value_get = 0;
            } else {
              waterWithdrawals_2_value_get = waterWithdrawals_2_value.value;
            }
            
            // console.log(parseInt(waterWithdrawals_1_value));
            // console.log(parseInt(barChart.data.datasets[0].data[0]) - parseInt(waterWithdrawals_1_value) + parseInt(value_1));
            barChart.data.datasets[0].data = [ parseInt(barChart.data.datasets[0].data[0]) - parseInt(waterWithdrawals_1_value_get) + parseInt(value_1), parseInt(barChart.data.datasets[0].data[1]) - parseInt(waterWithdrawals_2_value_get) + parseInt(value_2)];
            //barChart.data.datasets[0].data = [ barChart.data.datasets[0].data[0]-2, barChart.data.datasets[0].data[1] -1];
            barChart.update();
          },2000)
      </script>
@endsection