@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row my-row">
        <div class="col">
            <div class="card">
               @foreach ($messages as $singleMessage)
                   <h2>
                        {{ $singleMessage->name }}
                   </h2>
                        {{ $singleMessage->content }}
               @endforeach
            </div>
        </div>
    </div>
@endsection