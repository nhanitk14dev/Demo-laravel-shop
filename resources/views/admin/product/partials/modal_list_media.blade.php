<div class="modal fade" id="modal_list_medias" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-bold">{{ trans('admin_product.select_media') }}</h3>
            </div>
            <div class="modal-body">
                <style>
                    #list_medias tbody tr td:last-child, tbody tr th:last-child
                    {
                        width: 100px !important;
                        max-width: 100px !important;
                    }
                </style>
                <div class="row">
                    
                <table id="list_medias" class="table table-striped table-hover dataTable" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40">{!! trans("admin_media.table.id") !!}</th>
                        <th>{!! trans("admin_media.table.name") !!}</th>
                        <th>{!! trans("admin_media.table.image") !!}</th>
                        <th>{!! trans("admin_media.table.file_size") !!}</th>
                        <th width="130">{!! trans("admin_media.table.action") !!}</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn waves-effect waves-light" data-dismiss="modal">{{ trans('button.close') }}</button>
            </div>
        </div>
    </div>
</div>