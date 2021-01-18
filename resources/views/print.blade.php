@extends('frontendTemplate')
@section('style')
<style>
  .chart {
    position: relative;
    height: 280px!important;
}

</style>
@endsection
@section('content')
  <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 col-lg-4 order-xl-2 order-lg-2 mb-5 mb-xl-0  ">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Search</h6>
                  <h2 class="mb-0">Report </h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                 <!-- from start -->
                  <form id="search" method="post">
                    <div class="alert alert-primary success d-none" role="alert">
                        
                     </div>
                      <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" name="startdate" id="startDate" placeholder="enter Start date" class="d-inline form-control ">
                        <span class="Sdate error" ></span>
                      </div>

                      <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" name="enddate" id="endDate" placeholder="enter End date" class="d-inline form-control ">
                        <span class="Edate error" ></span>
                      </div>
                      
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary border-dark form-control ">Search Now</button>
                      </div>
                    </form>
                  <!-- from end -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-8 order-xl-1 order-lg-1 ">
          <div class="card bg-gradient-muted shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-dark ls-1 mb-1">Report</h6>
                  <h2 class="text-dark mb-0">Daily Transacation </h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">+</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    
                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <h5 class="text-primary">Report from 1th jan to 6th jan</h5>
              <div class="chart row card-group"> 
              
                <div class="col-4 card " style="border-top: 0px; border-left: 0px;border-bottom: 0px;">
                  <div class=" card-stats">
                   <!-- Card body -->
                    <div class="card-body">
                        
                            <div class="">
                                <div class="col mb-4 px-0">
                                    <h5 class="card-title text-uppercase text-dark mb-0">Total Income</h5>
                                    
                                </div>
                                <div class="col my-xl-4 my-lg-2 mt-5">
                                  
                                      <i class="ni ni-chart-bar-32 text-success fa-6x "></i>
                                  
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-sm">
                                <span class="h2 font-weight-bold mb-0">400000 Ks</span>
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                
                            </p>

                        </div>    
                    </div>
                </div>

                <div class="col-4 card " style="border-top: 0px;border-bottom: 0px;">
                  <div class=" card-stats">
                   <!-- Card body -->
                    <div class="card-body">
                        
                            <div class="">
                                <div class="col mb-4 px-0">
                                    <h5 class="card-title text-uppercase text-dark mb-0">Total Expense</h5>
                                    
                                </div>
                                <div class="col my-xl-4 my-lg-2 mt-5">
                                  
                                      <i class="ni ni-chart-bar-32 text-danger fa-6x "></i>
                                  
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-sm">
                                <span class="h2 font-weight-bold mb-0">400000 Ks</span>
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                
                            </p>

                        </div>    
                    </div>
                </div>

                <div class="col-4 card " style="border-top: 0px; border-right: 0px;border-bottom: 0px;">
                  <div class=" card-stats">
                   <!-- Card body -->
                    <div class="card-body">
                        
                            <div class="">
                                <div class="col mb-4 px-0">
                                    <h5 class="card-title text-uppercase text-dark mb-0"> <span class="text-success">Income</span>/<span class="text-danger">Expense</span></5 >
                                    
                                </div>
                                <div class="col">
                                  
                                      <canvas id="myChart" width="254" height="254" style="display: block; height: 130px; width: 130px;" class="chartjs-render-monitor"></canvas>
                                  
                                </div>
                            </div>

                            <p class="mt-4 mb-0 text-sm">
                                <span class="h2 font-weight-bold mb-0">Pie Chart View</span>
                                
                            </p>

                        </div>    
                    </div>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row mt-5 d-none">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Page visits</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Page name</th>
                    <th scope="col">Visitors</th>
                    <th scope="col">Unique users</th>
                    <th scope="col">Bounce rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      /argon/
                    </th>
                    <td>
                      4,569
                    </td>
                    <td>
                      340
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/index.html
                    </th>
                    <td>
                      3,985
                    </td>
                    <td>
                      319
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/charts.html
                    </th>
                    <td>
                      3,513
                    </td>
                    <td>
                      294
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/tables.html
                    </th>
                    <td>
                      2,050
                    </td>
                    <td>
                      147
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/profile.html
                    </th>
                    <td>
                      1,795
                    </td>
                    <td>
                      190
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Social traffic</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Referral</th>
                    <th scope="col">Visitors</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      Facebook
                    </th>
                    <td>
                      1,480
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Facebook
                    </th>
                    <td>
                      5,480
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">70%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Google
                    </th>
                    <td>
                      4,807
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">80%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Instagram
                    </th>
                    <td>
                      3,678
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">75%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      twitter
                    </th>
                    <td>
                      2,645
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">30%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
@endsection
@section('script')
<script>
  var ctx = document.getElementById('myChart');
  var data = {
    datasets: [{
        data: [10, 20, 30]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    
};
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: data
   
});
</script>
@endsection
 