
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../../assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>
    EVANE后台管理
</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />


<!--  Social tags      -->
<meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, material design, material dashboard bootstrap 4 dashboard">
<meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">

<!-- Open Graph data -->

<!--     Fonts and icons     -->

<!-- CSS Files -->

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
    * {
        margin:0;
        padding:0;
    }
    html {
        font-family:sans-serif;line-height:1.15;-webkit-text-size-adjust:100%;
        -ms-text-size-adjust:100%;-ms-overflow-style:scrollbar;
        -webkit-tap-highlight-color:transparent;
    }
    .off-canvas-sidebar {
        background-image:url("{{ asset('img/login.jpg') }}");
        background-size:cover;
        background-position:top center;
        width:100%;
    }
    .login-page >.container {
        border:1px solid red;
        /* margin:50% auto; */
        z-index:10;
    }
</style>
</head>

<body class="off-canvas-sidebar">
    
        <!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white" id="navigation-example">
	<div class="container">
    <div class="navbar-wrapper">
			<a class="navbar-brand" href="#pablo">Login Page</a>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
      <span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>

	    <div class="collapse navbar-collapse justify-content-end">

	    </div>
	</div>
</nav> -->
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">

<div class="page-header login-page header-filter">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="container">
    <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
      <form class="form" method="" action="">
        <div class="card card-login card-hidden">
          <div class="card-header card-header-rose text-center">
            <h4 class="card-title">Login</h4>
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">Or Be Classical</p>
            <span class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="First Name...">
              </div>
            </span>
            <span class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" class="form-control" placeholder="Email...">
              </div>
            </span>
            <span class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" class="form-control" placeholder="Password...">
              </div>
            </span>
          </div>
          <div class="card-footer justify-content-center">
            <a href="#pablo" class="btn btn-rose btn-link btn-lg">Lets Go</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <footer class="footer" >
    <div class="container">
        <nav class="float-left">

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
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>