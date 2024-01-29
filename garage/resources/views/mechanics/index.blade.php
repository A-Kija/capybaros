@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">Dirbantys Mechanikai</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th>Veiksmai</th>
                        </tr>
                        @forelse ($mechanics as $mechanic)
                        <tr>
                            <td>{{ $mechanic->name }}</td>
                            <td>{{ $mechanic->surname }}</td>
                            <td>
                                <a class="btn btn-success m-1" href={{ route('mechanics-edit', $mechanic) }}>Redaguoti</a>
                                <a class="btn btn-danger m-1" href={{ route('mechanics-delete', $mechanic) }}>Atleisti</a>
                                <a class="btn btn-secondary m-1" href={{ route('mechanics-show', $mechanic) }}>Peržiūrėti</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Mechanikų nėra</td>
                        </tr>
                        @endforelse
                    </table>
                    <div>
                        <a href="{{ route('mechanics-create') }}" class="btn btn-success">Pridėti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Dirbantys Mechanikai')