<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label">{!! trans("admin_product.form.unit_price") !!}</label>
            <div class="form-line">
                <input type="text" class="form-control" name="unit_price"
                       value="{!! !empty($product) ? $product->unit_price : old("unit_price") !!}">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label">{!! trans("admin_product.form.promotion_price") !!}</label>
            <div class="form-line">
                <input type="text" class="form-control" name="promotion_price"
                       value="{!! !empty($product) ? $product->promotion_price : old("promotion_price") !!}">
            </div>
        </div>
    </div>

     <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label">{!! trans("admin_product.form.rating") !!}</label>
            <div class="form-line">
                <input type="number" class="form-control" name="rating" min="0" max="5" 
                       value="{!! !empty($product) ? $product->rating : 0 !!}">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <p>{!! trans("admin_product.form.size") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="size_id" id="size_id" class="form-control">
                    <option value="">---</option>
                    <option>
                        <li>M</li>
                        <li>L</li>  
                    </option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_product.form.color") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="color_id" id="color_id" class="form-control">
                    <option value="">---</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_product.form.producer") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="producer_id" class="form-control">
                    <option value="">---</option>
                    @if(!empty($producer))
                        @foreach($producers as $producer)
                            <option value="{!! $producer->id !!}" {!! !empty($product) && $product->producer_id ==  $producer->id ? "selected" : null !!}>
                                {!! $producer->code !!} / {!! $producer->name !!}
                            </option>
                        @endforeach
                    @else
                        <option value="">---Đang cập nhật---</option>
                    @endif

                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <label for="start_date">{!! trans('admin_product.form.start_date_promotion') !!}</label>
            <input type="text" class="form-control datepicker" id="start_date_promotion" name="start_date_promotion" data-date-format="{!! JS_DATE !!}" placeholder="dd-mm-yyyy">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <label for="end_date">{!! trans('admin_product.form.end_date_promotion') !!}</label>
            <input type="text" class="form-control datepicker" id="end_date_promotion" name="end_date_promotion" data-date-format="{!! JS_DATE !!}" placeholder="dd-mm-yyyy">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label">{!! trans("admin_product.form.unit") !!}</label>
            <div class="form-line">
                <input type="text" class="form-control" name="unit"
                       value="{!! !empty($product) ? $product->unit : old("unit") !!}">
            </div>
        </div>
    </div>
</div>





