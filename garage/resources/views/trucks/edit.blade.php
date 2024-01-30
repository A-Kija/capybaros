@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">Redaguot sunkvežimio duomenis</div>
                <div class="card-body">
                    <form action="{{route('trucks-update', $truck)}}" method="post">
                        <div class="form-group mb-3">
                            <label>Sunkvežimio modelis</label>
                            <input type="text" name="brand" class="form-control" value="{{$truck->brand}}">
                            <small class="form-text text-muted">Įveskite naują sunkvežimio modelį</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Valstybinis numeris</label>
                            <input type="text" name="plate" class="form-control" value="{{$truck->plate}}">
                            <small class="form-text text-muted">Įveskite naują sunkvežimio valstybinį numerį</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Mechanikas</label>
                            <select class="form-select" name="mechanic_id">
                                <option value="0">Pasirinkite mechaniką</option>
                                @foreach ($mechanics as $mechanic)
                                <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->mechanic_id) selected @endif>{{$mechanic->name}} {{$mechanic->surname}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Priskirkite naują mechaniką sunkvežimio priežiūrai</small>
                        </div>
                        <button type="submit" class="btn btn-primary me-3">Išsaugoti</button>
                        <a href="{{ route('trucks-index') }}" class="btn btn-secondary">Atšaukti</a>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Sunkvežimio redagavimas')