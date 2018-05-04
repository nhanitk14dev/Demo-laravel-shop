<div class="row clearfix">
    <input type="hidden" name="branches" id="default_branches" value="{{ implode(',', $branches) }}" />
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <table id="datatable" class="table table-bordered table-striped table-hover dataTable"
                        style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40">{!! trans("admin_branch.table.id") !!}</th>
                            <th>{!! trans("admin_branch.table.short_name") !!}</th>
                            <th>{!! trans("admin_branch.table.category") !!}</th>
                            <th>{!! trans("admin_branch.table.region") !!}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>