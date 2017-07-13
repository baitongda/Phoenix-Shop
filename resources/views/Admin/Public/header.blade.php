<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Phoenix管理后台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
 	<link href="{{URL::asset('bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{URL::asset('dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{URL::asset('plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->   
    <!-- jQuery 2.1.4 -->
    <script src="{{URL::asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	<script src="{{URL::asset('js/global.js')}}"></script>
    <script src="{{URL::asset('js/upgrade.js')}}"></script>
	<script src="{{URL::asset('js/layer/layer.js')}}"></script><!--弹窗js 参考文档 http://layer.layui.com/-->
    <style type="text/css">
    	#riframe{min-height:inherit !important}
    </style>
  </head>
<body class="skin-green-light sidebar-mini" style="overflow-y:hidden;">
<div class="wrapper">
  <header class="main-header">
      <!-- Logo -->
      <a href="{{url('admin/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{URL::asset('images/TP-shop_logo.png')}}" width="40" height="30">&nbsp;&nbsp;<b>Phoenix</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!--服务器升级-->
        <textarea id="textarea_upgrade" style="display:none;">{$upgradeMsg.1}</textarea>                              
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          {{--<if condition="$upgradeMsg[0] neq null">--}}
               {{--<li>--}}
                  {{--<a href="javascript:void(0);" id="a_upgrade">--}}
                      {{--<i class="glyphicon glyphicon-upload"></i>--}}
                      {{--<span  style="color:#FF0;">{$upgradeMsg.0}&nbsp;</span>--}}
                  {{--</a>--}}
               {{--</li>--}}
           {{--</if>--}}
          <!--  <li>
              <a href="http://www.tp-shop.cn/index.php/Doc/Index/index" target="_blank">
                  <i class="fa fa-question-circle"></i>
                  <span>TPshop手册</span>
              </a>
           </li> -->
           <!-- <li>
              <a href="http://document.thinkphp.cn/manual_3_2.html" target="_blank">
                  <i class="fa fa-question-circle"></i>
                  <span>ThinkPHP手册</span>
              </a>
           </li>     -->                  
           <li>
              <a href="/index.php" target="_blank">
                  <i class="glyphicon glyphicon-home"></i>
                  <span>网站前台</span>
              </a>
           </li>
           <!-- <li>
               <a target="rightContent" href="{:U('/Admin/System/cleanCache')}">
                   <i class="glyphicon glyphicon glyphicon-refresh"></i>
                   <span>清除缓存</span>
               </a>
           </li> -->      
           <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!--  <img src="__PUBLIC__/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                <i class="glyphicon glyphicon-user"></i>
                <span class="hidden-xs">欢迎：{{$admin->user_name}}</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-footer">
                  <div class="pull-left">
                  	<a href="{{url('/admin')}}" data-url="" class="btn btn-default btn-flat model-map">后台首页</a>
                   	<a href="{{url('/admin/pass')}}" target="rightContent" class="btn btn-default btn-flat">修改密码</a>
                   	<a href="{{url('/admin/quit')}}" class="btn btn-default btn-flat">安全退出</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-street-view"></i>换肤</a></li>
          </ul>
        </div>
     </nav>
</header>
    
<script>
    
// 没有点击收货确定的按钮让他自己收货确定    

var timestamp = Date.parse(new Date());
$.ajax({
            type:'post',
            url:"{:U('Admin/System/login_task')}",
            data:{timestamp:timestamp},
            timeout : 100000000, //超时时间设置，单位毫秒
            success:function(){
                // 执行定时任务
            }
        });    
</script>    
