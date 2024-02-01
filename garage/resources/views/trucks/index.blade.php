@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Sunkvežimių parkas</h1>
                    <form action="{{route('trucks-index')}}">
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
                                        <label class="m-2">Mechanikas</label>
                                        <select class="form-select mt-2" name="mechanic_id">
                                            <option value="0">Visi</option>
                                            @foreach ($mechanics as $mechanic)
                                            <option value="{{ $mechanic->id }}" @if($mechanicId == $mechanic->id) selected @endif>{{ $mechanic->name }} {{ $mechanic->surname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Modelis</label>
                                        <select class="form-select mt-2" name="brand">
                                            <option value="">Visi</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand }}" @if($brandId == $brand) selected @endif>{{ $brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Rodyti</button>
                                        <a href="{{ route('trucks-index') }}" class="btn btn-secondary ms-2">Pradinis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                
                </div>
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
                        @if ($mechanicId)
                        <a href="{{ route('trucks-create', ['mechanic_id' => $mechanicId]) }}" class="btn btn-secondary">Pridėti</a>
                        @else
                        <a href="{{ route('trucks-create') }}" class="btn btn-success">Pridėti</a>
                        @endif
                    </div>
                </div>
            </div>
            @if ($perPage)
            <div class="mt-3">
                {{ $trucks->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('title', 'Sunkvežimių parkas')