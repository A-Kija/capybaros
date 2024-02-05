<table class="table">
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
            <a class="btn btn-success m-1">Redaguoti</a>
            <a class="btn btn-danger m-1">Atsisakyt</a>
            <a class="btn btn-secondary m-1">Peržiūrėti</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Įmonių nėra</td>
    </tr>
    @endforelse
</table>