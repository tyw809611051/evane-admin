@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	    	<div class="col-md-12">
		      <form id="feature" class="form-horizontal" action="add" method="post" >
		      	{{ csrf_field() }}
		        <div class="card ">
		          <div class="card-header card-header-success card-header-text">
		            <div class="card-text">
		              <h4 class="card-title">添加分类</h4>
		            </div>
		          </div>
		          <div class="card-body ">
		            <div class="row">
		              <label class="col-sm-2 col-form-label" >名称</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="feature-name" type="text" name="name" maxLength="5" required="true" placeholder="请填写版块名称,不超过5个字" autocomplete="off" />
		                  
		                </div>
		              </div>
	
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">描述</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="feature-desc" type="text" name="desc"   placeholder="不超过20个字"  autocomplete="off"/>
		                </div>
		              </div>
		        
		            </div>
		          </div>
		          <div class="card-footer ml-auto mr-auto">
		            <button type="submit" class="btn btn-rose" id="content-submit">提交</button>
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
<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>

<script>

$('#feature').validate({
	focusCleanup:true,
	rules : {
		name : 'required',
		desc : {
			maxlength : 20
		}
	},
	messages : {
		name : '名称不能为空',
		desc : {
			maxlength : '不能超过20个字符'
		}
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
			'name' : $('#feature-name').val(),
			'desc' : $('#feature-desc').val(),
			'_token' : $('input:hidden').val()
		};
	  	$.post('add', postData, function (data) {
	  		console.log(data);
	  		if (data.error_code > 0)
	  		{
	  			swal({
	                title: data.msg,
	                // text: "I will close in 2 seconds.",
	                timer: 2000,
	                showConfirmButton: false
	            })
	  		}

	  		if (data.error_code == 0)
	  		{
	  			swal({
	                title: data.msg,
	                buttonsStyling: false,
	                confirmButtonClass: "btn btn-success",
	                type: "success"
	            }).then(function() {
	            	window.location.href="index";
	            })
	  		}
	  	});
	}

});
  	

</script>
@stop

