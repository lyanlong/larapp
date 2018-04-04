<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>larapp后台管理系统</title>
    <meta name="keywords" content="侧边导航菜单(可分组折叠)">
    <meta name="description" content="侧边导航菜单(可分组折叠)"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- Bootstrap3.3.5 CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .panel-group {
            max-height: 770px;
            overflow: auto;
        }

        .leftMenu {
            margin: 10px;
            margin-top: 5px;
        }

        .leftMenu .panel-heading {
            font-size: 14px;
            padding-left: 20px;
            height: 36px;
            line-height: 36px;
            color: white;
            position: relative;
            cursor: pointer;
        }

        /*转成手形图标*/
        .leftMenu .panel-heading span {
            position: absolute;
            right: 10px;
            top: 12px;
        }

        .leftMenu .menu-item-left {
            padding: 2px;
            background: transparent;
            border: 1px solid transparent;
            border-radius: 6px;
        }

        .leftMenu .menu-item-left:hover {
            background: #C4E3F3;
            border: 1px solid #1E90FF;
        }
        .admin-content{
            margin: 30px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">前台首页</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('admin/tag')}}">标签管理</a></li>
            <li><a href="{{url('admin/video')}}">视频管理</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="{{url('admin/userInfo')}}" class="dropdown-toggle"
                   data-toggle="dropdown">{{Auth::guard('admin')->user()->username}} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('admin/changePassword')}}">修改密码</a></li>
                    <li><a href="{{url('admin/logout')}}">退出</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<div class="row">
    <div class="col-md-2">
        <div class="panel-group table-responsive" role="tablist">
            <div class="panel panel-primary leftMenu">
                <!-- 利用data-target指定要折叠的分组列表 -->
                <div class="panel-heading" id="collapseListGroupHeading1" data-toggle="collapse"
                     data-target="#collapseListGroup1" role="tab">
                    <h4 class="panel-title">
                        系统管理
                        <span class="glyphicon glyphicon-chevron-up right"></span>
                    </h4>
                </div>
                <!-- .panel-collapse和.collapse标明折叠元素 .in表示要显示出来 -->
                <div id="collapseListGroup1" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="collapseListGroupHeading1">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <!-- 利用data-target指定URL -->
                            <button class="menu-item-left" data-target="{{url('admin/changePassword')}}">
                                <span class="glyphicon glyphicon-triangle-right"></span>个人信息
                            </button>
                        </li>
                    </ul>
                </div>
            </div><!--panel end-->
            <div class="panel panel-primary leftMenu">
                <div class="panel-heading" id="collapseListGroupHeading2" data-toggle="collapse"
                     data-target="#collapseListGroup2" role="tab">
                    <h4 class="panel-title">
                        标签管理
                        <span class="glyphicon glyphicon-chevron-down right"></span>
                    </h4>
                </div>
                <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="collapseListGroupHeading2">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <button class="menu-item-left" data-target="{{url('admin/tag')}}">
                                <span class="glyphicon glyphicon-triangle-right"></span>标签列表
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-primary leftMenu">
                <div class="panel-heading" id="collapseListGroupHeading3" data-toggle="collapse"
                     data-target="#collapseListGroup3" role="tab">
                    <h4 class="panel-title">
                        视频管理
                        <span class="glyphicon glyphicon-chevron-down right"></span>
                    </h4>
                </div>
                <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="collapseListGroupHeading3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <button class="menu-item-left" data-target="{{url('admin/video')}}">
                                <span class="glyphicon glyphicon-triangle-right"></span>视频列表
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js "></script>
    <div class="col-md-10">
        @yield('content')
    </div>
</div>
<!-- jQuery1.11.3 (necessary for Bo otstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
@include('admin.layouts.error1')
@include('flash::message')
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.menu-item-left').bind('click',function(){
            window.location.href = $(this).attr('data-target');
        });

        $(".panel-heading").click(function (e) {
            /*切换折叠指示图标*/
            $(this).find("span").toggleClass("glyphicon-chevron-down");
            $(this).find("span").toggleClass("glyphicon-chevron-up");
        });
    });
</script>
</body>

</html>