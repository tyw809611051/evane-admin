@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="col-md-12 col-12 mr-auto ml-auto">
        <!--      Wizard container        -->
        <div class="wizard-container">
        <div class="card card-wizard" data-color="green" id="wizardProfile">
            <form action="" method="">
            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
            <div class="card-header text-center">
                <h3 class="card-title">
                Build Your Profile
                </h3>
                <h5 class="card-description">This information will let us know more about you.</h5>
            </div>
            <div class="wizard-navigation">
                <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                    About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                    Address
                    </a>
                </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                <div class="tab-pane active" id="about">
                    <h5 class="info-text"> Let's start with the basic information (with validation)</h5>
                    <div class="row justify-content-center">

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                            <img src="{{ asset('img/image_placeholder.jpg') }}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="..." />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
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
                            <label for="exampleInput1" class="bmd-label-floating">标题必填</label>
                            <input type="text" class="form-control" id="exampleInput1" name="firstname" required>
                        </div>
                        </div>
                        <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            作者
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput11" class="bmd-label-floating">作者必填</label>
                            <input type="text" class="form-control" id="exampleInput11" name="lastname" required>
                        </div>
                        </div>
                        <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            摘要
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput12" class="bmd-label-floating">默认为文章前54字</label>
                            <textarea class="form-control" aria-label="With textarea" id="exampleInput12" name="excprt"></textarea>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-10 mt-3">
                        <div class="input-group form-control-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="material-icons">email</i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Email (required)</label>
                            <input type="email" class="form-control" id="exampleemalil" name="email" required>
                        </div>
                        </div>
                    </div>
  
                  </div>
                </div>

                <div class="tab-pane" id="address">
                    <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <h5 class="info-text"> Are you living in a nice area? </h5>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                        <label>Street Name</label>
                        <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label>Street No.</label>
                        <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group select-wizard">
                        <label>Country</label>
                        <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select">
                            <option value="Afghanistan"> Afghanistan </option>
                            <option value="Albania"> Albania </option>
                            <option value="Algeria"> Algeria </option>
                            <option value="American Samoa"> American Samoa </option>
                            <option value="Andorra"> Andorra </option>
                            <option value="Angola"> Angola </option>
                            <option value="Anguilla"> Anguilla </option>
                            <option value="Antarctica"> Antarctica </option>
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mr-auto">
                <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Previous">
                </div>
                <div class="ml-auto">
                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next">
                <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish" style="display: none;">
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
<script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.bootstrap-wizard.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/form-wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    // Initialise the wizard
    demo.initMaterialWizard();
    setTimeout(function() {
      $('.card.card-wizard').addClass('active');
    }, 600);
  });
</script>

@stop

