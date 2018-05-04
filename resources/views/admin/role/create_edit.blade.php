@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
    <!--select 2 plugin-->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include("admin.layouts.partials.message")
                    @if(!empty($role))
                    <form  id="form-form" method="post" action="{!! route("admin.role.update", $role->id) !!}"
                           enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @else

                    <form  id="form-form" method="post" action="{!! route("admin.role.store") !!}"
                          enctype="multipart/form-data">
                        @endif

                        {{ csrf_field() }}
                        <!-- Nav tabs -->

                        @include("admin.role.partials.tab")

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="information">
                                <p> </p>
                                @include("admin.role.partials.information")
                            </div>

                            <div role="tabpanel" class="tab-pane fade " id="permission">
                                @include("admin.role.partials.permission")
                            </div>
                        </div>

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.role.index")
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/role.create.js?v=1.0"></script>
@endsection