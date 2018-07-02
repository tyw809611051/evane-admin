
<!DOCTYPE html>
<html>
<head>
    <title>Login 2 | Admire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="css/app.css">
    <style>
        * { margin: 0; padding: 0; }
        html { height: 100%; }
        body { height: 100%; background: #fff url(img/bag.jpg) 50% 50% no-repeat; background-size: cover;}
        .login_box { position: absolute; left: 50%; top: 50%; width: 430px; height: 550px; margin: -300px 0 0 -215px; border: 1px solid #fff; border-radius: 20px; overflow: hidden;}
        .logo { width: 104px; height: 104px; margin: 50px auto 80px; background: url(img/login.png) 0 0 no-repeat; }
        .form-item { position: relative; width: 360px; margin: 0 auto; padding-bottom: 30px;}
        .form-item input { width: 288px; height: 48px; margin-left: 70px; border: 1px solid #fff; border-radius: 25px; font-size: 18px; color: #fff; background-color: transparent; outline: none; text-alian:center;}
        .form-item button { width: 360px; height: 50px; border: 0; border-radius: 25px; font-size: 18px; color: #1f6f4a; outline: none; cursor: pointer; background-color: #fff; margin-left:40px;}
        #username { background: url(img/phone.png) 32px 32px no-repeat; }
        #password { background: url(img/password.png) 32px 32px no-repeat; }
        .login_box ::-webkit-input-placeholder { font-size: 18px; line-height: 1.4; color: #fff;}
        .login_box :-moz-placeholder { font-size: 18px; line-height: 1.4; color: #fff;}
        .login_box ::-moz-placeholder { font-size: 18px; line-height: 1.4; color: #fff;}
        .login_box :-ms-input-placeholder { font-size: 18px; line-height: 1.4; color: #fff;}
    </style>
</head>
<body class="login_background">
<div class="container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="login_box"> 
        <div class="logo">
        </div>
        <div class="row">
            <div class="col form-item ">
                <input id="username" type="text" autocomplete="off" placeholder="邮箱">
                <!-- <p class="tip">请输入合法的邮箱地址</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col form-item">
                <input id="password" type="password" autocomplete="off" placeholder="登录密码">
            </div>
        </div>
        <div class="row">
            <div class="col form-item">
                <button id="submit">登 录</button>
            </div>
        </div>
    </div>

</div>
<!-- global js -->
<script type="text/javascript" src="js/app.js"></script>


</body>

</html>