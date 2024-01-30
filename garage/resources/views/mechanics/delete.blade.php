@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">Ar tikrai atleisti mechaniką?</div>
                <div class="card-body">

                    @if( $mechanic->trucks()->count() > 0 )

                    <p>Atleidus {{ $mechanic->name }} {{ $mechanic->surname }} bus palikti be priežiūros sunkvežimiai:</p>
                    <ul class="list-group list-group-flush">
                        @foreach ($mechanic->trucks as $truck)
                        <li class="list-group-item"><a href="{{route('trucks-show', $truck)}}">{{ $truck->brand }} {{ $truck->plate }}</a></li>
                        @endforeach
                    </ul>
                    <a href="{{ route('mechanics-index') }}" class="btn btn-secondary mt-3">Atšaukti</a>

                    @else

                    <form action="{{route('mechanics-destroy', $mechanic)}}" method="post">
                        <p>Atleisti {{ $mechanic->name }} {{ $mechanic->surname }}</p>
                        <button type="submit" class="btn btn-danger m-1">Atleisti</button>
                        <a href="{{ route('mechanics-index') }}" class="btn btn-secondary m-1">Atšaukti</a>
                        @csrf
                        @method('delete')
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Patvirtinti atleidimą')