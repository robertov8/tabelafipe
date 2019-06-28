@if($errors->any())
    <div class="row">
        <div class="col">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    {{ $error }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endif
