<div class="row">
    <div class="col-md-6">
        <p>
            {!! trans("admin_user.form.role") !!}
        </p>
        <div class="form-group form-float">
            <div class="form-line">
                <select class="form-control show-tick" name="role[]" id="role" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {!! !empty($user_role) && in_array($role->id , $user_role) ? "selected" : null !!} >{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="name"
                       value="{!! !empty($user) ? $user->name : old("name") !!}">
                <label class="form-label">{!! trans("admin_user.form.name") !!}</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="email"
                       value="{!! !empty($user) ? $user->email : old("email") !!}">
                <label class="form-label">{!! trans("admin_user.form.email") !!}</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="password"
                       value="{!! old("password")  !!}">
                <label class="form-label">{!! trans("admin_user.form.password") !!}</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-md-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" id="phone" name="phone" class="form-control" 
                            value="{!! old("phone")  !!}">
                    <label class="form-label">{!! trans("admin_user.form.phone") !!}</label>
                </div>
            </div>
    </div>

    <div class="col-md-4">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" id="address" name="address" class="form-control" 
                            value="{!! old("address")  !!}">
                    <label class="form-label">{!! trans("admin_user.form.address") !!}</label>
                </div>
            </div>
    </div>
   
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <p> </p>
            <input type="checkbox" id="active" name="active"
                   value="1" {!! !empty($user) && $user->active ? "checked" : null !!}>
            <label for="active">{!! trans("admin_user.form.active") !!}</label>
        </div>
    </div>
</div>

