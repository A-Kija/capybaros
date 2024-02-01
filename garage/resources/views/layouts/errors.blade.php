@if ($errors->any())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="alert alert-danger">
                <ul class="list-unstyled" style="margin:0;">
                    @foreach ($errors->all() as $error)
                    <li class="text-center">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif