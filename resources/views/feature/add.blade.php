@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	    	<div class="col-md-12">
		      <form id="RangeValidation" class="form-horizontal" action="" method="">
		        <div class="card ">
		          <div class="card-header card-header-rose card-header-text">
		            <div class="card-text">
		              <h4 class="card-title">Range Validation</h4>
		            </div>
		          </div>
		          <div class="card-body ">
		            <div class="row">
		              <label class="col-sm-2 col-form-label">Min Length</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" type="text" name="min_length" minLength="5" required="true"/>
		                </div>
		              </div>
		              <label class="col-sm-3 label-on-right">
		                <code>minLength="5"</code>
		              </label>
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">Max Length</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" type="text" name="max_length" maxLength="5" required="true"/>
		                </div>
		              </div>
		              <label class="col-sm-3 label-on-right">
		                <code>maxLength="5"</code>
		              </label>
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">Range</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" type="text" name="range" range="[6,10]" required="true"/>
		                </div>
		              </div>
		              <label class="col-sm-3 label-on-right">
		                <code>range="[6,10]"</code>
		              </label>
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">Min Value</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" type="text" name="min" min="6" required="true"/>
		                </div>
		              </div>
		              <label class="col-sm-3 label-on-right">
		                <code>min="6"</code>
		              </label>
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">Max Value</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" type="text" name="max" max="6" required="true"/>
		                </div>
		              </div>
		              <label class="col-sm-3 label-on-right">
		                <code>max="6"</code>
		              </label>
		            </div>
		          </div>
		          <div class="card-footer ml-auto mr-auto">
		            <button type="submit" class="btn btn-rose">Validate Inputs</button>
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
</script>
@stop