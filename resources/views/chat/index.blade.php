@extends('layouts.app')
@section('stylesheet')
    @parent
    <style>
        #demo {
            position: relative;
            width: 800px;
            height: 400px;
            overflow: auto;
        }

        .scrollbar {
            margin-left: 30px;
            float: left;
            height: 300px;
            width: 65px;
            background: #fff;
            overflow-y: scroll;
            margin-bottom: 25px;
        }
        .force-overflow {
            min-height: 450px;
        }

        .scrollbar-primary::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5; }

        .scrollbar-primary::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #4285F4; }

        .scrollbar-danger::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; }

        .scrollbar-danger::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5; }

        .scrollbar-danger::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #ff3547; }

        .scrollbar-warning::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; }

        .scrollbar-warning::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5; }

        .scrollbar-warning::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #FF8800; }

        .scrollbar-success::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; }

        .scrollbar-success::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5; }

        .scrollbar-success::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #00C851; }

        .scrollbar-info::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; }

        .scrollbar-info::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5; }

        .scrollbar-info::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #33b5e5; }

        .scrollbar-default::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; }

        .scrollbar-default::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5; }

        .scrollbar-default::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #2BBBAD; }

        .scrollbar-secondary::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; }

        .scrollbar-secondary::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5; }

        .scrollbar-secondary::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #aa66cc; }
    </style>
@stop
@section('content')
<div class="content">
    <div class="container" >
{{-- 标题部分--}}
        <div class="row" style="height: 55px;">
            <div class="col align-self-start">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
{{--        聊天内容--}}
        <div class="row mt-8 justify-content-center" style="width: 100%;">
            <div class="scrollbar scrollbar-primary" style="width: 100%;">
                <div class="force-overflow">
                    <section class="container" id="chatRecord">
                        <div class="row justify-content-around">
                            <div class="col-10">
                                你好
                            </div>
                        </div>
                        <div class="row justify-content-around">
                            <div class="col-10"></div>
                            <div class="col-2">您好！</div>
                        </div>
                    </section>
                </div>
            </div>

        </div>

{{--        输入框--}}
        <div class="row">
            <div class="col ">
                <form class="" action="" onsubmit="return false;">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bmd-label-floating">输入文字</label>
                        <input type="text" class="form-control" id="enterWord">
                    </div>
                    <span class="form-group bmd-form-group "> <!-- needed to match padding for floating labels -->
                        <button type="submit" class="btn btn-primary" id="sendMsg">发送消息</button>
                    </span>
                </form>
            </div>

        </div>
    </div>
</div>
@stop

@section('javascript')
    @parent
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            // Initialise the wizard

            tinymce.init({
                selector: '#articleContent',
                mode : "textareas",
                height: 10,
                language:'zh_CN',

            });
            // 连接服务器
            ws = new WebSocket("ws://127.0.0.1:2346");
            $('#sendMsg').click(function () {
                var enterword  = $('#enterWord').val();
                if (enterword.length == 0) {
                    return false;
                }
                ws.onopen = function() {
                    ws . send('{"mode":"say","order_id":"21",type:1,"content":"'+ enterword +'","user_id":21}');
                };
                $('#chatRecord').append(
                    '<div class="row justify-content-around">\n' +
                    '                            <div class="col-10">'+ enterword +
                    '                            </div>\n' +
                    '                        </div>'
                );
                ws.onmessage = function(e) {
                    console.log("收到服务端的消息：" + e.data);
                    $('#chatRecord').append(
                    '<div class="row justify-content-around"><div class="col-10"></div><div class="col-2">'+ e.data +'</div></div>'
                    );
                };
            });
        });

        const demo = document.querySelector('#demo');
        const ps = new PerfectScrollbar(demo);

        // Handle size change
        // 提交信息


    </script>
@stop