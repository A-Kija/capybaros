@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">Mechanikas {{$mechanic->name}} {{$mechanic->surname}}</div>
                <div class="card-body">
                    <div class="gallery">
                        @foreach ($mechanic->photos as $photo)
                            <img src="{{ asset('img/'.$photo->path) }}" alt="photo" class="img-thumbnail">
                        @endforeach
                    </div>
                    <div>
                        <a href="{{ route('mechanics-index') }}" class="btn btn-secondary m-1">Visi mechanikai</a>
                        <a href="{{ route('trucks-index', ['mechanic_id' => $mechanic->id]) }}" class="btn btn-secondary m-1">Mechaniko sunkvežimiai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Mechaniko informacija')

