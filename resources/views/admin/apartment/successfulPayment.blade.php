@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<div class="row row-index my-row ">
    <div class="my-container">
        <div class="icon-payment mb-5">
            <img src="https://cdn-icons-png.flaticon.com/512/5610/5610944.png" alt="">
        </div>
        <div class="title-payment mb-5">
            TRANSAZIONE AVVENUTA CON SUCCESSO
        </div>
        <div>
        <h2>
            Informazioni di pagamento
        </h2>
        <div>
            <ul class="info-payment">
                <li>
                    <span class="span-info-sponsor">Pacchetto: </span>
                    <ul>
                        <li>
                            <span class="span-info-sponsor">Ore: </span>{{$sponsor->time}}
                        </li>
                        <li>
                            <span class="span-info-sponsor">Prezzo: </span>{{$result->transaction->amount}}&euro;
                            {{-- @php dd($result->transaction->amount) @endphp --}}
                        </li>
                    </ul>
                </li>
                <li>
                    <span class="span-info-sponsor">Metodo di pagamento: </span> **** **** **** {{$result->transaction->creditCard['last4']}}
                </li>
            </ul>
        </div>
        <div class="info-payment">
            Per tornare al tuo appartamento 
            <a href="{{route('admin.apartment.show', ['apartment'=>$apartment->id])}}" class="">
                clicca qui
            </a>

            {{-- {{ route('admin.apartment.show') }} --}}
        </div>
    </div>
    </div>
    
</div>
@endsection