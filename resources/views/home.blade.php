@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">weekend</i>
            </div>
            <p class="card-category">Bookings</p>
            <h3 class="card-title">184</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons text-danger">warning</i>
              <a href="#pablo">Get More Space...</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card ">

          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons"></i>
            </div>
            <h4 class="card-title">Global Sales by Top Locations</h4>
          </div>

          <div class="card-body ">
            <div class="row">

              <div class="col-md-6">
                <div class="table-responsive table-sales">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="flag">
                            <img src="images/us.png" </div>
                        </td>
                        <td>USA</td>
                        <td class="text-right">
                          2.920
                        </td>
                        <td class="text-right">
                          53.23%
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-6 ml-auto mr-auto">
                <div id="worldMap" style="height: 300px;"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
@stop