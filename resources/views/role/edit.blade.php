@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	    	<div class="col-md-12">
		      <form id="role" class="form-horizontal" action="edit" method="post" data-id="{{$data['id']}}" data-success-address="{{url('role/index')}}">
		      	{{ csrf_field() }}
		        <div class="card ">
		          <div class="card-header card-header-success card-header-text">
		            <div class="card-text">
		              <h4 class="card-title">编辑角色</h4>
		            </div>
		          </div>
		          <div class="card-body ">
		            <div class="row">
		              <label class="col-sm-2 col-form-label" >名称</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="role-name" type="text" name="name" value="{{$data['name']}}" maxLength="30" required="true" placeholder="请填写版块名称,不超过5个字" autocomplete="off" />
		                  
		                </div>
		              </div>
	
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">展示名称</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="role-display" type="text" name="desc" value="{{$data['display_name']}}" placeholder="不超过20个字"  autocomplete="off"/>
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">描述</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="role-desc" type="text" name="desc" value="{{$data['desc']}}" placeholder="不超过20个字"  autocomplete="off"/>
		                </div>
		              </div>
		        
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">状态</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                	<div class="togglebutton">
			                <label>
	                        <input type="checkbox" name="status" id="role-status"
							@if ($data['status'] == 1)
	                          checked 
	                        @endif
	                        >
	                        <span class="toggle"></span>

                      		</label>
                    		</div>
		                </div>
		              </div>
		        
		            </div>

		            <div class="row">
		              <label class="col-sm-2 col-form-label">权限</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                	<select class="selectpicker" multiple id="role-permission" name="role" data-style="btn-success">
		                	@foreach($permissions as $permission)
							  <option value="{{$permission['id']}}" 
								@if ($permission['check'] == "1")
									selected 
								@endif
							  >{{$permission['name']}}</option>
							@endforeach
							</select>
		                </div>
		              </div>
		        
		            </div>

		          </div>
		          <div class="card-footer ml-auto mr-auto">
		            <button type="submit" class="btn btn-rose" id="content-submit">更新</button>
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

$('#role').validate({
	focusCleanup:true,
	rules : {
		name : 'required',

	},
	messages : {
		name : '名称不能为空',

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
		let status = $('input[type=checkbox]:checked').val();
		if (status === undefined)
		{
			status = -1;
		} else 
		{
			status = 1;
		}
		let postData = {
			'name' 	  : $('#role-name').val(),
			'display' : $('#role-display').val(),
			'desc' 	  : $('#role-desc').val(),
			'status'  : status,
			'permission' : $('#role-permission').val(),
			'_token'  : $('input:hidden').val()
		};
		let apiUrl  = $('#role').data('id');
		console.log(postData);
	  	$.post(apiUrl, postData, function (data) {
	  	
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
	            	window.location.href=$('#role').data('success-address');
	            })
	  		}
	  	});
	}

});
  	

</script>
@stop

