@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	    	<div class="col-md-12">
		      <form id="RangeValidation" class="form-horizontal" action="" method="post" data-address="add">
		      	{{ csrf_field() }}
		        <div class="card ">
		          <div class="card-header card-header-success card-header-text">
		            <div class="card-text">
		              <h4 class="card-title">添加版块</h4>
		            </div>
		          </div>
		          <div class="card-body ">
		            <div class="row">
		              <label class="col-sm-2 col-form-label">名称</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" type="text" name="name" maxLength="5" required="true" placeholder="请填写版块名称,不超过5个字" />
		                </div>
		              </div>
	
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">描述</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" type="text" name="desc" maxLength="20" required="true" placeholder="不超过20个字" />
		                </div>
		              </div>
		        
		            </div>
		          </div>
		          <div class="card-footer ml-auto mr-auto">
		            <button type="submit" class="btn btn-rose">提交</button>
		          </div>
		        </div>
		      </form>
		    </div>
	    </div>

	</div>
</div>

@stop

@section('javascript')
@parent
<script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>

<script>
	  function setFormValidation(id){
    $(id).validate({
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
        },
        success: function(element) {
            $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
        },
        errorPlacement : function(error, element) {
            $(element).append(error);
        },
    });
  }

  $(document).ready(function() {
    setFormValidation('#RegisterValidation');
    setFormValidation('#TypeValidation');
    setFormValidation('#LoginValidation');
    setFormValidation('#RangeValidation');
  });
  console.log($('#RangeValidation').data('address'));
</script>
@stop