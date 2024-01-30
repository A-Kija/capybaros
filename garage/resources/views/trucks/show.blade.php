@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header"><b>{{$truck->brand}}</b> {{$truck->plate}}</div>
                <div class="card-body">
                    <p>Prižiūrintis mechanikas <a href="{{route('mechanics-show', $truck->mechanic->id)}}">{{$truck->mechanic->name}} {{$truck->mechanic->surname}}</a></p>
                    <div>
                        <a href="{{ route('trucks-index') }}" class="btn btn-secondary m-1">Visi sunkvežimiai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Sunkvežimio informacija')

