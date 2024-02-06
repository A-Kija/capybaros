@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Nauja įmonė</h2>
                </div>
                <div class="card-body">
                    <form data-create-form data-url="{{route('companies-store')}}">
                        <div class="form-group mt-2">
                            <label>Tipas</label>
                            <input type="text" name="type" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Pavadinimas</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <button type="button" class="btn btn-primary">Išsaugoti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Įmonių sąrašas</h2>
                </div>
                <div class="card-body" data-list data-url="{{route('companies-list')}}">

                </div>
            </div>
        </div>
    </div>
</div>
<section data-modal-delete></section>
<section data-modal-edit></section>
<section data-modal-show></section>

@endsection

@section('title', 'Įmonės')