@extends('frontendTemplate')
@section('content')

@php
$file=json_decode($treatments[0]->patient->file,true);

$finalMedication=[];
$medications=[];
$information=[];

foreach($treatments as $treatment)
{
	

		foreach($treatment->medicines as $medicine){
		$medication['tab']=$medicine->pivot->tab;
		$medication['interval']=$medicine->pivot->interval;
		$medication['meal']=$medicine->pivot->meal;
		$medication['during']=$medicine->pivot->during;
		$medication['type']=$medicine->pivot->type;
		$medication['visitdate']=Carbon::parse($medicine->created_at)->isoFormat('Y-M-D');
		$medication['med_name']=$medicine->name;
		$medication['med_chemical']=$medicine->chemical;
		$medication['med_type']=$medicine->medicinetype->name;
		
		array_push($finalMedication,$medication);
		}
	
}



 @endphp
<div class="row">
   <div class="col-xl-4 mb-3">
      <div class="card bg-default">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                 
                   <h5 class="text-light text-uppercase ls-1 mb-1">Information of Patient</h5>
                  <h6 class="h3 text-white mb-0"></h6>
               </div>
               <div class="col">
                 <!--  <ul class="nav nav-pills justify-content-end">
                     <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                        </a>
                     </li>
                     <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                        </a>
                     </li>
                  </ul> -->
               </div>
            </div>
         </div>
         <div class="card-body">
            <!-- Chart -->
            <div class=" ">
              <div class="row">
	              	 <div class="col-md-12 d-xl-block d-lg-block d-md-block d-xm-block d-sm-block ">
		               	<p class="d-inline-block text-white mr-2">Name: </p><h4 class="d-inline-block text-white">{{$treatments[0]->patient->name}}</h4>
		               	<div style="clear: both;"></div>
		               	<p class="d-inline-block text-white mr-2">Age:</p> <h4 class="d-inline-block text-white">{{$treatments[0]->patient->age}}years</h4>
		               	<div style="clear: both;"></div>
		               	<p class="d-inline-block text-white mr-2">Gender:</p> <h4 class="d-inline-block text-white">{{$treatments[0]->patient->gender}}</h4>
		               	<div style="clear: both;"></div>
		               	<p class="d-inline-block text-white mr-2">Phone:</p> <h4 class="d-inline-block text-white">{{$treatments[0]->patient->phoneno}}</h4>
		               	<div style="clear: both;"></div>
		               	<p class="d-inline-block text-white mr-2">Address:</p> <h4 class="d-inline-block text-white">{{$treatments[0]->patient->address}}</h4>
		               	<div style="clear: both;"></div>
		               	<p class="d-inline-block text-white mr-2">Job:</p> <h4 class="d-inline-block text-white">{{$treatments[0]->patient->job}}</h4>
	               </div>
	               <!-- <div class="col-md-6 d-xl-block d-lg-block d-md-block d-xm-none d-sm-none d-none ">
	               		<img src="{{asset($file[0])}}"  class="img-fluid"alt="helo">
	               </div> -->
              </div>
               
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-8">
      <div class="card">
         <div class="card-header bg-transparent">
            <div class="row align-items-center">
               <div class="col">
                  <h5 class="text-uppercase text-muted ls-1 mb-1">Doctor Examination</h5>
                  
               </div>
            </div>
         </div>
         <div class="card-body p-0 m-0">
            <!-- Chart -->
            <div class="">
               <div class="table-responsive p-1">
	            <!-- Projects table -->
	            <table class="table align-items-center table-flush dataTables">
	               <thead class="thead-light">
	                  <tr>
	                     <th scope="col">Visit Date</th>
	                     <th scope="col">Complaint</th>
                        <th scope="col">Examination</th>
                        <th scope="col">chronic_disease</th>
	                  </tr>
	               </thead>
	               <tbody>
	               		@foreach($treatments as $treatment)
	               		<tr>
	               			<td>{{Carbon::parse($treatment->created_at)->isoFormat('Y-M-D')}}</td>
	               			<td class="my-td">{{$treatment->complaint==null ? '--':$treatment->complaint}}</td>
                           <td class="my-td">{{$treatment->examination==null ? '--':$treatment->examination}}</td>
                           <td class="my-td">{{$treatment->chronic_disease==null ? '--':$treatment->chronic_disease}}</td>
	               		</tr>
	               		@endforeach
	               </tbody>
	            </table>
	         </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row ">
   <div class="col-xl-12  ">
      <div class="card  ">
         <div class="card-header border-0">
            <div class="row align-items-center">
               <div class="col">
                  <h3 class="mb-0">Vitals</h3>
               </div>
               
            </div>
         </div>
         <div class="table-responsive p-2 ">
            <!-- Projects table -->
            <table class="table align-items-center table-flush dataTable">
               <thead class="thead-light ">
                  <tr>
                     <th scope="col">Visit Date</th>
                     <th scope="col">Gc Level </th>
                     <th scope="col">SPO2</th>
                     <th scope="col">Pb</th>
                     <th scope="col">Bp</th>
                     <th scope="col">Rbs</th>
                     <th scope="col">Temperature</th>
                     <th scope="col">Body Weight</th>
                  </tr>
               </thead>
               <tbody>
               	@foreach($treatments as $treatment)
                  <tr>
                     <th scope="row">
                       {{Carbon::parse($treatment->created_at)->isoFormat('Y-M-D')}}
                     </th>
                     <td>
                       {{$treatment->gc_level==null ? '-':$treatment->gc_level}}
                     </td>
                     <td>
                        {{$treatment->spo2==null ? '--':$treatment->spo2}}
                     </td>
                     <td>
                     	{{$treatment->pr==null ? '--':$treatment->pr}}
                     </td>
                     <td>
                     	{{$treatment->bp==null ? '--':$treatment->bp}}
                     </td>
                     <td>
                     	{{$treatment->rbs==null ? '--':$treatment->rbs}}
                     </td>
                     <td>
                     	{{$treatment->temperature==null ? '--':$treatment->temperature}}
                     </td>
                     <td>
                        
                     	{{$treatment->patient->body_weight==null ? '--':$treatment->patient->body_weight}}
                    	 
                     </td>
                  </tr>
                  @endforeach
                 
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div class="col-xl-12 mt-3">
      <div class="card">
         <div class="card-header border-0">
            <div class="row align-items-center">
               <div class="col">
                  <h3 class="mb-0">Medications</h3>
               </div>
               
            </div>
         </div>
         <div class=" p-2">
            <!-- Projects table -->
            <table class="table align-items-center table-flush dataTable">
               <thead class="thead-light">
               	
                  <tr>
                     <th scope="col">Visit Date</th>
                     <th scope="col">Name</th>
                     <th scope="col">Medical Type</th>
                     <th scope="col">chemical</th>
                     <th scope="col">Tab</th></th>
                     <th scope="col">Interval</th>
                     <th scope="col">Injection</th>
                     <th scope="col">Meal</th>
                     <th scope="col">During</th>
                  </tr>

               </thead>
               <tbody>

               		
               	@foreach($finalMedication as $value)
                  <tr>
                     <th scope="col">{{$value['visitdate']}}</th>
                     <th scope="col">{{$value['med_name']==null? '-':$value['med_name']}}</th>
                     <th scope="col">{{$value['med_type']==null? '-':$value['med_type']}}</th>
                     <th scope="col">{{$value['med_chemical']==null? '-':$value['med_chemical']}}</th>
                     <th scope="col">{{$value['tab']==null? '-':$value['tab']}}</th></th>
                     <th scope="col">{{$value['interval']==null? '-':$value['interval']}}</th>
                     <th scope="col">{{$value['type']==null? '-':$value['type']}}</th>
                     <th scope="col">{{$value['meal']==null? '-':$value['meal']}}</th>
                     <th scope="col">{{$value['during']==null? '-':$value['during']}}</th>
                  </tr>
                  @endforeach
                  
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

@endsection
@section('script')
<script>
   // Call the dataTables jQuery plugin
$(document).ready(function() {

   
  $('.dataTable').DataTable(
   {
      order: [ 5, 'asc' ],
      aLengthMenu: [[5, 20, 35, -1], [5, 20, 35, "All"]],
        iDisplayLength: 5,
 pagingType: 'full_numbers',
 pageLength: 5,
 language: {
 oPaginate: {
   sNext: '<i class="fa fa-forward"></i>',
   sPrevious: '<i class="fa fa-backward"></i>',
   sFirst: '<i class="fa fa-step-backward"></i>',
   sLast: '<i class="fa fa-step-forward"></i>'
   }
   } 
  }
 );



  $('.dataTables').DataTable(
   {
      "scrollY":"200px",
       dom: 'lfrtip',
        "scrollCollapse":true,
        "paging":false,
         "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": '',
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }


  }
 );


});


</script>
@endsection