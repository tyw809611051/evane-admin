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
		                  <input class="form-control" id="user-name" type="text" name="name" maxLength="30" required="true" placeholder="请填写用户名称" autocomplete="off" value="{{$data['name']}}" />
		                  
		                </div>
		              </div>
	
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">邮箱</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="user-email" type="email" name="email"   placeholder="不超过20个字"  autocomplete="off" value="{{$data['email']}}" />
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">角色</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                	<select class="selectpicker" multiple id="user-role" name="role" data-style="btn-success">
		                	@foreach($roles as $role)
							  <option value="{{$role['id']}}" 
								@if ($role['check'] == "1")
									selected 
								@endif
							  >{{$role['name']}}</option>
							@endforeach
							</select>
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">原始密码</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="user-old-password" type="text" name="oldPassword" data-user-id="{{$data['id']}}"  placeholder="不超过20个字"  autocomplete="off" />
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">新密码</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="user-reset-password" type="text" name="resetPassword"  placeholder="不超过20个字"  autocomplete="off"/>
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
		oldPassword : {
			required : true,
			remote : {
				type : "GET",
				url : "/user/checkPassword/"+$('#user-old-password').data('user-id')
			}
		},
		resetPassword : {
			required : true
		}
		
	},
	messages : {
		name : '名称不能为空',
		email : '邮箱不能为空',
		oldPassword : {
			required : '密码不能为空',
			remote   : '原始密码错误'
		},
		role : '角色不能为空',
		resetPassword : {
			required : '确认密码不能为空',
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
		let apiUrl   = $('#user-old-password').data('user-id');
		let postData = {
			'name' : $('#user-name').val(),
			'email' : $('#user-email').val(),
			'role' : $('#user-role').val(),
			'resetPassword' : $('#user-reset-password').val(),
			'_token' : $('input:hidden').val()
		};
	  	$.post(apiUrl, postData, function (data) {
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
	            	window.location.href="/user/index";
	            })
	  		}
	  	});
	}

});
  	

</script>
@stop

