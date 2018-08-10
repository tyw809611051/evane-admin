@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="col-md-12 col-12 mr-auto ml-auto">
        <!--      Wizard container        -->
        <div class="wizard-container">
        <div class="card card-wizard" data-color="green" id="wizardProfile">
            <form action="add" method="post"  id="article" enctype="multipart/form-data">
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
                                <input type="file" name="picture" id="articlePicture" required />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> 删除</a>
                            </div>
                            <span >图片必填</span>
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
                            <input type="text" class="form-control" id="articleTitle" name="title" required >
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
                            <input type="text" class="form-control" id="articleAuthor" name="author" required value="{{auth()->user()->name}}">
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
                            <textarea class="form-control" aria-label="With textarea" id="articleExcprt" name="excerpt"></textarea>
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
                        
                            <input type="text" value="" data-role="tagsinput" name="tag" id="articleTag" class="form-control tagsinput" data-color="info" style="display: none;" required>
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
                        
                        <textarea name="content" id="articleContent" cols="30" rows="100" required></textarea>
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
                <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"  value="完成" style="display: none;">
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
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
      <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                  <div class="badge-colors ml-auto mr-auto">
                    <span class="badge filter badge-purple" data-color="purple"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-warning" data-color="orange"></span>
                    <span class="badge filter badge-danger" data-color="danger"></span>
                    <span class="badge filter badge-rose active" data-color="rose"></span>
                  </div>
                  <div class="clearfix"></div>
                </a>
            </li>

            
            <li class="header-title">Sidebar Background</li>
              <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger background-color">
                      <div class="ml-auto mr-auto">
                        <span class="badge filter badge-black active" data-background-color="black"></span>
                        <span class="badge filter badge-white" data-background-color="white"></span>
                        <span class="badge filter badge-red" data-background-color="red"></span>
                      </div>
                      <div class="clearfix"></div>
                  </a>
              </li>

              <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger">
                      <p>Sidebar Mini</p>
                      <label class="ml-auto">
                        <div class="togglebutton switch-sidebar-mini">
                          <label>
                            <input type="checkbox">
                            <span class="toggle"></span>
                          </label>
                        </div>
                      </label>
                      <div class="clearfix"></div>
                  </a>
              </li>

              <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger">
                      <p>Sidebar Images</p>
                      <label class="switch-mini ml-auto">
                        <div class="togglebutton switch-sidebar-image">
                          <label>
                            <input type="checkbox" checked="">
                            <span class="toggle"></span>
                          </label>
                        </div>
                      </label>
                      <div class="clearfix"></div>
                  </a>
              </li>

              <li class="header-title">Images</li>

              <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="images/sidebar-1.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="images/sidebar-2.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="images/sidebar-3.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="images/sidebar-4.jpg" alt="">
                </a>
              </li>


            <li class="button-container">
              <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block btn-fill">Buy Now</a>
              <a href="https://demos.creative-tim.com/material-dashboard-pro/docs/2.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                  Documentation
              </a>
              <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">
                  Get Free Demo!
              </a>
            </li>
            

            
            <li class="button-container github-star">
                <a class="github-button" href="https://github.com/creativetimofficial/ct-material-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
            </li>
            <li class="header-title">Thank you for 95 shares!</li>

            <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                <br>
                <br>
            </li>
        </ul>
    </div>
</div>

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

</script>

@stop

