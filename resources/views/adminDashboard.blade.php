@extends('frontendTemplate')
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

@php 
$treatmentcount=0;
$appointmentcount=0;
$doctorcount=0;
$receptioncount=0;
$clinic=count($survey);


foreach($survey as $a){
  $treatmentcount+=$a->treatments_count;
  $appointmentcount+=$a->appointments_count;
  $doctorcount+=$a->doctors_count;
  $receptioncount+=$a->receptions_count;

}




@endphp

@section('add')
	<div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Clinic</h5>
                  <span class="h2 font-weight-bold mb-0">{{$clinic}}</span>
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
                  <span class="h2 font-weight-bold mb-0">{{$doctorcount}}</span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Reception</h5>
                  <span class="h2 font-weight-bold mb-0">{{$receptioncount}}</span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Treatment</h5>
                  <span class="h2 font-weight-bold mb-0">{{$treatmentcount}}</span>
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
                      <a href="{{route('appointpatient')}}" class="btn btn-sm btn-danger float-right">see all</a>
                      <h3 class="mb-0">Today Patient list</h3>
                     
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
                        <th scope="col">Doctor </th>
                        <th scope="col">Clinic </th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($survey as $s)
                       @foreach($s->doctors as $t)
                          @foreach($t->treatments as $treatment)
                          <tr>
                            <td>{{$treatment->patient->name}}</td>
                            <td>{{$treatment->patient->PRN}}</td>
                            <td>{{$treatment->doctor->user->name}}</td>
                            <td>{{$treatment->doctor->owner->clinic_name}}</td>
                          </tr>
                          @endforeach
                        @endforeach
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

            <!-- </div> -->

            <!-- <div class="col-md-6 "> -->

                <div class="col-md-6 card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Treatments</h3>
                     
                    </div>
                    
                       <div class="col alert alert-success success d-none" role="alert">
              
                      </div>
                    
                    
                  </div>
                </div>
                <div class="table-responsive p-3" >
                  <!-- Projects table -->
                  <table class="table align-items-center table-flush datatable">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name.</th>
                        <th scope="col">PRN</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Clinic</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody >

                 
                     @foreach($survey as $s)
                       
                          @foreach($s->treatments as $treatment)
                          <tr>
                            <td>{{$treatment->patient->name}}</td>
                            <td>{{$treatment->patient->PRN}}</td>
                            <td>{{$treatment->doctor->user->name}}</td>
                            <td>{{$treatment->doctor->owner->clinic_name}}</td>
                             <td><a class="btn btn-info btn-sm" href="{{route('treatment.show',$treatment->patient_id)}}">Detail</a></td>
                          </tr>
                          @endforeach
                        
                      @endforeach
                    
                    
                      
                    </tbody>
                  </table>
                </div>
              <!-- </div> -->
              
            </div>
       </div>

       <div class="col-xl-12 row card-deck mt-3">
           <!-- <div class="col-xl-6 mb-5 mb-xl-0"> -->

              <div class="card col-xl-6 mb-5 mb-xl-0 shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <a href="{{route('patient.index')}}" class="btn btn-sm btn-danger float-right">see all</a>
                      <h3 class="mb-0">Patient list</h3>
                     
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
                       
                        <th scope="col">Clinic </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($survey as $s)
                       @foreach($s->patients as $treatment)
                          
                          <tr>
                            <td>{{$treatment->name}}</td>
                            <td>{{$treatment->PRN}}</td>
                            <td>{{$treatment->reception->owner->clinic_name}}</td>
                            
                          </tr>
                          
                        @endforeach
                      @endforeach
                     
                      
                    </tbody>
                  </table>
                </div>
              </div>

            <!-- </div> -->

            <!-- <div class="col-md-6 "> -->

                <div class="col-md-6 card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">

                      <h3 class="mb-0">Medicine List</h3>
                     
                    </div>
                    
                       <div class="col alert alert-success success d-none" role="alert">
              
                      </div>
                    
                    
                  </div>
                </div>
                <div class="table-responsive p-3" >
                  <!-- Projects table -->
                  <table class="table align-items-center table-flush" id="medicineTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Chemical Things</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              <!-- </div> -->
              
            </div>
       </div>
       
        

  </div>


    

    


      

@endsection
@section('script')
<script type="text/javascript">

	
$(document).ready(function(){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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

  getData();

  function getData(){
          var i=1;
              $('#medicineTable').DataTable({
              
              "processing": true,
              destroy:true,
              "sort":false,
              pagingType: 'full_numbers',
               pageLength: 5,
               language: {
                 oPaginate: {
                   sNext: '<i class="fa fa-forward"></i>',
                   sPrevious: '<i class="fa fa-backward"></i>',
                   sFirst: '<i class="fa fa-step-backward"></i>',
                   sLast: '<i class="fa fa-step-forward"></i>'
                   }
                 } ,
                 "serverSide": true,
                 "stateSave": true,  //restore table state on page reload,
               "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
              "ajax": "{{route('getMedicine')}}",
              "columns":[

                   {data:'DT_RowIndex'},

                  { "data": "name",
                  render:function(data){
                    $('.btnEdit').attr('data-name', data);
                    return data;
                  } },

                  { "data": "medcinetype"
                  } ,

                  { "data": "chemical"
                  } ,

                  { "data": "id",
                    sortable:false,
                    render:function(data){
                      return `<button class="btn btn-primary btn-sm d-inline-block btnEdit "  data-id="${data}"><i class="ni ni-settings"></i></button>
                                <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${data}"> <i class="ni ni-fat-delete"></i></button>`;
                    }
                   }
              ],
              "info":false
              
           });
      }
})



 


</script>


@endsection

