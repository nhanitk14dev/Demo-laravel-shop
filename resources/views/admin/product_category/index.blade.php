@extends("admin.layouts.master")


@section("style")
    <link rel="stylesheet" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
@endsection


@section("content")
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="{!! route("admin.product_category.create") !!}" class="btn btn-info waves-effect pull-right">
                    <i class="material-icons">add</i>
                    <span>{!! trans("button.create") !!}</span>
                </a>
                <h2>
                    {!! trans("admin_product_category.list") !!}
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="body">

                @include("admin.layouts.partials.message")

                <div class="table-tree">
                    {!! $out_put ? $out_put : '<div class="alert alert-info" role="alert">'.trans("admin_message.no_data").'</div>' !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
    @include("admin.layouts.partials.modal-delete")

    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/product_category.index.js"></script>
@endsection