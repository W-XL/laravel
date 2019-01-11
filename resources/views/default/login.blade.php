<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>系统登录</title>
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/core.css?t=11')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('assets/js/modernizr.min.js')}}"></script>
    @verbatim
    <script type="text/javascript">
        var COOKIE_NAME = 'sys__username';
    </script>
    @endverbatim
</head>
<body>
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center">登入<strong class="text-custom">后台</strong> </h3>
        </div>
        <div class="panel-body">
            <div style="color:red">{{ Session::get('login_error_msg') }}</div>
            <form class="form-horizontal m-t-20" action="/do_login" method="post">
                {{csrf_field()}}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="account" class="form-control" type="text" required="" placeholder="用户名">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="user_pwd" class="form-control" type="password" required="" placeholder="密码">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input name="is_remember" id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">记住我</label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">登入</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/detect.js')}}"></script>
<script src="{{ asset('assets/js/fastclick.js')}}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('assets/js/waves.js')}}"></script>
<script src="{{ asset('assets/js/wow.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.core.js')}}"></script>
<script src="{{ asset('assets/js/jquery.app.js')}}"></script>
</body>
</html>