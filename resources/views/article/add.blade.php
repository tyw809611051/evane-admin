@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="col-md-12 col-12 mr-auto ml-auto">
        <!--      Wizard container        -->
        <div class="wizard-container">
        <div class="card card-wizard" data-color="green" id="wizardProfile">
            <form action="add" method="post"  id="article">
            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
            <div class="card-header text-center">
                <h3 class="card-title">
                新增文章
                </h3>
                <h5 class="card-description">尽情展示你的才华吧.</h5>
            </div>
            <div class="wizard-navigation">
                <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                    基本信息
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                    文章内容
                    </a>
                </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                <div class="tab-pane active" id="about">
                    <!-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> -->
                    <div class="row justify-content-center">

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                            <img src="{{ asset('img/image_placeholder.jpg') }}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">选择图片</span>
                                <span class="fileinput-exists">重选</span>
                                <input type="file" name="picture" id="articlePicture" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> 删除</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            标题
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="articleTitle" class="bmd-label-floating">标题必填</label>
                            <input type="text" class="form-control" id="articleTitle" name="abctitle" required >
                            {{ csrf_field() }}
                        </div>
                        </div>
                        <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            作者
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="articleAuthor" class="bmd-label-floating">作者必填</label>
                            <input type="text" class="form-control" id="articleAuthor" name="author" required>
                        </div>
                        </div>
                        <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            摘要
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="articleExcprt" class="bmd-label-floating">默认为文章前54字</label>
                            <textarea class="form-control" aria-label="With textarea" id="articleExcprt" name="excprt"></textarea>
                        </div>
                        </div>

                        <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            分类
                            </span>
                        </div>
                        <div class="form-group">
                           
                            <select class="selectpicker" name="category" data-style="btn-success" id="categoryList">
                                @foreach($features as $feature )
                                    <optgroup label="{{$feature['name']}}">
                                        @foreach($feature['category'] as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>

                        </div>
                        </div>


                    </div>

                    <div class="col-lg-10 col-md-4 mt-3">
                         
                        <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            标签
                            <!-- <i class="material-icons">bookmarks</i> -->
                            </span>

                        </div>

                        <div class="bootstrap-tagsinput">  
                        
                            <input type="text" value="" data-role="tagsinput" name="abctag" id="articleTag" class="form-control tagsinput" data-color="info" style="display: none;" required>
                            <input type="text" placeholder="" class="form-control" size="4" style="position: absolute;left:-1000px;">
                        </div>
                        </div>
                    </div>
  
                  </div>
                </div>

                <div class="tab-pane" id="address">
                    <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <!-- <h5 class="info-text"> Are you living in a nice area? </h5> -->
                    </div>
                    <div class="col-sm-12">
                        
                        <textarea name="content" id="articleContent" cols="30" rows="100"></textarea>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mr-auto">
                <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="上一步">
                </div>
                <div class="ml-auto">
                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="下一步" id="nextButton">
                <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd submit"  value="完成" style="display: none;">
                </div>
                <div class="clearfix"></div>
            </div>
            </form>
        </div>
        </div>
        <!-- wizard container -->
    </div>
    </div>
                      
</div>
@stop

@section('javascript')
@parent

<script src="{{ asset('js/jquery.bootstrap-wizard.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/form-wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-selectpicker.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>

<script>
  $(document).ready(function(){
    // Initialise the wizard
    demo.initMaterialWizard();
    setTimeout(function() {
      $('.card.card-wizard').addClass('active');
    }, 600);

    tinymce.init({
        selector: '#articleContent',
        // mode : "textareas",
        // height: 500,
        language:'zh_CN'
    });
  });
</script>
<script>
$(function(){
   $('#article').validate({
    focusCleanup:true,
    rules : {
        
        abctitle : 'required',
        abctag   : 'required'
    },
    messages : {
        abctitle : '标题不能为空',
        abctag   : '标签不能为空'
    },
    errorPlacement: function(error, element) {
    // Append error within linked label
        console.log(error);
        error.appendTo(element.parent());  
    },
    errorElement: "span",
    errorClass : 'text-danger',
    success:function(label) {
 console.log(label);
    },
    submitHandler: function(form)
    {
        let postData = {
            'title' : $('#articleTitle').val(),
            'author' : $('#articleAuthor').val(),
            'excprt' : $('#articleExcprt').val(),
            'category' : $('#categoryList').val(),
            'picture' : new FormData($('#articlePicture')[0]),
            'tag' : $('#articleTag').val(),
            // 'content' : $('#articleContent').val(),
            '_token' : $('input[name=_token]').val()
        };

        $.post('add', postData, function (data) {
            console.log(data);
            // if (data.error_code > 0)
            // {
            //     swal({
            //         title: data.msg,
            //         // text: "I will close in 2 seconds.",
            //         timer: 2000,
            //         showConfirmButton: false
            //     })
            // }

            // if (data.error_code == 0)
            // {
            //     swal({
            //         title: data.msg,
            //         buttonsStyling: false,
            //         confirmButtonClass: "btn btn-success",
            //         type: "success"
            //     }).then(function() {
            //         window.location.href="index";
            //     })
            // }
        });
    }

}); 
})
$('#nextButton').validate({
    focusCleanup:true,
    rules : {
        abctitle : 'required',
        abctag   : 'required'
    },
    messages : {
        abctitle : '标题不能为空',
        abctag   : '标签不能为空'
    },
    errorPlacement: function(error, element) {
    // Append error within linked label
        error.appendTo(element.parent());  
    },
    errorElement: "span",
    errorClass : 'text-danger',
    success:function(label) {

    },
    submitHandler: function(form)
    {
        let postData = {
            'title' : $('#articleTitle').val(),
            'author' : $('#articleAuthor').val(),
            'excprt' : $('#articleExcprt').val(),
            'category' : $('#categoryList').val(),
            'picture' : new FormData($('#articlePicture')[0]),
            'tag' : $('#articleTag').val(),
            // 'content' : $('#articleContent').val(),
            '_token' : $('input[name=_token]').val()
        };

        $.post('add', postData, function (data) {
            console.log(data);
            // if (data.error_code > 0)
            // {
            //     swal({
            //         title: data.msg,
            //         // text: "I will close in 2 seconds.",
            //         timer: 2000,
            //         showConfirmButton: false
            //     })
            // }

            // if (data.error_code == 0)
            // {
            //     swal({
            //         title: data.msg,
            //         buttonsStyling: false,
            //         confirmButtonClass: "btn btn-success",
            //         type: "success"
            //     }).then(function() {
            //         window.location.href="index";
            //     })
            // }
        });
    }

});

</script>

@stop

