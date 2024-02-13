@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Pridėti naują sunkvežimis</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('trucks-store')}}" method="post" data-mechanic-create>
                        <div class="form-group mb-3">
                            <label>Sunkvežimio modelis</label>
                            <input type="text" name="brand" class="form-control" value="{{old('brand')}}">
                            <small class="form-text text-muted">Įveskite naujo sunkvežimio modelį</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Valstybinis numeris</label>
                            <input type="text" name="plate" class="form-control" value="{{old('plate')}}">
                            <small class="form-text text-muted">Įveskite naujo sunkvežimio valstybinį numerį</small>
                        </div>
                        <div data-mechanic-inputs-clone style="display: none;">
                            <div class="form-group mb-3">
                                <label>Mechanikas</label>
                                <div class="d-flex">
                                    <select class="form-select">
                                        <option selected value="0">Pasirinkite mechaniką</option>
                                        @foreach ($mechanics as $mechanic)
                                        <option value="{{$mechanic->id}}" @if(old('mechanic_id', $mechanicId ?
                                            $mechanicId : 0)==$mechanic->id) selected @endif
                                            >{{$mechanic->name}} {{$mechanic->surname}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-danger ms-2">-</button>
                                </div>
                                <small class="form-text text-muted">Priskirkite mechaniką sunkvežimio priežiūrai</small>
                            </div>
                        </div>
                        <div data-mechanic-inputs></div>
                        <button type="button" data-add-button class="btn btn-secondary">Pridėti mechaniką</button>
                        <button type="submit" class="btn btn-primary">Pridėti</button>
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Naujas sunkvežimis')