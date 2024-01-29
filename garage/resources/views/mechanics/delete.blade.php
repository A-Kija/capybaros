@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">Ar tikrai atleisti mechaniką?</div>
                <div class="card-body">
                    <form action="{{route('mechanics-destroy', $mechanic)}}" method="post">
                        <p>Atleisti {{ $mechanic->name }} {{ $mechanic->surname }}</p>
                        <button type="submit" class="btn btn-danger m-1">Atleisti</button>
                        <a href="{{ route('mechanics-index') }}" class="btn btn-secondary m-1">Atšaukti</a>
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Patvirtinti atleidimą')

