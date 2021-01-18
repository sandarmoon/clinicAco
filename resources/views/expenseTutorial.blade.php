@extends('frontendTemplate')
@section('style')
<style>
  
  .chart {
    position: relative;
    height: 280px!important;
}
.active{
  color:#333!important;
}

.income-button-show:hover,.expense-button-show:hover{
  cursor: pointer;
}

/*card start here*/
 .card-profile-stats>div .heading {
    font-size: 0.8rem;
    font-weight: normal;
    display: block;
}

.dot-list {
  list-style-type: none;
  height: 270px;
  width: 100%;
  overflow: hidden;
  overflow-y: scroll;
  padding-left: 2px;
}

.dot-list li {

  /* You need to turn on relative positioning so the line is placed relative to the item rather than absolutely on the page */
  position: relative;
  
  /* Use padding to space things out rather than margins as the line would get broken up otherwise */
  margin: 0;
  padding-bottom: 1em;
  padding-left: 20px;
}

.dot-list li:before {
  background-color: #5e72e4;
  width: 3px;
  content: '';
  position: absolute;
  top: 0px;
  bottom: 0px;
  left: 5px;
}

ul.dot-list li:after {
    /* bullets */
    content: url('http://upload.wikimedia.org/wikipedia/commons/thumb/3/30/RedDisc.svg/30px-RedDisc.svg.png');
    position: absolute;
    left: -10px; /*adjust manually*/
    top: 29px;
}


.bullet { margin-left: -20px; width: 12px; fill: #c00; float: left; padding-right: 10px }
.bullet.big { width: 16px; margin-left: -18px; padding-right: 8px }


}

span.vl {
        display: inline-block;
        border-left: 1px solid #ccc;
        margin: 0 10px;
        height: 125px;
}


ul.dot-list li:hover .my-card{
  opacity: 0.9;
  transition: 1s;
  transform: translate(-2px,8px);

}

.myfont,.my-card span{
  font-family: 'Old Standard TT', serif;
}

