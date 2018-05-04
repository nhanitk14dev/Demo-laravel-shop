@if(session()->has("success"))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ session("success") }}
    </div>
@endif

@if(session()->has("error"))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ session("error") }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul style="padding-left: 0; list-style: none;">
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif