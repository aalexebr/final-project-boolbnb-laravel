@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

    <div class="row my-row">
        <div class="col">
            <div class="title-main d-flex align-items-center">
                <h1>
                    Le Statistiche dei tuoi bool<span class="b-blue">b</span>n<span class="b-blue">b</span>
                </h1>
                <img src="{{ Vite::asset('resources/img/icon_stat.png') }}" alt="" class="logo-add-create d-none d-sm-block">
            </div>

            <div class="stats-container d-flex flex-wrap justify-content-between">
                <div class="card-stats border rounded-4 col-12 col-sm-4">
                    <a href="{{ route('admin.apartment.index') }}">
                        <div class="count-text-one">
                            Hai
                        </div>
                        <div class="count-number-card">
                            {{ $apartments }}
                        </div>
                        <div class="count-text-two">
                            Appartamenti
                        </div>
                    </a>
                </div>
                <div class="card-stats border rounded-4 col-12 col-sm-4">
                    <a href="{{ route('admin.message.index') }}">
                        <div class="count-text-one">
                            Hai
                        </div>
                        <div class="count-number-card">
                           {{ $mess }}
                        </div>
                        <div class="count-text-two">
                            Messaggi
                        </div>
                    </a>
                </div>
                <div class="card-stats border rounded-4 col-12 col-sm-4">
                    <div class="count-text-one">
                        Hai
                    </div>
                    <div class="count-number-card">
                        {{$viewCount}}
                    </div>
                    <div class="count-text-two">
                        Visualizzazioni
                    </div>
                </div>
                <div class="card-stats border rounded-4 col-12 col-sm-4">
                        <div class="count-text-one">
                            Hai
                        </div>
                        <div class="count-number-card">
                           {{ $sponsor }}
                        </div>
                        <div class="count-text-two">
                            Bool Sponsor
                        </div>                    
                </div>
                    @if(isset($singleAptViews))
                    <div class="card-stats-large card-stats border rounded-4 col-12 col-sm-6">
                      <a href="{{ route('admin.apartment.show', ['apartment' => $singleAptViews->id]) }}">  
                        <div class="count-text-one">
                            L'appartamento più visto:
                        </div>
                        <div class="count-number-card">
                            {{ $singleAptViews->name }}
                        </div>
                        <div class="count-text-two">
                            Ha {{ $singleAptViews->view_count }} visualizzazioni
                        </div>
                    </a>
                </div>
                    @endif

            </div>
        </div>
    </div>


    <div>
        <canvas id="myChart"></canvas>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <script>
        const ctx = document.getElementById('myChart');
        let data = @json($arr);
        console.log('data',data);
        const finalData = [];
        let months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"]
        for (let index = 1; index <= 12; index++) {
            if(index <= 9) {
                let obj = {
                'month': months[index-1],
                'count':data[`0${index}`]
                }
                
                if(obj['count'] == undefined) {
                    obj['count'] = 0
                }
                finalData.push(obj);
            }
            else{
                let obj = {
                'month': months[index-1],
                'count':data[`${index}`]
                }
               
                if(obj['count'] == undefined) {
                    obj['count'] = 0
                }
                finalData.push(obj)
            }
          
        }
        
        console.log('finaldata',finalData);



        new Chart(ctx, {
          type: 'line',
          data: {
            labels: finalData.map(row => row.month),
            datasets: [{
              label: '# of Views',
              data:  finalData.map(row => row.count)
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
@endsection
