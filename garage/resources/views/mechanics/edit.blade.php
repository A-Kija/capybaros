@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header"><h1>Keisti mechaniko duomenis</h1></div>
                <div class="card-body">
                    <form action="{{route('mechanics-update', $mechanic)}}" method="post">
                        <div class="form-group mb-3">
                            <label>Vardas</label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $mechanic->name)}}">
                            <small class="form-text text-muted">Įveskite naują mechaniko vardą</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Pavardė</label>
                            <input type="text" name="surname" class="form-control" value="{{old('surname', $mechanic->surname)}}">
                            <small class="form-text text-muted">Įveskite naują mechaniko pavardę</small>
                        </div>
                        <button type="submit" class="btn btn-primary m-1">Keisti</button>
                        <a href="{{ route('mechanics-index') }}" class="btn btn-secondary m-1">Atšaukti</a>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Mechaniko duomenų keitimas')

