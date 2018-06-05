<ul id="photos-template" class="hidden">
    <li class="disable-sort-item">
        <div class="box-image">
            <img src="IMAGE_BASE64" alt="photo" />
            <button type="button"
                    class="btn_delete_this"
                    data-parent="li"
                    data-multi="1">
                <i class="glyphicon glyphicon-remove"></i>
            </button>
        </div>
        <input type="hidden" name="INPUT_NAME" value="INPUT_VALUE">
    </li>
</ul>

<div id="photo-template" class="hidden">
    <div class="out-image">
        <img src="IMAGE_BASE64" alt="photo" />
        <input type="hidden" name="INPUT_NAME" value="INPUT_VALUE">
        <button class="btn_delete_this"
                data-name="delete_logo"
                data-value=""
                data-multi=""
                data-parent=".single-upload">
            <span class="glyphicon glyphicon-remove"></span>
        </button>
    </div>
</div>

<div id="catalogue-template" class="hidden">
    <div class="catalogue-item">
        <button type="button" class="btn btn-danger btn-delete btn_delete_this" data-parent=".catalogue-item" data-name="" data-value="" data-multi="true">
            <i class="material-icons">delete</i>
        </button>

        <div class="row">
            <div class="col-md-4">
                <p><?php echo trans("admin_catalogue.form.image"); ?></p>
                <div class="form-group">
                    <div class="wrap-input-file">
                        <label>
                            <i class="material-icons">file_upload</i>
                            <input type="file" class="input-file basic_upload_file" name="catalogue[YEUHOA][image]"
                                   accept="image/*"
                                   size="40">
                            &nbsp;
                            <span><?php echo trans("admin_catalogue.form.label_image"); ?></span>
                        </label>
                        <div class="upload-file-info"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p><?php echo trans("admin_catalogue.form.upload_file"); ?> English</p>
                <div class="form-group">
                    <div class="wrap-input-file">
                        <label>
                            <i class="material-icons">file_upload</i>
                            <input type="file" class="input-file basic_upload_file" name="catalogue[YEUHOA][en][file]"
                                   accept=".pdf"
                                   size="40">
                            &nbsp;
                            <span><?php echo trans("admin_catalogue.form.label_upload_file"); ?></span>
                        </label>
                        <div class="upload-file-info"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p><?php echo trans("admin_catalogue.form.upload_file"); ?> Vietnamese</p>
                <div class="form-group">
                    <div class="wrap-input-file">
                        <label>
                            <i class="material-icons">file_upload</i>
                            <input type="file" class="input-file basic_upload_file" name="catalogue[YEUHOA][vi][file]"
                                   accept=".pdf"
                                   size="40">
                            &nbsp;
                            <span><?php echo trans("admin_catalogue.form.label_upload_file"); ?></span>
                        </label>
                        <div class="upload-file-info"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="card-inside-title">English</h2>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="catalogue[YEUHOA][en][name]" class="form-control">
                        <label class="form-label"><?php echo trans("admin_catalogue.form.name"); ?></label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="card-inside-title">Vietnamese</h2>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" name="catalogue[YEUHOA][vi][name]" class="form-control">
                        <label class="form-label"><?php echo trans("admin_catalogue.form.name"); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(function ($) {
        $('.btn_add_catalogue').click(function (e) {
            var _this = $(this);
            var append = _this.attr('append');
            var random = Math.random().toString(36).slice(2);
            var template = $("#catalogue-template").html();
            $(append).append(template.replace(/YEUHOA/g, random));
            return false;
        });
    });
</script>