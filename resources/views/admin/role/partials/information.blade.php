<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="name"
                       value="{!! !empty($role) ? $role->name : old("name") !!}">
                <label class="form-label">{!! trans("admin_role.form.name") !!}</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" class="form-control" name="level"
                       value="{!! !empty($role) ? $role->level : old("level") !!}">
                <label class="form-label">{!! trans("admin_role.form.level") !!}</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input readonly type="text" class="form-control" name="slug"
                       value="{!! !empty($role) ? $role->slug : old("slug") !!}">
                <label class="form-label">{!! trans("admin_role.form.slug") !!}</label>
            </div>
        </div>
    </div>
</div>