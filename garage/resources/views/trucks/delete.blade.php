@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">Ar tikrai norite nurašyti sunkvežimį?</div>
                <div class="card-body">

                    <form action="{{route('trucks-destroy', $truck)}}" method="post">
                        <p>Nurašyti {{ $truck->brand }} {{ $truck->plate }}</p>
                        <button type="submit" class="btn btn-danger m-1">Nurašyti</button>
                        <a href="{{ route('trucks-index') }}" class="btn btn-secondary m-1">Atšaukti</a>
                        @csrf
                        @method('delete')
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Patvirtinti nurašymą')