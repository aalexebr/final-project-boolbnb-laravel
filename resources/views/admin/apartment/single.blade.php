@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row my-row ">
        <div class="col">
            <div class="title-main d-flex align-items-center">
                <div>
                    <h1>
                        I tuoi messaggi
                    </h1>
                </div>
                <img src="{{ Vite::asset('resources/img/logo_messaggi.png') }}" alt="" class="logo-add-create d-none d-sm-block">
            </div>

            @if($mess) 
                <form action="{{ route('admin.single') }}" method="post" class="form-messages mb-4 d-flex align-items-center">
                    @csrf
                    <select id="search" name="apt_message" class="form-select border rounded-4 form-select-md d-inline">
                        @foreach ($apartments as $singleApt)
                            <option
                            @if($apt->id == $singleApt->id)
                                selected="selected"
                            @endif
                            value="{{ $singleApt->id }}">{{ $singleApt->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-form-messages mx-3" type="submit">Filtra</button>
                </form>
            @endif
       
            @if(count($mess) > 0)   
                @foreach ($mess as $singleMessage)
                    <div class="card-message mb-3 p-3 border rounded-4">
                        <h3>    
                            {{ $singleMessage->name }}
                        </h3>
                        <p>
                            <div>
                                <span class="fw-bold">Oggetto: </span>{{$singleMessage->object}}
                            </div>
                            <div>
                                <span class="fw-bold">Appartamento: </span>{{$singleMessage->apartment->name}}
                            </div>
                        </p>
                        {{ $singleMessage->content }}
                        <form action="{{route('admin.message.destroy',['message'=> $singleMessage->id])}}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-create-card btn-create-card-out">
                            Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            @elseif(count($mess) == 0)
                <h1>
                    NO MESSAGES
                </h1>
            @endif
        </div>
    </div>
@endsection