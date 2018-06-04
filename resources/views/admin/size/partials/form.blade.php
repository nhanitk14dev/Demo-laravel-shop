
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="name"
                       value="{!! !empty($size) ? $size->name : old("name") !!}">
                <label class="form-label">{!! trans("admin_size.form.name") !!}</label>
            </div>
        </div>
    </div>

   <!--  <div class="col-md-6">
       <div class="form-group form-float">
           <div class="form-line">
               <input type="text" class="form-control" name="origin_size"
                      value="{!! !empty($size) ? $size->origin_size : old("origin_size") !!}">
               <label class="form-label">{!! trans("admin_size.form.size") !!}</label>
           </div>
       </div>
   </div> -->
</div>