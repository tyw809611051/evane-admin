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
          <h4 class="card-title">版块</h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <!--        Here you can write extra buttons/actions for the toolbar              -->
            <div class="row">
            	
            	<div class="col-md-10 ml-auto">
            		<button class="btn btn-success">筛选</button>
            	</div>

           		 <div class="col-md-2 ml-auto ">
   
            		<a class="btn btn-success" href="{{url('feature/add')}}">新增</a>
      
            	</div>
            	</div>
            
          </div>
          <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>名称</th>
                  <th>描述</th>
                  <th>状态</th>
                  <th class="disabled-sorting text-right">操作</th>
                </tr>
              </thead>
 <!--              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th class="text-right">Actions</th>
                </tr>
              </tfoot> -->
              <tbody>
              @foreach($lists as $list )
                <tr>
                  <td>{{$list['id']}}</td>
                  <td>{{$list['name']}}</td>
                  <td>{{$list['desc']}}</td>
                  <td>{{$list['status']}}</td>
                  <td class="text-right">
                    <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                    <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                    <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
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


<script>

</script>

@stop