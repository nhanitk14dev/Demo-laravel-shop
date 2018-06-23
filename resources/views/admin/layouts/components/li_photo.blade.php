<li data-id="{{ $photo_id ?? null }}">
    <div class="box-image">
        <img src="{{ $photo_path ?? null }}">
        <button type="button"
                class="btn_delete_this"
                data-parent="li"
                data-multi="1"
                data-name="{{ $input_delete ?? null }}"
                data-value="{{ $photo_id ?? null }}">
            <i class="glyphicon glyphicon-remove"></i>
        </button>
    </div>
</li>