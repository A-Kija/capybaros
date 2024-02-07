<table class="table" data-list-table>
    <tr>
        <th>Tipas</th>
        <th>Pavadinimas</th>
        <th>Veiksmai</th>
    </tr>
    @forelse ($companies as $company)
    <tr>
        <td>{{ $company->type }}</td>
        <td>{{ $company->name }}</td>
        <td>
            <button data-action="edit" data-url="{{route('companies-edit', $company)}}" class="btn btn-success m-1">Redaguoti</button>
            <button data-action="delete" data-url="{{route('companies-delete', $company)}}" class="btn btn-danger m-1">Atsisakyti</button>
            <button data-action="show" data-url="{{route('companies-show', $company)}}" class="btn btn-secondary m-1">Peržiūrėti</button>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Įmonių nėra</td>
    </tr>
    @endforelse
</table>
<div data-links>
    {{ $companies->links() }}
</div>