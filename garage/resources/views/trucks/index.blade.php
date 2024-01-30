@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">Sunkvežimių parkas</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Modelis</th>
                            <th>Numeris</th>
                            <th>Mechanikas</th>
                            <th>Veiksmai</th>
                        </tr>
                        @forelse ($trucks as $truck)
                        <tr>
                            <td>{{ $truck->brand }}</td>
                            <td>{{ $truck->plate }}</td>
                            <td>{{ $truck->mechanic->name }} {{ $truck->mechanic->surname }}</td>
                            <td>
                                <a class="btn btn-success m-1" href={{ route('trucks-edit', $truck) }}>Redaguoti</a>
                                <a class="btn btn-danger m-1" href={{ route('trucks-delete', $truck) }}>Nurašyti</a>
                                <a class="btn btn-secondary m-1" href={{ route('trucks-show', $truck) }}>Peržiūrėti</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Sunkvežimių nėra</td>
                        </tr>
                        @endforelse
                    </table>
                    <div>
                        <a href="{{ route('trucks-create') }}" class="btn btn-success">Pridėti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Sunkvežimių parkas')