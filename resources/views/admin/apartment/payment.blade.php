@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row my-row">
        <div class="title-main d-flex align-items-center justify-content-center justify-content-sm-start ps-0">
            <h1>
              Sponsorizza il tuo bool<span class="b-blue">b</span>n<span class="b-blue">b</span>
            </h1>
            <img src="{{ Vite::asset('resources/img/logo_app_plus.png') }}" alt="" class="logo-add-index d-none d-sm-block">
        </div>
            
            <form id="payment-form" action="{{ route('admin.payment', ['apartment' => $apartment->id]) }}" method="post" class=" d-flex p-4 border border rounded-4 form-sponsor">
                @csrf
                <div class="row">                    
                    <div class="col-12 col-md-6">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                      
                        <h2 class="title-form-sponsor">
                            Scegli il tuo piano:
                        </h2>
                        {{-- @foreach ($sponsorships as $singleSponsor)
                            <div class="d-inline">
                                <img src="{{ Vite::asset('resources/img/logo_app_plus.png') }}" alt="" class="icon-sponsor">
                            </div>
                            <div class="form-check mb-4 d-inline">
                                <input class="form-check-input checkbox-sponsor" type="radio" name="sponsor" value="{{ $singleSponsor->id }}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <span class="span-info-sponsor">Prezzo: </span>{{ $singleSponsor->price }}&euro;
                                    <br>
                                    <span class="span-info-sponsor">Durata: </span>{{ $singleSponsor->time }} ore
                                </label>
                            </div>
                        @endforeach --}}



                        <div>
                            <div class="form-check mb-4 d-flex align-items-center flex-column flex-sm-row mb-5">
                                <img src="{{ Vite::asset('resources/img/icon_money_first.png') }}" alt="" class="icon-sponsor">
                                <input class="form-check-input checkbox-sponsor mx-4 my-3" type="radio" name="sponsor" id="flexCheckDefault" checked value="{{ $sponsorships[0]->id }}">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <span class="span-info-sponsor">Prezzo: </span> {{$sponsorships[0]->price}}&euro;
                                    <br>
                                    <span class="span-info-sponsor">Durata: </span>{{$sponsorships[0]->time}} ore
                                </label>
                                
                            </div>
                        </div>
                        <div>
                            <div class="form-check mb-4 d-flex align-items-center flex-column flex-sm-row mb-5">
                                <img src="{{ Vite::asset('resources/img/icon_money_second.png') }}" alt="" class="icon-sponsor">
                                <input class="form-check-input checkbox-sponsor mx-4 my-3" type="radio" name="sponsor" id="flexCheckDefault" value="{{ $sponsorships[1]->id }}">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <span class="span-info-sponsor">Prezzo: </span>{{$sponsorships[1]->price}}&euro;
                                    <br>
                                    <span class="span-info-sponsor">Durata: </span>{{$sponsorships[1]->time}} ore
                                </label>
                                
                            </div>
                        </div>
                        <div>
                            <div class="form-check mb-4 d-flex align-items-center flex-column flex-sm-row mb-5">
                                <img src="{{ Vite::asset('resources/img/icon_money_third.png') }}" alt="" class="icon-sponsor">
                                <input class="form-check-input checkbox-sponsor mx-4 my-3" type="radio" name="sponsor" id="flexCheckDefault" value="{{ $sponsorships[2]->id }}">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <span class="span-info-sponsor">Prezzo: </span>{{$sponsorships[2]->price}}&euro;
                                    <br>
                                    <span class="span-info-sponsor">Durata: </span>{{$sponsorships[2]->time}} ore
                                </label>
                                
                            </div>
                        </div>
                        {{-- <button type="submit" class="btn-sponsor btn-create-form d-block">Sponsorizza</button> --}}
                      
                    </div>
                    <div class="col-12 col-md-6">
                        <div id="dropin-container"></div>
                        <input value="Sponsorizza" type="submit" id="submit-button" class="button button--medium">
                        <input type="hidden" id="nonce" name="payment_method_nonce" />
                    </div>
                    
                    
                </div>
                
                
            </form>
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
    <script>
        const form = document.getElementById('payment-form');

        braintree.dropin.create({
        authorization: '{{ $client }}',
        container: '#dropin-container'
        }, (error, dropinInstance) => {
        if (error) console.error(error);  

        

        form.addEventListener('submit', function (event) {
        event.preventDefault();

        dropinInstance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
            if (requestPaymentMethodErr) {
                console.error(requestPaymentMethodErr);
            return;
        }

       
        document.getElementById('nonce').value = payload.nonce;


        form.submit();
    });
    });

});
    </script>
@endsection
