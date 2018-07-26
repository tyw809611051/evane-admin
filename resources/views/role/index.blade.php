@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <h4 class="card-title">角色</h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <!--        Here you can write extra buttons/actions for the toolbar              -->
            <div class="row">
            	
            	<div class="col-md-10 ml-auto">
            		<!-- <button class="btn btn-info">发布</button> -->
            	</div>

           		 <div class="col-md-2 ml-auto ">
   
            		<a class="btn btn-success" href="{{url('role/add')}}">新增</a>
      
            	</div>
            	</div>
            
          </div>
                   <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>名称</th>
                  <th>展示名称</th>
                  <th>描述</th>
                  <th>状态</th>
                  <th>权限</th>
                  <th class="text-right">创建时间</th>
                  <th class="disabled-sorting text-right">操作</th>
                </tr>
              </thead>
              <tbody>
  
            @foreach($lists as $list )
                <tr data-id="{{$list['id']}}" data-status="">
                  <td>{{$list['id']}}</td>
                  <td>{{$list['name']}}</td>
                  <td>{{$list['display_name']}}</td>
                  <td>{{$list['desc']}}</td>
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

                  <td><a href="">查看</a></td>
                  <td class="text-right">{{$list['created_at']}}</td>
                  <td class="text-right">
                    <!-- <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a> -->
                    <a href="{{url('role/edit',['id'=>$list['id']])}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
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


</script>

@stop