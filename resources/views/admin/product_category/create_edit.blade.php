@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include("admin.layouts.partials.message")

                    @if(empty($category))
                        <form id="form-form" method="post" action="{!! route("admin.product_category.store") !!}"
                              enctype="multipart/form-data">
                    @else
                            <form id="form-form" method="post"
                                  action="{!! route("admin.product_category.update", $category->id) !!}"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                    @endif

                    {{ csrf_field() }}
                    <!-- Nav tabs -->
                    @include("admin.product_category.partials.tab")

                    <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="information">
                                @include("admin.product_category.partials.information")
                            </div>
                            
                            <div role="tabpanel" class="tab-pane fade" id="seo">
                                @include("admin.metadata.form")
                            </div>
                            
                        </div>

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.product_category.index")
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @include("admin.layouts.partials.upload_template")

    <script src="/assets/plugins/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/product_category.create.js?v=1.0"></script>
@endsection