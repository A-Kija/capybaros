<div class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Redaguoti įmonę</h5>
                <button type="button" data-close class="btn-close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label>Tipas</label>
                        <input type="text" name="type" class="form-control" value="{{$company->type}}">
                    </div>
                    <div class="form-group mt-2">
                        <label>Pavadinimas</label>
                        <input type="text" name="name" class="form-control" value="{{$company->name}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-close class="btn btn-secondary">Ne</button>
                    <button type="button" data-update data-url="{{route('companies-update', $company)}}" class="btn btn-primary">Išsaugoti</button>
                </div>
            </form>
        </div>
    </div>
</div>