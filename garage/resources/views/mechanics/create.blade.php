@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header"><h1>Įdarbinti naują mechaniką</h1></div>
                <div class="card-body">
                    <form action="{{route('mechanics-store')}}" method="post" data-photo-create enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Vardas</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            <small class="form-text text-muted">Įveskite naujo mechaniko vardą</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Pavardė</label>
                            <input type="text" name="surname" class="form-control" value="{{old('surname')}}">
                            <small class="form-text text-muted">Įveskite naujo mechaniko pavardę</small>
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
                        <div data-photo-inputs></div>
                        <button type="button" data-add-button class="btn btn-secondary">pridėti nuotrauką</button>
                        <button type="submit" class="btn btn-primary">Įdarbinti</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Įdarbinti naują mechaniką')

