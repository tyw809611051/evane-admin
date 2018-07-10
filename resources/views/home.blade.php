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
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}" />

<!-- CSS Files -->
<link href="{{ asset('css/material.css') }}" rel="stylesheet" />

</head>

  <body class="">

    <div class="wrapper ">
          
      <div class="sidebar" data-color="green" data-background-color="black" data-image="img/sidebar-1.jpg">

        <div class="logo">
          <a href="" class="simple-text logo-mini">
             
          </a>
          <a href="http://www.admin.evane.com/" class="simple-text logo-normal">
             EVANE后台管理
          </a>
        </div>

        <div class="sidebar-wrapper">
        
          <div class="user">
            <div class="photo">
                <img src="img/avatar.jpg" />
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
                <a class="nav-link" href="http://www.admin.evane.com/">
                    <i class="material-icons">dashboard</i>
                    <p> 工作台 </p>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesExamples" aria-expanded="false">
                    <i class="material-icons">image</i>
                    <p> Pages 
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                              <span class="sidebar-mini"> P </span>
                              <span class="sidebar-normal"> Pricing </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/rtl.html">
                              <span class="sidebar-mini"> RS </span>
                              <span class="sidebar-normal"> RTL Support </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/timeline.html">
                              <span class="sidebar-mini"> T </span>
                              <span class="sidebar-normal"> Timeline </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/login.html">
                              <span class="sidebar-mini"> LP </span>
                              <span class="sidebar-normal"> Login Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/register.html">
                              <span class="sidebar-mini"> RP </span>
                              <span class="sidebar-normal"> Register Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/lock.html">
                              <span class="sidebar-mini"> LSP </span>
                              <span class="sidebar-normal"> Lock Screen Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/user.html">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal"> User Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        
        </ul>
        </div>
      </div>


      <div class="main-panel">
              <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
	        <div class="container-fluid">
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
	</div>
</nav>
<!-- End Navbar -->
         
<div class="content">
  <div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">weekend</i>
          </div>
          <p class="card-category">Bookings</p>
          <h3 class="card-title">184</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-danger">warning</i>
            <a href="#pablo">Get More Space...</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons"></i>
            </div>
            <h4 class="card-title">Global Sales by Top Locations</h4>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-6">
                <div class="table-responsive table-sales">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="flag">
                            <img src="img/us.png" </div>
                        </td>
                        <td>USA</td>
                        <td class="text-right">
                          2.920
                        </td>
                        <td class="text-right">
                          53.23%
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  </div>
                  <div class="col-md-6 ml-auto mr-auto">
                    <div id="worldMap" style="height: 300px;"></div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

<footer class="footer" >
    <div class="container-fluid">
        <nav class="float-left">
          <ul>
              <li>
                  <a href="https://www.creative-tim.com">
                      Creative Tim
                  </a>
              </li>
              <li>
                  <a href="https://creative-tim.com/presentation">
                      About Us
                  </a>
              </li>
              <li>
                  <a href="http://blog.creative-tim.com">
                      Blog
                  </a>
              </li>
              <li>
                  <a href="https://www.creative-tim.com/license">
                      Licenses
                  </a>
              </li>
          </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
    </div>
</footer>         
 </div>       
 </div>
    
<!--   Core JS Files   -->
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-material-design.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/material-dashboard.min.js') }}" type="text/javascript"></script>

<script>

</script>


</body>
</html>
