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
            		<button class="btn btn-info">发布</button>
            	</div>

           		 <div class="col-md-2 ml-auto ">
   
            		<a class="btn btn-success" href="{{url('category/add')}}">新增</a>
      
            	</div>
            	</div>
            
          </div>
                   <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>名称</th>
                  <th>父级分类</th>
                  <th>状态</th>
                  <th>排序</th>
                  <th class="text-right">创建时间</th>
                  <th class="disabled-sorting text-right">操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($lists as $list )
                <tr data-id="{{$list['id']}}" data-status="">
                  <td>{{$list['id']}}</td>
                  <td>{{$list['name']}}</td>
                  <td>{{$list['parent_id']}}</td>
                  <td>
                    <div class="togglebutton">
                      <label>
                        <input type="checkbox" 
                        @if ($list['status'] == 1)
                          checked 
                        @endif
                        onclick="return changeStatus({{$list['id']}},{{$list['changeStatus']}});" 
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
                  <td>{{$list['sort']}}</td>
                  <td class="text-right">{{$list['created_at']}}</td>
                  <td class="text-right">
                    <!-- <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a> -->
                    <a href="{{url('feature/edit',['id'=>$list['id']])}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                    <a href="javascript:false;" class="btn btn-link btn-danger btn-just-icon remove" id="feature-del" data-id="{{$list['id']}}" onclick="del({{$list['id']}});" ><i class="material-icons">close</i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- {{ $lists->links('layouts.page') }} -->

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
//改变状态
// function changeStatus(id,status) {
//   let hint = '';
//   hint  = status == 1 ? '禁用' : '启用';
//   state = status == 1 ? -1 : 1;

//   let postData = {
//     'id' : id,
//     'status' : state
//   };
//   swal({
//       title: '确定'+hint+'?',
//       showCancelButton: true,
//       confirmButtonClass: 'btn btn-success',
//       cancelButtonClass: 'btn btn-danger',
//       buttonsStyling: false
//   }).then(function(result) {
//       $.get('changeStatus', postData, function (data) {
//         console.log(data);
//         if (data.error_code > 0)
//         {
//           swal({
//                   title: data.msg,
//                   timer: 2000,
//                   showConfirmButton: false
//               });
//           return false;
//         }

//         if (data.error_code == 0)
//         {
//           swal({
//                   title: data.msg,
//                   buttonsStyling: false,
//                   confirmButtonClass: "btn btn-success",
//                   type: "success"
//               }).then(function() {
//                 window.location.href="index";
//               })
//         }
//       });
//       return true;
//   }).catch(swal.noop)
//   return false;
// };
// function del(id) {
//    swal({
//       title: '确定删除?',
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonClass: 'btn btn-success',
//       cancelButtonClass: 'btn btn-danger',
//       confirmButtonText: '是的, 删除它!',
//       cancelButtonText: '取消',
//       buttonsStyling: false
//   }).then(function() {
//     let apiUrl = 'delete/'+$('#feature-del').data('id');
//     console.log(apiUrl);
//     $.get(apiUrl, '', function (data) {
//         console.log(data);
//         if (data.error_code > 0)
//         {
//           swal({
//                   title: data.msg,
//                   timer: 2000,
//                   showConfirmButton: false
//               });
//         }

//         if (data.error_code == 0)
//         {
//           swal({
//                   title: data.msg,
//                   buttonsStyling: false,
//                   confirmButtonClass: "btn btn-success",
//                   type: "success"
//               }).then(function() {
//                 // window.location.href="index";
//               })
//         }
//       });
//   }).catch(swal.noop)
// };

</script>

@stop