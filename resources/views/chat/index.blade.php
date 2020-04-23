@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
{{-- 标题部分--}}
        <div class="row">
            <div class="col align-self-start">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
{{--        聊天内容--}}

{{--        输入框--}}
        <div class="row">
            <div class="col align-self-start">
                <textarea name="content" id="articleContent" cols="30" rows="100" required></textarea>
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
                height: 100,
                language:'zh_CN',

            });
        });
    </script>
@stop