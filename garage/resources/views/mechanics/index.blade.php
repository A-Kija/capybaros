@extends('layouts.app')
@inject('role', 'App\Services\RolesService')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Dirbantys Mechanikai</h1>
                    <form action="{{route('mechanics-index')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Rūšiavimas</label>
                                        <select class="form-select mt-2" name="sort">
                                            @foreach ($sorts as $sortKey => $sortValue)
                                            <option value="{{ $sortKey }}" @if($sortBy == $sortKey) selected @endif>{{ $sortValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Puslapyje rezultatų</label>
                                        <select class="form-select mt-2" name="per_page">
                                            @foreach ($perPageSelect as $perPageKey => $perPageValue)
                                            <option value="{{ $perPageKey }}" @if($perPage == $perPageKey) selected @endif>{{ $perPageValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Ieškoti mechaniko</label>
                                        <input type="text" class="form-control mt-2" name="s" value="{{ $s }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-5">Rodyti</button>
                                        <a href="{{ route('mechanics-index') }}" class="btn btn-secondary mt-5 ms-2">Pradinis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                     
                                @if($role->show('admin'))
                                <a class="btn btn-success m-1" href={{ route('mechanics-edit', $mechanic)
                                    }}>Redaguoti</a>
                                @endif
                                <a class="btn btn-danger m-1" href={{ route('mechanics-delete', $mechanic) }}>Atleisti
                                    [{{$mechanic->trucks()->count()}}]</a>
                                <a class="btn btn-secondary m-1" href={{ route('mechanics-show', $mechanic)
                                    }}>Peržiūrėti</a>
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
            @if ($perPage)
            <div class="mt-3">
                {{ $mechanics->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('title', 'Dirbantys Mechanikai')