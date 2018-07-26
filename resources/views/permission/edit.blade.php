@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	    	<div class="col-md-12">
		      <form id="feature" class="form-horizontal" action="edit" method="post" data-id="{{$data['id']}}" data-success-address="{{url('feature/index')}}">
		      	{{ csrf_field() }}
		        <div class="card ">
		          <div class="card-header card-header-success card-header-text">
		            <div class="card-text">
		              <h4 class="card-title">编辑版块</h4>
		            </div>
		          </div>
		          <div class="card-body ">
		            <div class="row">
		              <label class="col-sm-2 col-form-label" >名称</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="feature-name" type="text" name="name" value="{{$data['name']}}" maxLength="5" required="true" placeholder="请填写版块名称,不超过5个字" autocomplete="off" />
		                  
		                </div>
		              </div>
	
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">描述</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="feature-desc" type="text" name="desc" value="{{$data['desc']}}" placeholder="不超过20个字"  autocomplete="off"/>
		                </div>
		              </div>
		        
		            </div>
		            <div class="row">
		              <label class="col-sm-2 col-form-label">状态</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                	<div class="togglebutton">
			                <label>
	                        <input type="checkbox" name="status" id="feature-status"
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
		              <label class="col-sm-2 col-form-label">排序</label>
		              <div class="col-sm-7">
		                <div class="form-group">
		                  <input class="form-control" id="feature-sort" type="number" name="sort" value="{{$data['sort']}}" autocomplete="off" />
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

<script>

$('#feature').validate({
	focusCleanup:true,
	rules : {
		name : 'required',
		desc : {
			maxlength : 20
		},
		sort : {
			number:true,
			min:0
		}
	},
	messages : {
		name : '名称不能为空',
		desc : {
			maxlength : '不能超过20个字符'
		},
		sort : {
			number:'必须是数字',
			min: '不能小于0'
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
		let status = $('input[type=checkbox]:checked').val();
		if (status === undefined)
		{
			status = -1;
		} else 
		{
			status = 1;
		}
		let postData = {
			'name' : $('#feature-name').val(),
			'desc' : $('#feature-desc').val(),
			'status' : status,
			'sort'   : $('#feature-sort').val(),
			'_token' : $('input:hidden').val()
		};
		let apiUrl  = $('#feature').data('id');
	
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
	            	window.location.href=$('#feature').data('success-address');
	            })
	  		}
	  	});
	}

});
  	

</script>
@stop

