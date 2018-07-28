@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	    	<div class="col-md-12">
		      <form id="user" class="form-horizontal" action="add" method="post" >
		      	{{ csrf_field() }}
		        <div class="card ">
		          <div class="card-header card-header-success card-header-text">
		            <div class="card-text">
		              <h4 class="card-title">编辑用户</h4>
		            </div>
		          </div>
		          <div class="card-body ">
		            <div class="row">
		              <label class="col-sm-2 col-form-label" >名称</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="user-name" type="text" name="name" maxLength="30" required="true" placeholder="请填写用户名称" autocomplete="off" />
		                  
		                </div>
		              </div>
	
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">邮箱</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="user-email" type="email" name="email"   placeholder="不超过20个字"  autocomplete="off"/>
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">角色</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                	<select class="selectpicker" multiple id="user-role" name="role" data-style="btn-success">
		                	<!-- @foreach($roles as $role)
							  <option value="{{$role['id']}}">{{$role['name']}}</option>
							@endforeach -->
							</select>
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">原始密码</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="user-password" type="text" name="password"   placeholder="不超过20个字"  autocomplete="off"/>
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">新密码</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="user-review-password" type="text" name="reviewPassword"  placeholder="不超过20个字"  autocomplete="off"/>
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
<script src="{{ asset('js/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
<script>

$('#user').validate({
	focusCleanup:true,
	rules : {
		name : 'required',
		email : 'required',
		password : 'required',
		role : 'required',
		reviewPassword : {
			required : true,
			equalTo:"#user-password"
		}
		
	},
	messages : {
		name : '名称不能为空',
		email : '邮箱不能为空',
		password : '密码不能为空',
		role : '角色不能为空',
		reviewPassword : {
			required : '确认密码不能为空',
			equalTo:"密码不一致"
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
			'name' : $('#user-name').val(),
			'email' : $('#user-email').val(),
			'role' : $('#user-role').val(),
			'password' : $('#user-password').val(),
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

