<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>evane</title>
    <style>
        .app {
            margin:0;
            padding:0;
            height:100%;
            width:100%;
        }
        .section {
            .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 2;
            width: 260px;
            box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
            background-image:url("{{ asset('img/login.jpg') }}");
        }
        .container {
            /* background-color:black; */
            color:white;
            text-align:center;
        }
        .row{
            margin-top:30px;
            padding-left:80px;
        }

    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app">
        <!-- 左侧导航 -->
        <div class="section">
            <span>1</span>
            <div class="container">
                <div class="row">
                    <span>Dashborad</span>
                </div>
                <div class="row">
                    <span>pages</span>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
