<div class="row">
    <div class="col-md-4">
        <p>{!! trans("admin_product.form.natures") !!}</p>
        <div class="form-group">
            <select name="natures[]" id="natures" class="form-control" multiple style="width: 100%">
               
                    <option>
                    <li>a</li>
                    <li>a</li> 
                    <li>a</li>  
                    </option>
                
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_product.form.brand") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="brand_id" class="form-control">
                    <option value="">---</option>
                    <option>
                    <li>a</li>
                    <li>a</li> 
                    <li>a</li>  
                    </option>
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
                    <option>
                    <li>a</li>
                    <li>a</li> 
                    <li>a</li>  
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <p>{!! trans("admin_product.form.size") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="size_id" class="form-control">
                    <option value="">---</option>
                    <option>
                    <li>a</li>
                    <li>a</li> 
                    <li>a</li>  
                    </option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_product.form.surface") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="surface_id" class="form-control">
                    <option value="">---</option>
                    <option>
                    <li>a</li>
                    <li>a</li> 
                    <li>a</li>  
                    </option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_product.form.collection") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="collection_id" class="form-control">
                    <option value="">---</option>
                    <option>
                    <li>a</li>
                    <li>a</li> 
                    <li>a</li>  
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <p>{!! trans("admin_product.form.color") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="color_id" class="form-control">
                    <option value="">---</option>
                    <option>
                    <li>a</li>
                    <li>a</li> 
                    <li>a</li>  
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" class="form-control" name="weight"  value="{!! !empty($product) ? $product->weight : old("weight") !!}">
                <label class="form-label">{!! trans("admin_product.form.weight") !!}</label>
            </div>
        </div>
    </div>

</div>




