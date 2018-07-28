@extends('layouts.app')
@section('stylesheet')
@parent

<style>
  .form-check .form-check-label span {
    top : 10px;
  }
</style>
@stop
@section('content')
<div class="content">
{{ csrf_field() }}
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <h4 class="card-title">用户</h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <!--        Here you can write extra buttons/actions for the toolbar              -->
            <div class="row">
            	
            	<div class="col-md-10 ml-auto">
            		<button class="btn btn-info">发布</button>
            	</div>

           		 <div class="col-md-2 ml-auto ">
   
            		<a class="btn btn-success" href="{{url('user/add')}}">新增</a>
      
            	</div>
            	</div>
            
          </div>
                   <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>名称</th>
                  <th>邮箱</th>
                  <th>状态</th>
                  <th>角色</th>
                  <th class="text-right">登录时间</th>
                  <th class="disabled-sorting text-right">操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($lists as $list )
                <tr data-id="{{$list['id']}}" data-status="">
                  <td>{{$list['id']}}</td>
                  <td>{{$list['name']}}</td>
                  <td>{{$list['email']}}</td>
                  <td>
                    <div class="togglebutton">
                      <label>
                        <input type="checkbox" 
                        @if ($list['status'] == 1)
                          checked 
                        @endif
                        onclick="return changeDataStatus({{$list['id']}},{{$list['status']}});" 
                        >
                        <span class="toggle"></span>
                        @if ($list['status'] == 1)
                          启用
                        @else
                          禁用 
                        @endif
                      </label>
                    </div>
                  </td>
                  <td ><a href="" data-toggle="modal" data-target="#myModal{{$list['id']}}" onclick="userRole({{$list['id']}})">查看</a>
                  <div class="modal fade" id="myModal{{$list['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$list['id']}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">分配权限</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12 checkbox-radios">
                                <form action="haha" id="roleForm{{$list['id']}}">
                                  
                                </form>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal" id="cacelRole" onclick="cacelRole({{$list['id']}})">取消</button>
                          <button type="button" class="btn btn-success btn-link" data-dismiss="modal" onclick="allocaRole({{$list['id']}})">提交</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>
                  <td class="text-right">{{$list['updated_at']}}</td>
                  <td class="text-right">
                    <!-- <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a> -->
                    <a href="{{url('user/edit',['id'=>$list['id']])}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                    <a href="javascript:false;" class="btn btn-link btn-danger btn-just-icon remove" id="feature-del" data-id="{{$list['id']}}" onclick="del({{$list['id']}});" ><i class="material-icons">close</i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $lists->links('layouts.page') }}

          </div>
        </div>
        <!-- end content-->
      </div>
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
</div>

</div>

@stop

@section('javascript')
@parent
<script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>

<script>

function userRole(id)
{
  let apiUrl = 'role/'+id;
   $.get(apiUrl, '', function (data) 
   {
      let content = '';
      $.each(data.data,function(i,item) {
          
          choice = '';
          if (item['checked'] == "1")
          {
              choice = 'checked';
          }
          content += '<div class="form-check form-check-inline">'+
                        '<label class="form-check-label">'+
                          '<input class="form-check-input" type="checkbox" value='+item['id']+' '+choice+'> '+item['display_name']+
                          '<span class="form-check-sign">'+
                            '<span class="check"></span>'+
                          '</span>'+
                        '</label>'+
                      '</div>'
      })
      $('#roleForm'+id).append(content);
   });
}

function cacelRole(id)
{
  $('#roleForm'+id+'>div').remove();
}

function allocaRole(id)
{
  let apiUrl   = 'assignRoles/'+id;
  let roleId   = $('#roleForm'+id).find(':checkbox:checked');
  let roleColl = new Array();
  $.each(roleId, function(i,item) {
    // console.log(i);
    // console.log(item.value);
    roleColl.push(item.value);
  });
  console.log(roleColl);
  let postData = {
    'roleId' : roleColl,
    '_token' : $('input:hidden').val()
  };
  console.log(postData);
  //提交
  $.post(apiUrl, postData, function (data) {
      console.log(data);
  });
  $('#roleForm'+id+'>div').remove();
}
</script>

@stop