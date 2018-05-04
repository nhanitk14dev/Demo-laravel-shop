@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.product.datatable') }}"/>
@endsection

@section("style")
    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>
@endsection


@section("content")
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="{!! route("admin.product.create") !!}" class="btn btn-info waves-effect pull-right">
                    <i class="material-icons">add</i>
                    <span>{!! trans("button.create") !!}</span>
                </a>
                <h2>
                    {!! trans("admin_product.list") !!}
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="body">

                <div class="row hidden">
                    <div class="col-sm-7 hidden-xs"></div>
                    <div class="col-xs-10 col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" id="code" placeholder="{{ trans('admin_product.form.code') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-1">
                        <button type="button" class="btn btn-primary" id="btn_search">{{ trans('button.search') }}</button>
                    </div>
                </div>

                @include("admin.layouts.partials.message")

                <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40">{!! trans("admin_product.table.id") !!}</th>
                        <th>{!! trans("admin_product.table.name") !!}</th>
                        <th>{!! trans("admin_product.table.image") !!}</th>
                        <th width="150">{!! trans("admin_product.table.action") !!}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
    @include("admin.layouts.partials.modal-delete")

    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>


    <script type="text/javascript" src="/assets/admin/js/pages/product.index.js"></script>
@endsection