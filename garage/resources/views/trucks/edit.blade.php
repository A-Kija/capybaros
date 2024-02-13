@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header"><h1>Redaguot sunkvežimio duomenis</h1></div>
                <div class="card-body">
                    <form action="{{route('trucks-update', $truck)}}" method="post" data-mechanic-edit>
                        <div class="form-group mb-3">
                            <label>Sunkvežimio modelis</label>
                            <input type="text" name="brand" class="form-control" value="{{old('brand', $truck->brand)}}">
                            <small class="form-text text-muted">Įveskite naują sunkvežimio modelį</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Valstybinis numeris</label>
                            <input type="text" name="plate" class="form-control" value="{{old('plate', $truck->plate)}}">
                            <small class="form-text text-muted">Įveskite naują sunkvežimio valstybinį numerį</small>
                        </div>
                        <div data-mechanic-inputs-clone style="display: none;">
                            <div class="form-group mb-3">
                                <label>Mechanikas</label>
                                <div class="d-flex">
                                    <select class="form-select">
                                        <option selected value="0">Pasirinkite mechaniką</option>
                                        @foreach ($mechanics as $mechanic)
                                        <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-danger ms-2" data-mechanic-remove>-</button>
                                </div>
                                <small class="form-text text-muted">Priskirkite mechaniką sunkvežimio priežiūrai</small>
                            </div>
                        </div>


                        <div data-mechanic-inputs>


                            @foreach ($truckMechanics as $mechanicId)
                            <div class="form-group mb-3">
                                <label>Mechanikas</label>
                                <div class="d-flex">
                                    <select name="mechanic_id[]" class="form-select">
                                        <option selected value="0">Pasirinkite mechaniką</option>
                                        @foreach ($mechanics as $mechanicOption)
                                        <option value="{{$mechanicOption->id}}" @if($mechanicOption->id == $mechanicId)
                                            selected @endif>{{$mechanicOption->name}} {{$mechanicOption->surname}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-danger ms-2" data-mechanic-remove>-</button>
                                </div>
                                <small class="form-text text-muted">Priskirkite mechaniką sunkvežimio priežiūrai</small>
                            </div>
                            @endforeach

                        </div>


                        <button type="submit" class="btn btn-primary">Išsaugoti</button>
                        <button type="button" data-add-button class="btn btn-secondary">Pridėti mechaniką</button>
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