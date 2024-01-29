@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">Mechanikas {{$mechanic->name}} {{$mechanic->surname}}</div>
                <div class="card-body">
                    <div>
                        <a href="{{ route('mechanics-index') }}" class="btn btn-secondary m-1">Visi mechanikai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Mechaniko informacija')

