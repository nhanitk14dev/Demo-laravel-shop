<div class="modal fade in" id="modal-delete-record" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-red">
            <form action="" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Delete item</h4>
                </div>
                <div class="modal-body">
                    <p id="delete-record-name"></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">{!! trans("button.delete") !!}</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">{!! trans("button.close") !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    jQuery(function ($) {
        $("body").on("click", ".btn-delete-record", function (event) {
            event.stopPropagation();
            event.preventDefault();
            var _this = $(this);
            var action = _this.data("url");
            if(!action){
                $("#modal-delete-record").modal("hide");
                return false;
            }
            var title = _this.data("title");
            $("#modal-delete-record").find("form").attr("action", action);
            $("#delete-record-name").html(title);
            $("#modal-delete-record").modal("show");
        });

        $('#modal-delete-record').on('hidden.bs.modal', function (e) {
            $("#delete-record-name").html("");
            $("#modal-delete-record").find("form").attr("action", "");
        })
    });
</script>