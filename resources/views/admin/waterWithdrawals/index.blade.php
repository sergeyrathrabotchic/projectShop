@extends('layosts.admin')
@section('title') Водозабор - @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Водозабор</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{route('admin.reservoirs.create,[
          'reservoir' => $reservoir[0]->id
        ]')}}" class="btn btn-sm btn-outline-secondary">Изменить первый резервуар</a>
      </div>
       <div class="btn-group me-2">
        <a href="{{route('admin.reservoirs.create,[
          'reservoir' => $reservoir[1]->id
        ]')}}" class="btn btn-sm btn-outline-secondary">Изменить второй резервуар</a>
      </div>
      {{-- <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
      </div>
      <div class="btn-group me-2">
        <a href="{{route('news444444.create')}}" class="btn btn-sm btn-outline-secondary">Проверка</a>
      </div> --}}
    </div>
  </div>

      {{-- <h2>Список адресов</h2> --}}
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
             
             @php
                 $i = $page;
             @endphp
             {{-- {{dd($reservoirs)}} --}}
            @forelse ($reservoirs as $reservoir)
                  @php
                      $i = $i +1;
                  @endphp
                  @if ($i == 1)
                 <tr>
                  <td>{{$i}}</td>
                  <td>
                    {{-- <h6>{{$address->street}}</h6> --}}
                    <div class="form-group" style="display: flex;flex-direction: column;">
                      @php
                      $k = 0;
                      @endphp
                     @forelse ($pumps as $pump)
                         @if ($pump->id_reservoir == 1)
                          @php
                              $k = $k +1;
                          @endphp
                        <div style="display: flex;">
                          <label for="image">Насос №{{$k}} (емк. 1)</label>
                          <div style="display: flex;">
                            <input value="{{$pump->pumping_volume}}" type="number" id="pump_1_value" style="margin: 4px;width:98%;" class="form-control pump_1_value" name="title" id="title">
                            <button name="_method" id="pump_1" type="hidden" value="DELETE" @if ($pump->condition == 1) class="btn btn-danger pump_1" style="margin: 4px;">Остановить@else class="btn btn-success pump_1" style="margin: 4px;">Запустить@endif</button>
                          </div>
                        </div>
                        @endif
                      @empty
                      @endforelse
                     
                      <div style="display: flex;">
                        <label for="image">Водозабор (емк. 1)</label>
                        <input type="number" id="waterWithdrawals_1_value" style="margin: 4px;width:98%;" class="form-control" name="title" id="title">
                      </div>
                    </div>
                    <div class="form-group" style="display: flex;flex-direction: column;">
                      @php
                      $j = 0;
                      @endphp
                      @forelse ($pumps as $pump)
                        @if ($pump->id_reservoir == 2)
                          @php
                              $j = $j +1;
                          @endphp
                        <div style="display: flex;">
                          <label for="image">Насос №{{$j}} (емк. 2)</label>
                          <div style="display: flex;">
                            <input value="{{$pump->pumping_volume}}" type="number" id="pump_2_value" style="margin: 4px;width:98%;"  class="form-control pump_2_value" name="title" id="title">
                            <button name="_method" id="pump_2" type="hidden" value="DELETE"  @if ($pump->condition == 1) class="btn btn-danger pump_2" style="margin: 4px;">Остановить@else class="btn btn-success pump_1" style="margin: 4px;">Запустить@endif</button>
                          </div>
                        </div>
                        @endif
                      @empty
                      @endforelse
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
                    <div class="up_pump_1" style="display: none;">Время до полного заполнения первого резервуара: <span class="up_pump_value_1"></span> ч. <span class="up_pump_value_1_min"></span> минут</div>
                    <div class="dovn_pump_1" style="display: none;">Время до полного опусташения первого резервуара: <span class="dovn_pump_value_1"></span> ч. <span class="dovn_pump_value_1_min"></span> минут</div>
                    <div class="up_pump_2" style="display: none;">Время до полного заполнения второго резервуара: <span class="up_pump_value_2"></span></span> ч. <span class="up_pump_value_2_min"></span> минут</div>
                    <div class="dovn_pump_2" style="display: none;">Время до полного опусташения второго резервуара: <span class="dovn_pump_value_2"></span></span> ч. <span class="dovn_pump_value_2_min"></span> минут</div>
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
        {{ $reservoirs->links()}}
      </div>
      <script src="{{asset('js/chartjs/chart.js/dist/chart.umd.js')}}"></script>
      <script>

          var reservoir_1 = {{ $reservoirs[0]->max_volume}};
          var reservoir_2 = {{ $reservoirs[1]->max_volume}};
          var popCanvas = document.getElementById("popChart").getContext("2d");
          var barChart = new Chart(popCanvas, {
            type: 'bar',
            data: {
              labels: ["Резервуар №1", "Резервуар №2"],
              datasets: [{
                label: 'Обьем воды м3',
                data: [reservoir_1/2, reservoir_2/2],
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
          // var pump_1_condition = []
          
          var pump_1_i;
          for(var i=0;i<pump_1.length;i++){
 
            pump_1_i = pump_1[i];
            pump_1_i.addEventListener('click', function (){
              if (this.innerHTML == "Остановить") {
                this.innerHTML = "Запустить" 
                pump_1_condition = [];
                for(i=0;i<pump_1.length;i++){
                  if (pump_1[i].innerHTML == "Остановить") {
                    pump_1_condition.push(1);
                  } else { 
                    pump_1_condition.push(0);
                  }
                }
                this.classList.remove('costumeChange', 'btn-danger');
                this.classList.add('btn-success');
              } else {
                this.innerHTML = "Остановить" 
                pump_1_condition = [];
                for(i=0;i<pump_1.length;i++){
                  if (pump_1[i].innerHTML == "Остановить") {
                    pump_1_condition.push(1);
                  } else { 
                    pump_1_condition.push(0);
                  }
                }
                this.classList.remove('costumeChange', 'btn-success');
                this.classList.add('btn-danger')
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
          var waterWithdrawals_2_value = document.querySelector('#waterWithdrawals_2_value');
          var pump_2 = document.querySelectorAll(".pump_2");
          var pump_2_value = document.querySelectorAll(".pump_2_value");
          var pump_2_condition = [];
          for(i=0;i<pump_2.length;i++){
            if (pump_2[i].innerHTML == "Остановить") {
              pump_2_condition.push(1);
            } else { 
              pump_2_condition.push(0);
            }
          }
          // if (pump_2.innerHTML == "Остановить") {
          //   var pump_2_condition = 1;
          // } else { 
          //   var pump_2_condition = 0;
          // }
          var pump_2_i;
          for(var i=0;i<pump_2.length;i++){
            pump_2_i = pump_2[i];
            pump_2_i.addEventListener('click', function (){
              if (this.innerHTML == "Остановить") {
                this.innerHTML = "Запустить" 
                pump_2_condition = [];
                for(i=0;i<pump_2.length;i++){
                  if (pump_2[i].innerHTML == "Остановить") {
                    pump_2_condition.push(1);
                  } else { 
                    pump_2_condition.push(0);
                  }
                }
                this.classList.remove('costumeChange', 'btn-danger');
                this.classList.add('btn-success')
              } else {
                this.innerHTML = "Остановить" 
                pump_2_condition = [];
                for(i=0;i<pump_2.length;i++){
                  if (pump_2[i].innerHTML == "Остановить") {
                    pump_2_condition.push(1);
                  } else { 
                    pump_2_condition.push(0);
                  }
                }
                this.classList.remove('costumeChange', 'btn-success');
                this.classList.add('btn-danger')
              }
            });
          }
          // pump_2.addEventListener('click', function (){
          //   if (pump_2.innerHTML == "Остановить") {
          //   pump_2.innerHTML = "Запустить" 
          //   pump_2_condition = 0;
          //   pump_2.classList.remove('costumeChange', 'btn-danger');
          //   pump_2.classList.add('btn-success')
          // } else {
          //   pump_2.innerHTML = "Остановить" 
          //   pump_2_condition = 1;
          //   pump_2.classList.remove('costumeChange', 'btn-success');
          //   pump_2.classList.add('btn-danger')
          // }
          // });
          setInterval(() => {
            
            value_1_arr = [];
            for (let i = 0; i < pump_1_value.length; i++) {
              if (pump_1_condition[i]) {
                if (pump_1_value[i].value == '') {
                  value_1_arr.push(0);
                } else {
                  value_1_arr.push(pump_1_value[i].value);
                } 
              } else {
                value_1_arr.push(0);
              }        
            }
            let value_1 = 0;
            for(let i = 0; i < value_1_arr.length; i++) {
              value_1 = value_1 + parseInt(value_1_arr[i]);
            }
            // console.log(value_1);
            // if (pump_1_condition) {
            //     if (pump_1_value.value == '') {
            //       value_1 = 0;
            //     } else {
            //       value_1 = pump_1_value.value;
            //     } 
            // } else {
            //     value_1 = 0;
            // }


            if (waterWithdrawals_1_value.value == '') {
              waterWithdrawals_1_value_get = 0;
            } else {
              waterWithdrawals_1_value_get = waterWithdrawals_1_value.value;
            } 
            // if (pump_2_condition) {
            //     if (pump_2_value.value == '') {
            //       value_2 = 0;
            //     } else {
            //       value_2 = pump_2_value.value;
            //     } 
            // } else {
            //     value_2 = 0;
            // }
            value_2_arr = [];
            for (let i = 0; i < pump_2_value.length; i++) {
              if (pump_2_condition[i]) {
                if (pump_2_value[i].value == '') {
                  value_2_arr.push(0);
                } else {
                  value_2_arr.push(pump_2_value[i].value);
                } 
              } else {
                value_2_arr.push(0);
              }        
            }
            let value_2 = 0;
            for(let i = 0; i < value_2_arr.length; i++) {
              value_2 = value_2 + parseInt(value_2_arr[i]);
            }
            if (waterWithdrawals_2_value.value == '') {
              waterWithdrawals_2_value_get = 0;
            } else {
              waterWithdrawals_2_value_get = waterWithdrawals_2_value.value;
            }

            let emk1 = parseInt(value_1) - parseInt(waterWithdrawals_1_value_get)
            let up_pump_emk1 = document.querySelector(".up_pump_1");
            let dovn_pump_emk1 = document.querySelector(".dovn_pump_1");
            let dovn_pump_value_1 = document.querySelector(".dovn_pump_value_1");
            let up_pump_value_1 = document.querySelector(".up_pump_value_1");
            let up_pump_value_1_min = document.querySelector(".up_pump_value_1_min");
            let dovn_pump_value_1_min = document.querySelector(".dovn_pump_value_1_min");
            // dovn_pump_value_1
            if (emk1 > 0){
              let sum =0;
              let min =0;
              let hour = 0;
              for(i = 1;sum < reservoir_1;i++){
                sum = parseInt(barChart.data.datasets[0].data[0]) + emk1 * i;
                hour = i;
                if (reservoir_1 < sum) {
                  min = Math.round(60 * (reservoir_1 - (sum - emk1))/emk1);
                }
                if ( barChart.data.datasets[0].data[0] + emk1 * 1 > reservoir_1){
                  hour = 0;
                }
              }
              up_pump_value_1.innerHTML = hour;
              up_pump_value_1_min.innerHTML = min;
              up_pump_emk1.style = "";
              dovn_pump_emk1.style = "display: none;";
            } else if (emk1 < 0) {
              // dovn_pump_1_min
              let sum = parseInt(barChart.data.datasets[0].data[0]);
              let min =0;
              let hour = 0;
              for(i = 1;sum > 0;i++){
                sum = parseInt(barChart.data.datasets[0].data[0]) + emk1 * i;
                hour = i;
                if ( 0 > sum) {
                  min = Math.round(60 * (sum - emk1)/(-emk1));
                }
                if ( barChart.data.datasets[0].data[0] + emk1 < 0){
                  hour = 0;
                }
              } 
              // dovn_pump_value_1.innerHTML = i;
              dovn_pump_value_1.innerHTML = hour;
              dovn_pump_value_1_min.innerHTML = min;
              up_pump_emk1.style = "display: none;";
              dovn_pump_emk1.style = "";
            }
            let emk2 = parseInt(value_2) - parseInt(waterWithdrawals_2_value_get)
            let up_pump_emk2 = document.querySelector(".up_pump_2");
            let dovn_pump_emk2 = document.querySelector(".dovn_pump_2");
            let up_pump_value_2 = document.querySelector(".up_pump_value_2");
            let dovn_pump_value_2 = document.querySelector(".dovn_pump_value_2");
            let up_pump_value_2_min = document.querySelector(".up_pump_value_2_min");
            let dovn_pump_value_2_min = document.querySelector(".dovn_pump_value_2_min");
            if (emk2 > 0 ){
              let sum_2 =0;
              let min_2 =0;
              let hour_2 = 0;
              for(i = 1;sum_2 < reservoir_2;i++){
                sum_2 = parseInt(barChart.data.datasets[0].data[1]) + emk2 * i;
                hour_2 = i;
                if (reservoir_2 < sum_2) {
                  min_2 = Math.round(60 * (reservoir_2 - (sum_2 - emk2))/emk2);
                }
                if ( barChart.data.datasets[0].data[1] + emk2 * 1 > reservoir_2){
                  hour_2 = 0;
                }
              } 
              up_pump_value_2.innerHTML = hour_2;
              up_pump_value_2_min.innerHTML = min_2;
              up_pump_emk2.style = "";
              dovn_pump_emk2.style = "display: none;";
            } else if (emk2 < 0) {
              let sum_2 = parseInt(barChart.data.datasets[0].data[1]);
              let min_2 =0;
              let hour_2 = 0;
              for(i = 1;sum_2 > 0;i++){
                sum_2 = parseInt(barChart.data.datasets[0].data[1]) + emk2 * i;
                hour_2 = i;
                if ( 0 > sum_2) {
                  min_2 = Math.round(60 * (sum_2 - emk2)/(-emk2));
                }
                if ( barChart.data.datasets[0].data[1] + emk2 < 0){
                  hour_2 = 0;
                }
              } 
              dovn_pump_value_2.innerHTML = hour_2;
              dovn_pump_value_2_min.innerHTML = min_2;
              up_pump_emk2.style = "display: none;";
              dovn_pump_emk2.style = "";
            }
            // console.log(parseInt(waterWithdrawals_1_value));
            // console.log(parseInt(barChart.data.datasets[0].data[0]) - parseInt(waterWithdrawals_1_value) + parseInt(value_1));
            let v1 = parseInt(barChart.data.datasets[0].data[0]) - parseInt(waterWithdrawals_1_value_get) + parseInt(value_1);
            let v2 = parseInt(barChart.data.datasets[0].data[1]) - parseInt(waterWithdrawals_2_value_get) + parseInt(value_2);
            if (v1 <= 0){
              v1 = 0;
            } else if (v1 >= reservoir_1){
              v1 = reservoir_1;
            }
            if (v2 <= 0){
              v2 = 0;
            } else if (v2 >= reservoir_2){
              v2 = reservoir_2;
            }
            if (reservoir_1/10 >= v1) {
                pump_1_condition = [];
                for(i=0;i<pump_1.length;i++){
                  pump_1[i].innerHTML = "Остановить" 
                  pump_1[i].classList.remove('costumeChange', 'btn-success');
                  pump_1[i].classList.add('btn-danger');
                  if (pump_1[i].innerHTML == "Остановить") {
                    pump_1_condition.push(1);
                  } else { 
                    pump_1_condition.push(0);
                  }
                }
            }
            if (reservoir_2/10 >= v2) {
                pump_2_condition = [];
                for(i=0;i<pump_2.length;i++){
                  pump_2[i].innerHTML = "Остановить" 
                  pump_2[i].classList.remove('costumeChange', 'btn-success');
                  pump_2[i].classList.add('btn-danger');
                  if (pump_2[i].innerHTML == "Остановить") {
                    pump_2_condition.push(1);
                  } else { 
                    pump_2_condition.push(0);
                  }
                }
            }
            barChart.data.datasets[0].data = [ v1, v2];
            //barChart.data.datasets[0].data = [ barChart.data.datasets[0].data[0]-2, barChart.data.datasets[0].data[1] -1];
            // barChart.update();
          },2000)
      </script>
@endsection