.my-card{
  background:#749d9e; 
  background: -webkit-linear-gradient(#749d9e, #b3a68b)!important; 
  background: -o-linear-gradient(#749d9e, #b3a68b)!important; 
  background: -moz-linear-gradient(#749d9e, #b3a68b)!important; 
  /*background: linear-gradient(#749d9e, #b3a68b)!important;*/
 /*background: linear-gradient(87deg, #fb6340 0, #fbb140 100%) !important;*/
     background: linear-gradient(87deg, #f5365c 0, #f56036 100%) !important;
}

.my-card span{
  color: #fff;
    letter-spacing: 0.1rem;
}


@media (max-width: 768px) {
  .btn {
    font-size:11px;
    padding:4px 6px;
  }
}

@media (min-width: 768px) {
  .btn {
    font-size:12px;
    padding:6px 12px;
  }
}

@media (min-width: 992px) {
  .btn {
    font-size:12px;
    padding:8px 12px;
  }
}

@media (min-width: 1200px) {
  .btn {
    padding:10px;
    font-size:12px;
  }
}

/*staring */

</style>
@endsection
@section('content')
  <div class=" container-fluid mt--7 d-xl-block d-lg-block d-md-none d-sm-none d-xs-none d-none ">
      <div class="row ">
        <div class=" col-xl-8 col-lg-7    mb-xl-0  ">
          <div class="card h-100 shadow">
             <div class="card-header border-0 pb-0">
              <h6 class="h4 ">Tansaction Search </h6>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="">
                   <!-- from start -->
                    <form id="search" method="post">
                      <div class="alert alert-primary success d-none" role="alert">
                          
                       </div>
                        <div  class="form-row">
                            <div class="col form-group">
                            <label for="startDate">Start Date</label>
                            <input type="date" name="startdate" id="startDate" placeholder="enter Start date" class="d-inline form-control ">
                            <span class="Sdate error" ></span>
                          </div>

                          <div class="col form-group">
                            <label for="endDate">End Date</label>
                            <input type="date" name="enddate" id="endDate" placeholder="enter End date" class="d-inline form-control ">
                            <span class="Edate error" ></span>
                          </div>
                        </div>
                        
                      </form>
                    <!-- from end -->

                    <!-- data showing -->
                       <div class="row px-3">

                        <div class="col-xl-5 col-lg-512 col-md-12 col-sm-12 col-xs-12 col-12 order-xl-2  text-xl-right text-lg-center text-md-center text-sm-center text-xs-center text-center">
                            <h6 class="small text-muted p-0  mt-3 ">Net</h6>
                             <h3 class=" mb-4 net-outcome">2000 Ks</h3>
                        </div>

                        <div class="col-xl-7 col-lg-712 col-md-12 col-sm-12 col-xs-12 col-12 order-xl-1  row justify-content-xl-around
                        justify-content-lg-between
                        ">

                          <div class="text-center">
                              <h6 class="small text-muted p-0  mt-3 ">Total expense</h6>
                               <h3 class=" mb-4 expense-outcome ">2000 Ks</h3>
                          </div>
                          
                          <div class="text-center">
                              <h6 class="small text-muted p-0  mt-3 ">Total income</h6>
                               <h3 class=" mb-4 income-outcome">2000 Ks</h3>
                          </div>


                        </div>
                        
                        
                      </div>
                    <!-- data showing end -->
                    
                    <div class="row align-items-center">
                      <div class="col-xl-8 col-lg-6 col-sm-6 col-xs-6 col-6">
                      
                        <h3 class=" p-0 pr-4 mt-3 income-title-show "><span class="text-success">Income</span> List</h3>
                        <h3 class=" p-0 pr-4 mt-3 expense-title-show d-none "><span class="text-danger">Expense</span> List</h3>
                        <h6 class="small text-muted p-0  mt-3 "><span class="startDate-title"></span> to <span class="endDate-title"></span></h6>
                        
                      </div>
                      
                      <div class="col-xl-4 col-lg-6 col-sm-6 col-xs-6 col-6">
                        <nav aria-label="breadcrumb text-right " class="float-right">
                          <ol class="breadcrumb bg-transparent my-breadcrumb ">
                            <li class="breadcrumb-item" data-toggle="tooltip" data-placement="top" title="Click to see list" ><span  class="text-success income-button-show" >Income</span></li>
                            <li class="breadcrumb-item active" data-toggle="tooltip" data-placement="top" title="Click to see list" aria-current="page"><span class="text-danger expense-button-show">Expense</span></li>
                          </ol>
                           <button class="btn btn-danger btn-group-sm float-right">view all</button>
                           <button class="btn btn-info btn-group-sm float-right mr-2">Print</button>

                        </nav>

                      </div>
                    
                     </div>
                    <!-- data table showing -->
                    <!-- income table start -->
                    <div class="table-responsive d-none" id="income-table-div">
                      <!-- Projects table -->
                      <table id="income-table" data-turbolinks="false" class="table align-items-center table-flush ">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Charges</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    <!-- income table end -->
                     <!-- expense table start -->
                    <div class="table-responsive d-none " id="expense-table-div">
                      <!-- Projects table -->
                      <table id="expense-table" data-turbolinks="false" class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Transcation Reason</th>
                            <th scope="col">Transcation Amount</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- expense table end -->
                </div>

               

              </div>
          </div>
        </div>

        <!-- for large device view start -->
        <div class=" col-xl-4 col-lg-5   ">
          <div class="card h-100  bg-gradient-muted shadow">
            <div class="card-header border-0 pb-0">
              <h6 class="h4 ">Monthly Overview</h6>
            </div>
            <div class="card-body">
              <!-- Chart -->
              
              
              
               <div class="">
                  <div class="h-100 card card-stats">
                     <div class="card-body">
                      <div class="row">
                          <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                              <span class="h2 font-weight-bold mb-0">2,356</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                          </div>
                      </div>
                      <p class="mt-3 mb-0 text-sm">
                          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                          <span class="text-nowrap">Since last month</span>
                      </p>
                    </div>
                  </div>
               </div>

               <div class="mt-3">
                  <div class="h-100 card card-stats">
                     <div class="card-body">
                      <div class="row">
                          <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                              <span class="h2 font-weight-bold mb-0">2,356</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                          </div>
                      </div>
                      <p class="mt-3 mb-0 text-sm">
                          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                          <span class="text-nowrap">Since last month</span>
                      </p>
                    </div>
                  </div>
               </div>
               <hr>
               <!-- expense categories start -->
               <div class="">
                 <h3 class="h4 text-dark mb-4 ">Expense by category</h3>

                  
                 <!-- <div class="">
                    <div class="h-100 card card-stats">
                       <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                  <i class="ni ni-chart-pie-35"></i>
                              </div>
                            </div>
                            <div class="col-auto">
                                <h5 class="card-title text-uppercase text-muted mb-0">Medicine </h5>
                                <span class="h2 font-weight-bold mb-0">2,356</span>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                
                                <span class="text-nowrap">Since last month</span>
                            </p>
                            
                        </div>
                        
                      </div>
                    </div>
                 </div>

                 <div class="mt-4">
                    <div class="h-100 card card-stats">
                       <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                  <i class="ni ni-chart-pie-35"></i>
                              </div>
                            </div>
                            <div class="col-auto">
                                <h5 class="card-title text-uppercase text-muted mb-0">Others</h5>
                                <span class="h2 font-weight-bold mb-0">2,356</span>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                               
                                <span class="text-nowrap">Since last month</span>
                            </p>
                            
                        </div>
                        
                      </div>
                    </div>
                 </div> -->
                 <ul class="dot-list ">
                                    
                
                    <li ><div class="bullet big"></div>
                      <div class="card p-3 my-card">
                        
                         <span style="letter-spacing: 0.1rem">Dr.Daw Ni Ni Win</span> 
                         <span class="small" style="letter-spacing: 0.1rem"><i class="fas fa-clock"></i>19:00am-1:00pm</span> 
                        
                      </div>

                    </li>

                    <li ><div class="bullet big"></div>
                      <div class="card p-3 my-card">
                        
                         <span style="letter-spacing: 0.1rem">Dr.Daw Tin Tin May</span> 
                         <span class="small" style="letter-spacing: 0.1rem"><i class="fas fa-clock"></i>1:00pm-6:00pm</span> 
                        
                      </div>

                    </li>

                    <li ><div class="bullet big"></div>
                      <div class="card p-3 my-card">
                        
                         <span style="letter-spacing: 0.1rem">Dr.Daw May Lay</span> 
                         <span class="small" style="letter-spacing: 0.1rem"><i class="fas fa-clock"></i>6:00am-10:00pm</span> 
                        
                      </div>

                    </li>
                     <li ><div class="bullet big"></div>
                      <div class="card p-3 my-card">
                        
                         <span style="letter-spacing: 0.1rem">Dr.U Lwin Maung</span> 
                         <span class="small" style="letter-spacing: 0.1rem"><i class="fas fa-clock"></i>6:00am-10:00pm</span> 
                        
                      </div>

                    </li>
                    
                  </ul>

               </div>
               <!-- expense categories end -->

               
                
              </div>
            </div>
          </div>


        </div>
        <!-- for large device view end -->
        
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

  <div class="container-fluid mt--7 d-xl-none d-lg-none d-md-block d-sm-block d-xs-block d-block">
   
            <div class="row">
               <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                  <div class="card card-profile shadow">
                     <div class="row justify-content-center p-3">
                        <div class="col order-lg-2">
                           
                            <h6 class="h4 ">Tansaction Report </h6>
                          
                        </div>
                        <div class="col text-right">
                          <a href="" class="btn btn-sm btn-primary">Search Report</a>
                        </div>
                     </div>
                     
                     <div class="card-body pt-0 pt-md-4 ">
                      <!-- for home mobile view -->
                        <div class="row">
                           <div class="col">

                               <!-- for seach view form start -->
                                <!-- from start -->
                          <form id="search-form-mobile-view"  method="post" class="d-none" >
                            <div class="alert alert-primary success d-none" role="alert">
                                
                             </div>
                              <div  class="form-row">
                                  <div class="col form-group">
                                  <label for="startDate">Start Date</label>
                                  <input type="date" name="startdate" id="startDate" placeholder="enter Start date" class="d-inline form-control ">
                                  <span class="Sdate error" ></span>
                                </div>

                                <div class="col form-group">
                                  <label for="endDate">End Date</label>
                                  <input type="date" name="enddate" id="endDate" placeholder="enter End date" class="d-inline form-control ">
                                  <span class="Edate error" ></span>
                                </div>
                              </div>
                              
                            </form>
                          <!-- from end -->

                          <!-- half pie chart -->
                          <div class="text-center">
                            <canvas id="chart-area-2" />
                          </div>

                          
                        <!-- for seach view form end -->



                              <div class="card-profile-stats d-flex justify-content-center mt-md-5 ">
                                 <div>
                                    <span class="heading ">2200000</span>
                                    <span class="description text-danger">Expense</span>
                                 </div>
                                 <div>
                                    <span class="heading">10000000</span>
                                    <span class="description text-success">Income</span>
                                 </div>
                                 <div>
                                    <span class="heading">400000</span>
                                    <span class="description text-primary">Net</span>
                                 </div>
                              </div>
                           </div>
                          
                        </div>
                        <!-- for mobile view end -->
                        

                         <!-- data showing end -->
                  
                          <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-6 col-sm-6 col-xs-6 col-6">
                            
                              <h3 class=" p-0 pr-4 mt-3 ">Income List</h3>
                              <h6 class="small text-muted p-0  mt-3 ">2020-1-10 to 2020-1-30</h6>
                              
                            </div>
                            
                            <div class="col-xl-4 col-lg-6 col-sm-6 col-xs-6 col-6">
                              <nav aria-label="breadcrumb text-right " class="float-right">
                                <ol class="breadcrumb bg-transparent ">
                                  <li class="breadcrumb-item"><a href="#">Income</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Expense</li>

                                  
                                </ol>

                              </nav>
                            </div>
                          
                           </div>
                          <!-- data table showing -->

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
                     <!-- searh card body start -->

                     <!-- searh card body end -->
                  </div>
               </div>
            </div>
            <!-- Footer -->
           <!--  <footer class="footer">
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
            </footer> -->
         
  </div>
@endsection
@section('script')
<script>
 

  $(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    

    // half pie chart start
    var config_2 = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                  1,
                  1
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                
            ]
        },
        options: {
            legend: {
                display: false
            },
            circumference:1 * Math.PI,
            rotation: -1 * Math.PI,
            title: {
               display: true,
               text:'helo',
               position: 'bottom'
            }
        }
    };
     var ctx_2 = document.getElementById("chart-area-2").getContext("2d");            
        
        window.myDoughnut_2 = new Chart(ctx_2, config_2);
    // half pie chart end

    //chaning format
    function formatDate(date){
      var formattedDate = new Date(date);
            var dd = String(formattedDate.getDate()).padStart(2, '0');
            var mm = String(formattedDate.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = formattedDate.getFullYear();

           return yyyy + '-' + mm + '-' + dd;
           
    }

    //getDataforcurrentmonth
    var date = new Date(), y = date.getFullYear(), m = date.getMonth();
    var firstDay = formatDate(new Date(y, m, 1));
    var endDay = formatDate(date);

    $('.startDate-title').html(firstDay);
    $('.endDate-title').html(endDay);

     getReport(firstDay,endDay,"income");

   function getReport(sdate,edate,name){
      // ajax start
          $.ajax({
            url:"{{route('getexpenseReport')}}",
            type:'POST',
            data:{sDate:sdate,eDate:edate,name:name},
            success:function(res){
              let expenseTotal=res.data.totalExpense;
              let incomeTotal=res.data.totalIncome;
              let net=incomeTotal - expenseTotal;
              let nameClass=null;
              // console.log(net);
              if(net< 0){
                net=net * (-1);
                nameClass="text-danger";

              }else{
                net=net;
                nameClass="text-success";
              }
              console.log(res.data);

              if("expense" in res.data){
                tableExpense(sdate,edate,res.data.expense);
              }else{
               tableIncome(sdate,edate,res.data.income)
              }
             
              $('.expense-outcome').text(expenseTotal+'Ks');
              $('.income-outcome').text(incomeTotal+'Ks');
              $('.net-outcome').text(net +'Ks');
              $('.net-outcome').addClass(nameClass);

             
              
            },
            error:function(error){
              console.log(error);
            }

          })
      // ajax end
   }

   function tableIncome(sdate,edate,income){
    $('#expense-table-div').addClass('d-none');
      $('#income-table-div').removeClass('d-none');
       $('#expense-table').DataTable().clear().destroy();
             $('#income-table').DataTable({
                  "destroy":true,
                  "data":income,
                  "searching":false,
                  scrollY:'50vh',
                  scrollCollapse: true,
                  "columns":[
                    {data:"created_at",
                    render:function(data){
                      let date=new Date(data);
                        return date.toLocaleDateString();
                    }},
                    {"data":'patient.name'},
                    {"data":'charges'}
                  
                  ],
                  "info":false,
                  "paging":false,
                })

    }

    function tableExpense(sdate,edate,expense){
      $('#income-table-div').addClass('d-none');
      $('#expense-table-div').removeClass('d-none');
      // $('#income-table').DataTable().clear().destroy();
      $('#expense-table').DataTable({
          "destroy":true,
          "data":expense,
          "searching":false,
        

        scrollCollapse: true,
          "columns":[
            {"data":"date"},
            {"data":"description"},
            {"data":'amount'},
            
          
          ],
          "info":false,
          "paging":false,
        })
    }
    



    $('.income-button-show').click(function(){

      $('#expense-table-div').addClass('d-none');
      $('#income-table-div').removeClass('d-none');
      $('.expense-title-show').addClass('d-none');
      $('.income-title-show').removeClass('d-none');
      getReport(firstDay,endDay,"income");

    })

     $('.expense-button-show').click(function(){
      // alert('helo');
      $('#income-table-div').addClass('d-none');
      $('#expense-table-div').removeClass('d-none');
      $('.income-title-show').addClass('d-none');
      $('.expense-title-show').removeClass('d-none');
      getReport(firstDay,endDay,"expense");
       // getReport(firstDay,endDay,'expense');
    })

     //seaching with start and end
       $('#search input[name="enddate"]').change(function(){
        // e.preventDefault();
        // alert('helo');
          var formdata= new FormData();
        firstDay=$('#search input[name="startdate"]').val();
        endDay=$('#search input[name="enddate"]').val();
        // formdata.append('startdate',startdate);
        // formdata.append('enddate',enddate);
        $('.startDate-title').html(firstDay);
        $('.endDate-title').html(endDay);
        $('.expense-title-show').addClass('d-none');
         $('.income-title-show').removeClass('d-none');
        getReport(firstDay,endDay,'income');
        // console.log(startdate,enddate);
          // var url="{{route('searchReport')}}";
          // $.ajax({
          //           type:'POST',
          //           url: url,
          //           data: formdata,
          //           cache:false,
          //           contentType: false,
          //           processData: false,
          //           success: (data) => {
          //             console.log(data);
          //              // if(data){
          //              //  var expense=data.totalExpense;
          //              //  var income=data.totalIncome;
          //              //  var profit=income-expense;
          //              //  $('.totalExpense').text(expense);
          //              //  $('.totalIncome').text(income);
          //              //  $('.totalProfit').text(profit);
          //              //  $('.totalExpense').addClass('text-dark');
          //              //  $('.totalIncome').addClass('text-dark');
          //              //  $('.totalProfit').addClass('text-dark');
          //              // }
                           
          //           },
          //           error: function(error){
          //              var errors=error.responseJSON.errors;
          //              if(errors){
          //                 $('.Sdate').text(errors.startdate);
          //                 $('.Edate').text(errors.enddate);
          //                 $('span.error').addClass('text-danger');
          //              }
          //           }
          //       });




      })
    //seaching with start and end


  })
</script>
@endsection
 