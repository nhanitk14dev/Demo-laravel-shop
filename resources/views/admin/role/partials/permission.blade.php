<div class="form-group">
    @php $count = 0; @endphp
    @foreach($config_permissions as $permission)
        <h3>{{ $permission["model"] }}</h3>

        <div class="row">
            @foreach($permission["permissions"] as $key => $name)
                @if(empty($permissions[$key]))
                    @continue;
                @endif

                @php $count++; @endphp
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <input type="checkbox" name="permission[]" value="{!! $permissions[$key]["id"] !!}"
                           @if(!empty($role_permission[$key])) checked @endif
                           id="permission-{{ $count }}">
                    <label for="permission-{{ $count }}">{!! $name !!}</label>
                </div>
            @endforeach
        </div>
        <hr/>

    @endforeach
</div>