@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header"><h1>Keisti mechaniko duomenis</h1></div>
                <div class="card-body">
                    <form action="{{route('mechanics-update', $mechanic)}}" method="post" data-photo-edit enctype="multipart/form-data">
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
                        <div data-photo-inputs-clone style="display: none;">
                            <div class="form-group mb-3">
                                <label>Nuotrauka</label>
                                <div class="d-flex">
                                    <input type="file" class="form-control">
                                    <button type="button" class="btn btn-danger ms-2">-</button>
                                </div>
                                <small class="form-text text-muted">Pridėkite mechaniko nuotrauką</small>
                            </div>
                        </div>
                        <div data-photo-inputs>
                            @foreach ($mechanic->photos as $photo)
                                <div class="form-group mb-3">
                                    <label>Nuotrauka</label>
                                    <div class="d-flex">
                                        <input type="file" name="photos[]" class="form-control">
                                        <input type="hidden" name="photo_id[]" value="{{ $photo->id }}">
                                        <img src="{{ asset('img/'.$photo->path) }}" alt="photo" class="img-thumbnail ms-2" style="height: 50px;">
                                        <button type="button" class="btn btn-danger ms-2" data-photo-remove>-</button>
                                    </div>
                                    <small class="form-text text-muted">Pridėkite mechaniko nuotrauką</small>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" data-add-button class="btn btn-secondary">pridėti nuotrauką</button>
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

