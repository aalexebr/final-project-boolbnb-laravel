@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="container-show">
        <div class="row my-row justify-content-start">
            <div class="d-flex justify-content-between ps-0">
                <div class="title-main d-flex align-items-center">
                    <h1>
                      Il tuo bool<span class="b-blue">b</span>n<span class="b-blue">b</span>
                    </h1>
                    <img src="{{ Vite::asset('resources/img/logo_ultimate.png') }}" alt="" class="logo-add-create d-none d-sm-block">
                </div>
            </div>
            @if(count($apartment->sponsorships) > 0)
                    @php $lastSponsor = $apartment->sponsorships[count($apartment->sponsorships) - 1]->pivot->end_date;
                            $startSponsor = $apartment->sponsorships[count($apartment->sponsorships) - 1]->pivot->start_date;
                    @endphp
                    @if($lastSponsor >= $todayDate)
                        <div class="card rounded-4 info-sponsored p-3 d-flex justify-content-start mb-3">
                            <h5>
                            La tua sponsor finisce: {{ date('d/m/y h:i',strtotime($lastSponsor))}}
                            </h5>
                        </div>    
                    @endif
            @endif 
            <div class="col-sm-12 col-md-6 ps-0 pe-0">
                <div class="img-fluid img-cover-show">
                    @if(str_starts_with($apartment->cover_img,'uploads'))
                        <img src="/storage/{{ $apartment->cover_img }}" alt="{{ $apartment->name }}" class="border rounded-4 w-100">
                    @elseif ($apartment->cover_img == null)
                        <div class="img-fluid">
                            <img src="{{ Vite::asset('resources/img/icon_img.png') }}" alt="" class="border rounded-4 w-100">
                        </div>
                    @else 
                        <img src="{{ $apartment->cover_img }}" alt="{{ $apartment->name }}" class="border rounded-4 w-100">
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6 rounded-4">
                <div class="d-block d-md-flex justify-content-md-between align-items-center mb-2 name-ap">
                    <h2 class="h2-show mb-0">
                        {{ $apartment->name }}
                    </h2>
                    <div class="d-flex align-items-center btn-show">
                        <div class="my-2">
                            <a href="{{ route('admin.apartment.edit', [$apartment->id]) }}" class="btn btn-create-card">Modifica</a>
                        </div>
                        <div class="my-2 mx-2">
                            <a href="{{ route('admin.token', [$apartment->id]) }}" class="btn btn-create-card">Sponsorizza</a>
                        </div>
                        <form action="{{route('admin.apartment.destroy',[$apartment->id])}}" method="POST" class="d-flex justify-content-center d-sm-block" onsubmit="return confirm('Vuoi eliminare questo appartamento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn d-block btn-create-card btn-create-card-out">
                                    Elimina
                            </button>
                        </form>
                    </div>
                </div>
                <h4 class="h4-show name-address">
                    {{ $apartment->address }}
                </h4>
                <div class="rounded-line"></div>
                <div class="info-single-ap d-flex info-details-query">
                    <div class="info-details ps-0 pt-2 pb-4">
                        <h4 class="description-card">
                            Info:
                        </h4>
                        <ul>
                            <li>
                                <img src="{{ Vite::asset('resources/img/camere.png') }}" alt="" class="">
                                Ha <span>{{ $apartment->room }}</span> camere
                            </li>
                            <li>
                                <img src="{{ Vite::asset('resources/img/letti_giusto.png') }}" alt="" class="">
                                Ha <span>{{ $apartment->bed }}</span> letti
                            </li>
                            <li>
                                <img src="{{ Vite::asset('resources/img/bagni.png') }}" alt="" class="">
                                Ha <span>{{ $apartment->bathroom }}</span> bagni
                            </li>
                            <li>
                                <img src="{{ Vite::asset('resources/img/condivisione.png') }}" alt="" class="">
                                @if ($apartment->shared_bathroom === true)
                                Bagno condiviso: <span>sì</span>
                                @else
                                Bagno condiviso: <span>no</span>
                                @endif
                            </li>
                            <li>
                                <img src="{{ Vite::asset('resources/img/visibile.png') }}" alt="" class="">
                                @if ($apartment->visible == true)
                                App. visibile: <span>sì</span>
                                @else
                                App. visibile: <span>no</span>
                                @endif
                            </li>
                            <li>
                                <img src="{{ Vite::asset('resources/img/prezzo.png') }}" alt="" class="">
                                Il prezzo è: <span>{{ $apartment->price }} €</span>
                            </li>
                            <li>
                                <img src="{{ Vite::asset('resources/img/metratura.png') }}" alt="" class="">
                                La metratura dell'app è: <span>{{ $apartment->square_meter }} mq.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="info-services pt-2 pe-4 pb-4 rounded-4">
                        <h4 class="description-card">
                            Servizi:
                        </h4>
                        <ul class="d-flex flex-column align-items-center align-items-md-start">
                            @foreach ($apartment->services as $service)
                            <li>{{ $service->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 ps-0">
                <div class="p-4 border rounded-4 mt-3">
                    <h4 class="description-card">
                        Descrizione:
                    </h4>                    
                    <p>{{ $apartment->description }}</p>
                </div>
            </div>
            @if(count($apartment->image) > 0)
                <div class="col-sm-12 col-md-6">
                    <div class="p-4 border rounded-4 mt-3">
                       <div class="d-flex flex-wrap p-0 g-0 m-0">
                             @foreach ($apartment->image as $extraImage)
                                <div class="col-12 col-md-6 d-flex justify-content-center">
                                    <div class="img-fluid img-extra-show my-2">
                                        @if($extraImage->path)
                                            <img src="/storage/{{ $extraImage->path }}" alt="" class="border rounded-4 w-100">
                                        @else 
                                            <img src="{{ $extraImage->src}}" alt="" class="border rounded-4 w-100">
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                       </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
