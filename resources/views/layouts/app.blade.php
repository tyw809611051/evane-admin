<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icon.jpg') }}">
<link rel="icon" type="image/jpg" href="{{ asset('img/icon.jpg') }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>
    EVANE
</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<!-- Extra details for Live View on GitHub Pages -->
<!-- Canonical SEO -->

<!--  Social tags      -->
<!-- <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, material design, material dashboard bootstrap 4 dashboard">
<meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design."> -->
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="evane">
<meta itemprop="description" content="manager">

<!-- Twitter Card data -->
<!-- Open Graph data -->
@section('stylesheet')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}" />

<!-- CSS Files -->
<link href="{{ asset('css/material.css') }}" rel="stylesheet" />
@show
</head>

<body class="">

<div class="wrapper ">
          <!-- 左侧导航 -->
  <div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('img/sidebar-1.jpg') }}">
  @section('sidebar')
    <div class="logo">
    <a href="" class="simple-text logo-mini">

        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
             EVANE后台管理
        </a>
    </div>

    <div class="sidebar-wrapper">
        
        <div class="user">
            <div class="photo">
                <img src="{{ asset('img/avatar.jpg') }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                       静爷
        
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item active ">
                <a class="nav-link" href="../examples/dashboard.html">
                    <i class="material-icons">dashboard</i>
                    <p> 网站统计 </p>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#articleExamples">
                    <i class="material-icons">book</i>
                    <p> 文章管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="articleExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('article/add')}}">
                              <span class="sidebar-mini"> 新 </span>
                              <span class="sidebar-normal"> 新的文章 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('article/index')}}">
                              <span class="sidebar-mini"> 文章 </span>
                              <span class="sidebar-normal"> 文章管理 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('category/index')}}">
                              <span class="sidebar-mini"> 分类 </span>
                              <span class="sidebar-normal"> 分类管理 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('feature/index')}}">
                              <span class="sidebar-mini"> 版块 </span>
                              <span class="sidebar-normal"> 版块管理 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#commentExamples">
                    <i class="material-icons">comment</i>
                    <p> 评论管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="commentExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 评 </span>
                              <span class="sidebar-normal"> 评论列表 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#messageExamples">
                    <i class="material-icons">message</i>
                    <p> 留言管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="messageExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 留 </span>
                              <span class="sidebar-normal"> 留言列表 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#memberExamples">
                    <i class="material-icons">people_outline</i>
                    <p> 用户管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="memberExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 用 </span>
                              <span class="sidebar-normal"> 用户列表 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#aboutExamples">
                    <i class="material-icons">bubble_chart</i>
                    <p> 关于管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="aboutExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 角 </span>
                              <span class="sidebar-normal"> 角色管理 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 权 </span>
                              <span class="sidebar-normal"> 权限管理 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 操 </span>
                              <span class="sidebar-normal"> 操作记录 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 缓 </span>
                              <span class="sidebar-normal"> 缓存管理 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> 日 </span>
                              <span class="sidebar-normal"> 日志管理 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#systemExamples">
                    <i class="material-icons">settings_applications</i>
                    <p> 系统设置 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="systemExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> P </span>
                              <span class="sidebar-normal"> Pricing </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
  @show
  </div>

<!-- 顶部导航 -->
  <div class="main-panel">
              <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
    	<div class="container-fluid">
        @section('navbar')
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                  <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                  <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
    			<a class="navbar-brand" href="#pablo">Dashboard</a>
    		</div>

    		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
          <span class="sr-only">Toggle navigation</span>
    			<span class="navbar-toggler-icon icon-bar"></span>
    			<span class="navbar-toggler-icon icon-bar"></span>
    			<span class="navbar-toggler-icon icon-bar"></span>
    		</button>

    	  <div class="collapse navbar-collapse justify-content-end">       
          <form class="navbar-form">
              <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
              </div>
          </form>

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#pablo">
                <i class="material-icons">dashboard</i>
                <p class="d-lg-none d-md-block">
                  Stats
                </p>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">notifications</i>
                <span class="notification">5</span>
                <p class="d-lg-none d-md-block">
                  Some Actions
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                <a class="dropdown-item" href="#">Another Notification</a>
                <a class="dropdown-item" href="#">Another One</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#pablo">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
            </li>
          </ul> 
    	  </div>
          @show
    	</div>
    </nav>
<!-- End Navbar -->
<!-- 内容 -->

    <div class="content">

      @yield('content')

    </div>

    <footer class="footer" >
        <div class="container-fluid">
        @section('footer')
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com" target="_blank">Evane</a> for back-stage management.
            </div>
        @show
        </div>
    </footer>

               
  </div>
          
</div>
<!--   Core JS Files   -->
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
@section('javascript')
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-material-design.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/material-dashboard.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
@show
<script>

</script>


</body>
</html>
