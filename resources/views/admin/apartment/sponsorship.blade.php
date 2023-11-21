@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row my-row">
        <div class="col">
            <div class="title-main d-flex align-items-center justify-content-center justify-content-sm-start">
                <h1>
                  Sponsorizza il tuo bool<span class="b-blue">b</span>n<span class="b-blue">b</span>
                </h1>
                <img src="{{ Vite::asset('resources/img/logo_app_plus.png') }}" alt="" class="logo-add-index d-none d-sm-block">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <form action="{{ route('admin.test', ['test' => $apartment->id]) }}" method="POST" class="p-4 mt-5 border border-rounded-4 form-sponsor">
            <h3 class="title-form-sponsor">
                Scegli il tuo piano:
            </h3>
            @foreach ($sponsorships as $singleSponsor)
                @csrf
                <div class="form-check mb-4">
                    <input class="form-check-input checkbox-sponsor" type="radio" name="sponsor" value="{{ $singleSponsor->id }}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <span class="span-info-sponsor">Prezzo: </span>{{ $singleSponsor->price }}&euro;
                        <br>
                        <span class="span-info-sponsor">Durata: </span>{{ $singleSponsor->time }} ore
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn-sponsor btn-create-form d-block">Sponsorizza</button>
          </form>
        </div>
    </div>
@endsection