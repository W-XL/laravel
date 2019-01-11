<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon_1.ico')}}">
    <title>后台管理</title>
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
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.13/clipboard.min.js')}}"></script>-->
    <script src="{{ asset('assets/js/clipboard.min.js')}}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js')}}"></script>
</head>
<style>
    .m-name{
        display: none !important;
    }
    @media (max-width: 767px) {
        .container {
            padding:unset;
        }
        .m-name{
            display: block !important;
        }
        .pc-name{
            display: none !important;
        }
    }
</style>
<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">
    {{--@if (Session::get('is_online') == 1)--}}
    {{--<button data-action="modal" class="btn btn-default" style="display: none;" id="service_online" href="business.php?act=service_online"></button>--}}
    {{--@endif--}}
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center"><a href="/" class="logo">niu</a></div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="md md-menu"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a href="#" class="waves-effect">预留</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">预留 <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-animate">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form role="search" class="navbar-left app-search pull-left hidden-xs">
                        <input type="text" placeholder="预留..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                    <ul class="nav navbar-nav navbar-right pull-left">
                        <li class="dropdown m-name">
                            <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true">{$smarty.session.real_name}</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <!--<li class="dropdown hidden-xs">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-bell-o"></i> <span class="badge badge-xs badge-danger">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-animate drop-menu-right dropdown-menu-lg">
                                <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                <li class="list-group nicescroll notification-list">
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-diamond noti-primary"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-cog noti-warning"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">New settings</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-bell-o noti-custom"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">Updates</h5>
                                                <p class="m-0">
                                                    <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-user-plus noti-pink"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">New user registered</h5>
                                                <p class="m-0">
                                                    <small>You have 10 unread messages</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-diamond noti-primary"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-cog noti-warning"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">New settings</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="list-group-item text-right">
                                        <small class="font-600">See all notifications</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" class="right-bar-toggle waves-effect"><i class="fa fa-cog"></i></a>
                        </li>-->
                        <li class="dropdown pc-name" >
                            <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true">{{ Session::get('real_name') }}</a>
                        </li>
                        <li><a href="/logout">退出</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    @foreach (session('menu_list') as $menu)
                    <li class='text-muted menu-title'><i class='md md-menu'></i>{{$menu['name']}}</li>
                        @foreach ($menu['p_menu'] as $p_menu)
                    <li class="has_sub">
                        <a href="#" class="waves-light" data-url="{{$p_menu['url']}}"><span>{{$p_menu['name']}}</span></a>
                        @if($p_menu['c_menu'])
                        <ul class="list-unstyled">
                            @foreach ($p_menu['c_menu'] as $c_menu)
                            <li><a data-id="{{$c_menu['id']}}" data-pid="{{$c_menu['pid']}}" data-url="{{$c_menu['url']}}" data-tabid="{{$c_menu['tabid']}}" href="{{$c_menu['url']}}">{{$c_menu['name']}}</a></li>
                                @endforeach
                        </ul>
                        @endif
                    </li>
                        @endforeach
                    @endforeach
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content"><div class="container" id="main_data">welcome</div></div> <!-- content -->
    </div>

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    <!-- Right Sidebar -->
    <div class="side-bar right-bar nicescroll"></div>
    <!-- /Right-bar -->
</div>
<!-- END wrapper -->
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

<script src="{{ asset('assets/plugins/jquery-form/jquery.form.js')}}"></script>
<script src="{{ asset('assets/plugins/notifyjs/dist/notify.min.js')}}"></script>
<script src="{{ asset('assets/plugins/notifications/notify-metro.js')}}"></script>

<script src="{{ asset('assets/js/jquery.core.js')}}"></script>
<script src="{{ asset('assets/js/jquery.app.js')}}"></script>
<script src="{{ asset('assets/js/index.js?t=11')}}"></script>
<script>
    var group_id = "{$smarty.session.group_id}";
    $(document).ready(function(){
        if(group_id == 2 || group_id == 3) {
            $("#service_online").click();
        }
    });
</script>
@include('default.include.modal')
<input type="hidden" id="main_data_url" name="main_data_url" value="test" />
</body>
</html>