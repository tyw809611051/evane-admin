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
          <h4 class="card-title">文章管理</h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <!--        Here you can write extra buttons/actions for the toolbar              -->
          </div>
          <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>图片</th>
                  <th>标题</th>
                  <th>作者</th>
                  <th>摘要</th>
                  <th>评论数</th>
                  <th>评论状态</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
 <!--              <tfoot>
                <tr>
                  <th>图片</th>
                  <th>标题</th>
                  <th>作者</th>
                  <th>摘要</th>
                  <th>评论数</th>
                  <th>评论状态</th>
                  <th class="text-right">Actions</th>
                </tr>
              </tfoot> -->
              <tbody>
                @foreach($lists as $list)
                <tr>
                  <td>
                    <div class="img-container">
                      <img src="{{ asset('img/icon.jpg') }}" alt="...">
                    </div>
                  </td>
                  <td>Vivian Harrell</td>
                  <td>Financial Controller</td>
                  <td>San Francisco</td>
                  <td>62</td>
                  <td>2009/02/14</td>
                  <td class="text-right">
                    <!-- <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a> -->
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

