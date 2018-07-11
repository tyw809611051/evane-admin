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

  <body class="off-canvas-sidebar">
    
        
        <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white" id="navigation-example">
	<div class="container">
    <div class="navbar-wrapper">
    
			<a class="navbar-brand" href="#pablo">Login Page</a>
		</div>
 
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper wrapper-full-page">
          

<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('img/login.jpg'); background-size: cover; background-position: top center;">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="container">
    <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
      <form class="form" method="post" action="/verify">
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
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="Email...">
                {{ csrf_field() }}
              </div>
            </span>
            <span class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Password...">
              </div>
            </span>
          </div>
          <div class="card-footer justify-content-center">
            <button href="" class="btn btn-rose btn-link btn-lg">Lets Go</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <footer class="footer" >
    <div class="container">

        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="ww.admin.evane.com" target="_blank">Evane</a> for back-stage management .
        </div>
    </div>
</footer>

</div>         
</div>



<!--   Core JS Files   -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/login.js"></script>

<script>
  $(document).ready(function(){
    demo.checkFullPageBackgroundImage();setTimeout(function(){
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);});
</script>


</body>

</html>
