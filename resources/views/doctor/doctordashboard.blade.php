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
@section('add')
	<div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Referred Patient</h5>
                  <span class="h2 font-weight-bold mb-0">{{$survey[0]->referred_by_count}}</span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Assigned Patient</h5>
                  <span class="h2 font-weight-bold mb-0">{{$survey[0]->referred_from_count}}</span>
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
                  <span class="h2 font-weight-bold mb-0">{{$survey[0]->treatments_count}}</span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Appointment</h5>
                  <span class="h2 font-weight-bold mb-0">{{$survey[0]->appointments_count}}</span>
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
                        <th scope="col">Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($wpatients as $k=>$v)
                      <tr>
                        <td>{{$v->patient->name}}</td>
                        <td>{{$v->patient->PRN}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('appointpatienthistory',[$v->id,$v->patient_id])}}">Pending</a></td>
                      </tr>
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
                      <h3 class="mb-0">Appointment Request</h3>
                     
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
                        <th scope="col">A_Date</th>
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

                     @foreach($survey[0]->appointments as $a)
                    
                      <tr>
                        <td>{{$a->name}}</td>
                        <td>{{$a->A_Date}}</td>
                        <td>{{$a->TokenNo}}</td>
                      </tr>
                      
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
                      <a href="{{route('treatment.index')}}" class="btn btn-sm btn-danger float-right">see all</a>
                      <h3 class="mb-0">Treatment list</h3>
                     
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
                        <th scope="col">Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($survey[0]->treatments as $k=>$v)
                      <tr>
                        <td>{{$v->patient->name}}</td>
                        <td>{{$v->patient->PRN}}</td>
                        <td><a class="btn btn-info btn-sm" href="{{route('treatment.show',$v->patient_id)}}">Detail</a></td>
                      </tr>
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

                      <h3 class="mb-0">Assingend Patient</h3>
                     
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
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody >
                 
                     
                    
                    @if(!empty($survey[0]->referredFrom))
                    @foreach($survey[0]->referredFrom  as $a)
                    
                      <tr>
                        <td>{{$a->patient !=null ? $a->patient->name:''}}</td>
                        <td>{{$a->patient !=null ? $a->patient->PRN:''}}</td>
                        <td><a class="btn btn-info btn-sm" href="{{route('treatment.show',$a->patient_id)}}">Detail</a></td>
                      </tr>
                      
                     @endforeach
                     @endif
                    
                      
                    </tbody>
                  </table>
                </div>
              <!-- </div> -->
              
            </div>
       </div>
       
        

  </div>


    

    


      <!-- modal start -->
      <!-- Button trigger modal -->


      <!-- Add Model -->
<div class="modal fade" id="addExpense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Expense</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form start -->
      <form id="expense-from" method="post" enctype="multipart/form-data">
          <div class="modal-body p-2">
            	
            		
    				  
        			  <div class="col-md-12">
        			      <div class="form-group ">
        			        <input type="date" name="date" placeholder="" class="form-control is-valid" />
                      
        			      </div>
        			    </div>



        			    <div class="col-md-12">
        			      <div class="form-group">
        			      	<label for="description">Description</label>
        			        <input type="text" name="description" class="form-control" id="description" placeholder="why use?" />
                       <span class="description error "></span>
        			      </div>
                   
                    
        			    </div>
        			    
        			  
        			 
        			    <div class="col-md-12">
        			      <div class="form-group">
        			      	<label for="amount">Amount</label>
        			        <div class="input-group ">
        			        	
        			          <div class="input-group-prepend">
        			            <span class="input-group-text"><i class="ni  ni-credit-card"></i></span>
        			          </div>
        			           <input class="form-control" name="amount" id="amount" placeholder="$$$" type="text">

        			        </div>

                        <span class="amount error "></span>
                       
        			      </div>
        			    </div>
        			    

        			  
        			  
        			    <div class="col-md-12">
        			      <div class="form-group remove1">
        			      	<label for="Recepits" class="d-block">Recepits</label>
        			        <input type="file" name="file1" id="Recepits" placeholder="Success" class=" " />
                     <!--  <button type="button"  class="btn btn-danger btn-sm float-right delete1" data-id="1" ><span>×</span></button> -->
        			      </div>
                    
        			    </div>
                  
                    <div class="col-md-12 a" >
                      
                    </div>
                  

                  <div class="col-md-12" title="add more Recepits">
                      <button onclick="JavaScript:addmore(0);" type="button" class="btn btn-success" >
                      <i class="ni ni-fat-add "></i>
                      </button>
                    </div>
    				    
    				 
    				
            	
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary " value="Add Expense"/>
          </div>
      </form>
      <!-- form end -->
    </div>
  </div>
</div>
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

