@extends('frontendTemplate')
@php 
$treatmentcount=0;
$appointmentcount=0;



foreach($survey as $a){
  $treatmentcount+=$a->treatments_count;
  $appointmentcount+=$a->appointments_count;
}



@endphp
@section('style')
<style type="text/css">
  .parent {
  position: relative;
  text-align: center;
  color: white;
}
  .top-right {
  position: absolute;
  top: -26px;
  right: 0px;

}
.img-remove:hover{
  cursor: pointer;
}

.danger{
  border: none;
  background-color: transparent;
  color: red;
  font-size: 20px;
  cursor: pointer;
}
.danger:hover{
  border: ;
  background-color: transparent;
  color: red;
  font-size: 20px;
  cursor: pointer;
}

div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0 !important;
    display: inline-block;
    width: auto;
}


</style>

@endsection
@section('add')
	<div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0"> Patient</h5>
                  <span class="h2 font-weight-bold mb-0">{{count($patientlists)}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <i class="fas fa-chart-bar"></i>
                  </div>
                </div>
              </div>
             <!--  <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Doctor</h5>
                  <span class="h2 font-weight-bold mb-0">{{count($survey)}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-chart-pie"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                <span class="text-nowrap">Since last week</span>
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Treatment</h5>
                  <span class="h2 font-weight-bold mb-0">{{$treatmentcount}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span class="text-nowrap">Since yesterday</span>
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Booking</h5>
                  <span class="h2 font-weight-bold mb-0">{{$appointmentcount}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <i class="fas fa-percent"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span class="text-nowrap">Since last month</span>
              </p> -->
            </div>
          </div>
        </div>
      </div>
@endsection
@section('content')

	<div class=" mt-5 p-2">
       <div class="col-xl-12 row card-deck">
           <!-- <div class="col-xl-6 mb-5 mb-xl-0"> -->

              <div class="card col-xl-6 mb-5 mb-xl-0 shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                     <!--  <a href="{{route('appointpatient')}}" class="btn btn-sm btn-danger float-right">see all</a> -->
                      <h3 class="mb-0">Today Patient list</h3>
                     
                    </div>
                    
                       <div class="col alert alert-success success d-none" role="alert">
              
                      </div>
                    
                    
                  </div>
                </div>
                <div class="table-responsive p-3">
                  <!-- Projects table -->
                  <table class="table  align-items-center table-flush datatable">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">PRN</th>
                        <th scope="col">Doctor</th>
                       
                       
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($wpatients as $k=>$v)
                      <tr>
                        <td>{{$v->patient->name}}</td>
                        <td>{{$v->patient->PRN}}</td>
                        <td>{{$v->doctor->user->name}}</td>
                        
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>

            <!-- </div> -->

            <!-- <div class="col-md-6 "> -->

              <div class="card col-xl-6 mb-5 mb-xl-0 shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <a href="{{route('treatment.index')}}" class="btn btn-sm btn-danger float-right">see all</a>
                      <h3 class="mb-0"> Patient list</h3>
                     
                    </div>
                    
                       <div class="col alert alert-success success d-none" role="alert">
              
                      </div>
                    
                    
                  </div>
                </div>
                <div class="table-responsive p-3">
                  <!-- Projects table -->
                  <table class="table align-items-center table-flush datatable">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">PRN</th>
                        
                         <th scope="col">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($patients as $k=>$v)
                      <tr>
                        <td>{{$v->patient->name}}</td>
                        <td>{{$v->patient->PRN}}</td>
                        
                        <td><a href="{{route('treatment.show',$v->patient_id)}}" class="btn btn-sm btn-info">Detail</a></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
       </div>

       <div class="col-xl-12 row card-deck mt-3">
           <!-- <div class="col-xl-6 mb-5 mb-xl-0"> -->

              <div class="card col-xl-12 mb-5 mb-xl-0 shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                     
                      <h3 class="mb-0">Doctor list  for {{\Carbon::today()->toDateString()}} </h3>
                     
                    </div>
                    
                       <div class="col alert alert-success success d-none" role="alert">
              
                      </div>
                    
                    
                  </div>
                </div>
                <div class="table-responsive p-3">
                  <!-- Projects table -->
                  <table class="table align-items-center table-flush datatable">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name</th>
                        
                        
                        <th scope="col">Appointment</th>
                        <th scope="col">Treatment</th>
                       
                        
                        
                      </tr>
                    </thead>
                    <tbody >
                 
                     <!-- count($survey[0]->appointments) -->
                     {{--@php
                     for($i=0;$i<count($survey[0]->treatments);$i++){
                     echo $survey[0]->treatments[$i]->patient_id;
                   }

                     @endphp--}}


                     @foreach($survey as $a)
                    
                      <tr>
                        <td>{{$a->user->name}}</td>
                        
                        
                        
                        <td>{{$a->todaydoctorBooking}}</td>
                        <td>{{$a->treatments_count}}</td>
                       
                      </tr>
                      
                     @endforeach

                    
                      
                    </tbody>
                  </table>
                  </table>
                </div>
              </div>

            <!-- </div> -->

            <!-- <div class="col-md-6 "> -->

              <div class="card col-xl-12 mb-5 mb-xl-0 shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <!-- <a href="{{route('treatment.index')}}" class="btn btn-sm btn-danger float-right">see all</a> -->
                      <h3 class="mb-0"> Patient list</h3>
                     
                    </div>
                    
                       <div class="col alert alert-success success d-none" role="alert">
              
                      </div>
                    
                    
                  </div>
                </div>
                <div class="table-responsive p-3">
                  <!-- Projects table -->
                 <table class="table align-items-center table-flush datatable">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">PRN</th>
                        
                        <th scope="col">Contact</th>
                        
                        <th scope="col">Visit </th>
                       
                        
                        
                      </tr>
                    </thead>
                    <tbody >
                 
                     <!-- count($survey[0]->appointments) -->
                     {{--@php
                     for($i=0;$i<count($survey[0]->treatments);$i++){
                     echo $survey[0]->treatments[$i]->patient_id;
                   }

                     @endphp--}}

                     @foreach($patientlists as $a)
                    
                      <tr>
                        <td>{{$a->name}}</td>
                        <td>{{$a->PRN}}</td>
                        <td>{{$a->phoneno}}</td>
                        
                        <td>{{count($a->treatments)}}</td>
                       
                      </tr>
                      
                     @endforeach

                    
                      
                    </tbody>
                  </table>
                  </table>
                </div>
              </div>
       </div>

       <div class="col-xl-12 row card-deck mt-3">
           <!-- <div class="col-xl-6 mb-5 mb-xl-0"> -->

              <div class="card col-xl-12 mb-5 mt-3 mb-xl-0 shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <a href="{{route('appointment.create')}}" class="btn btn-sm btn-danger float-right">see all</a>
                      <h3 class="mb-0">Appoint list</h3>
                     
                    </div>
                    
                       <div class="col alert alert-success success d-none" role="alert">
              
                      </div>
                    
                    
                  </div>
                </div>
                <div class="table-responsive p-3">
                  <!-- Projects table -->
                 <table class="table align-items-center table-flush datatable">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">A_Date</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Token</th>
                        
                      </tr>
                    </thead>
                    <tbody >
                 
                     <!-- count($survey[0]->appointments) -->
                     {{--@php
                     for($i=0;$i<count($survey[0]->treatments);$i++){
                     echo $survey[0]->treatments[$i]->patient_id;
                   }

                     @endphp--}}

                     @foreach($survey1 as $a)
                    
                      <tr>
                        <td>{{$a->name}}</td>
                        <td>{{$a->phone}}</td>
                        <td>{{$a->A_Date}}</td>
                        <td class="my-td">{{$a->doctor->user->name}}({{$a->doctor->degree}})</td>
                        <td>{{$a->TokenNo}}</td>
                      </tr>
                      
                     @endforeach

                    
                      
                    </tbody>
                  </table>
                  </table>
                </div>
              </div>

            
       </div>


       
        

  </div>


    

    


      <!-- modal start -->
      <!-- Button trigger modal -->


      <!-- Add Model -->

      <!-- modal end -->


      <!-- Edit Modal -->

      <!-- modal end -->

@endsection
@section('script')
<script type="text/javascript">

	
$(document).ready(function(){
  $('.datatable').dataTable({
    sort:false,
    pagingType: 'full_numbers',
                 pageLength: 10,
                 language: {
                   oPaginate: {
                     sNext: '<i class="fa fa-forward"></i>',
                     sPrevious: '<i class="fa fa-backward"></i>',
                     sFirst: '<i class="fa fa-step-backward"></i>',
                     sLast: '<i class="fa fa-step-forward"></i>'
                     }
                   } ,
  });
})



 


</script>


@endsection

