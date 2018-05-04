@extends('frontend.layouts.master')

@section('title','Quên Mật Khẩu')

@section('content')

	<div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-3">
                    <div class="page-title">
                        <h1>Quên Mật Khẩu</h1>
                    </div>
                    <div class="row products">
                        <div class="col-md-9">
                            <form method="post" action='{{url("forget.html")}}'>
                                {{csrf_field()}}
                            <div class="content">
                                <h3 class="txt_login">Nhập email đăng ký</h3>
                                <ul class="forms">
                                    <li class="txt">
                                        Email <span class="req">*</span></li>
                                    </li>
                                    <li class="input-group inputfield">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="mail" class="form-control" placeholder="Nhập email">
                                    </li>
                                </ul>
                                <ul class="forms forms-Login">
                                    <li class="txt">&nbsp;</li>
                                    <li style="margin-left: 40px;"><button class="btn btn-danger" title="Login" type="submit">Login</button></li> 
                                </ul>
                            </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                @if(session('thongbao'))
                                    <p class="alert alert-danger">{{ session('thongbao') }}</p>
                                @endif
                                @if(count($errors) > 0)
                                    @foreach($errors->all() as $err)
                                        <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div><!-- /.product -->



                    <div style="margin-top:70px"></div>

                </div><!-- /.col-right -->
            </div>
        </div>
        </div><!-- /.main -->
@endsection