@extends('frontendTemplate')
@section('content')
 @php
  $uri=$_SERVER['REQUEST_URI'];
  $uriarray=explode('/',$uri);
  $patientid=$uriarray[2];

 @endphp
<div class="row bg-white card">
   <div class="col-12" style="margin-top: 0;">
    <nav class="mx-5 my-3">
      <div class="nav nav-tabs my-3"  id="nav-tab" role="tablist">
        <a class="nav-item nav-link text-info active " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ptient History</a>

        <a class="nav-item nav-link text-info" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Treatment History</a>
        @hasanyrole('Super_Admin|Admin|Reception')
        <a class="nav-item nav-link text-warning " id="nav-transter-tab" data-toggle="tab" href="#nav-transfer" role="tab" aria-controls="nav-profile" aria-selected="false">Transfer History</a>
         @endhasanyrole
        <input type="hidden" value="{{$patient->id}}" name="PatientId">
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade  mx-3 my-3 active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

			<div class="card ml-4 bg-">
				<div class="card-header">
					<h2 class="text-center text-dark">{{$patient->name}} </h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<div class="span8">
			    			<h4><b>FatherName:</b> {{$patient->fatherName}}</h4>
			    			<h4><b>Age:</b> {{$patient->age}}
			    										@php 
			    										if($patient->child==0){
			    										echo "year";
			    									}else{
			    									echo"month";
			    								}
			    								@endphp
			    							</h4>
			    			<h4><b>Gender: </b>{{$patient->gender}}</h4>
			    			<h4><b>phoneno: </b>{{$patient->phoneno}}</h4>
			    			

			    		</div>
						</div>

						<div class="col-6">
							<div class="span2">
			    			<h4><b>Address: </b>{{$patient->address}}</h4>

			    			<h4><b>Married:</b> 
			    								@php 
			    								if($patient->married_status==0){
			    								echo "no";
			    							}else{
			    							echo"yes";
			    						}
			    						@endphp
			    					</h4>

			    			<h4><b>Pregnant:</b> 
			    						@php 
			    						if($patient->pregnant==0){
			    						echo "no";
			    					}else{
			    					echo"yes";
			    				}
			    				@endphp
			    			</h4>
			    			@foreach(json_decode($patient->file) as $photo)
			    			<a target="_blank" href="{{asset($photo)}}">
			    				<img src="{{asset($photo)}}" width="100px" height="100px">
			    			</a>

			    			@endforeach
			    			
			    		</div>
			    		

							
						</div>
					</div>


					{{--@php
			    		$dlength=count($doctors);
			    		@endphp
			    		@if($dlength>1)
			    		<button class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal" data-target="#staticBackdrop">incharge</button>
			    		@else
			    		<form method="post" action="{{route('incharge')}}" class="d-inline-block">
			    			@csrf
			    			<input type="hidden" name="patient_id" value="{{$patient->id}}">
			    			<button type="submit" class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal">incharge</button>
			    		</form>
			    		@endif--}}

				</div>
			</div> 



		</div>

    <!-- for doctor array for assign modal -->
    <input type="hidden" name="doctorsArray" value="{{json_encode($doctors)}}">



    	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    		<div class="accordion" id="accordionExample">

          @php $i=1; @endphp
          @foreach($treatments as $k=>$treatment)
          <div class="card my-3 ml-5">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapseOne">
                  {{$treatment->created_at}}
                </button>
              </h2>
            </div>

            <div id="collapse{{$i}}" class="collapse <?=($k==0)? 'show':''?>" aria-labelledby="headingOne bg-secondary" data-parent="#accordionExample">
              <div class="card-body">
               <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <p class="card-text"><strong>Complaint:  </strong>{{$treatment->complaint}} </p>
                  <p class="card-text"><strong>SPO2:</strong>{{$treatment->spo2}} </p>
                  <p class="card-text"><strong>PR:  </strong>{{$treatment->pr}} </p>
                  <p class="card-text"><strong>Temperature:</strong>{{$treatment->temperature}} </p>
                  <p class="card-text"><strong>Blood pressure:</strong>{{$treatment->bp}} </p>
                  <p class="card-text"><strong>RB2:</strong>{{$treatment->rbs}} </p>
                  <p class="card-text"><strong>Diagnosis:</strong>{{$treatment->diagnosis}} </p>
                  <p class="card-text"><strong>Body Weight:</strong>{{$treatment->body_weight}} </p>
                  <p class="card-text"><strong>Next Visit Date:</strong>{{$treatment->next_visit_date}} </p>
                  <p class="card-text"><strong>relevant_info:</strong>{{$treatment->relevant_info}} </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="row my-5">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Treatment and Drug</h3>
                        <table class="table text-center table-bordered table-dark">
                          <thead class="">
                            <th>drug name</th>
                            <th>tab</th>
                            <th>Interval</th>
                            <th>Meal</th>
                            <th>Duration</th>
                          </thead>
                          <tbody>
                            @php
                            $alltreaments=$treatment->medicines;

                            
                            @endphp
                            <!-- {{$alltreaments}} -->
                            @foreach($alltreaments as $key => $alldrugs)
                            @if($alldrugs->pivot->type==null)
                            <tr>
                              <td>{{$alldrugs->name}}</td>
                              <td>{{$alldrugs->pivot->tab}}</td>
                              <td>{{$alldrugs->pivot->interval}}</td>
                              <td>{{$alldrugs->pivot->meal}}</td>
                              <td>{{$alldrugs->pivot->during}}</td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Injection/Prodecure</h3>
                        <table class="table text-center table-bordered table-dark w-50">
                          <thead class="">
                            <th>injection</th>
                            <th>injection type</th>
                          </thead>
                          <tbody>
                            @php
                            $alltreaments=$treatment->medicines;
                            @endphp
                            <!-- {{$alltreaments}} -->
                            @foreach($alltreaments as $key => $allinjections)
                            @if($allinjections->pivot->type)
                            <tr>
                              <td>{{$allinjections->name}}</td>
                              <td>{{$allinjections->pivot->type}}</td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        @php $i++; @endphp
        @endforeach
    		</div>

    	</div>
 @hasanyrole('Super_Admin|Admin|Reception')
      <div class="tab-pane fade show " id="nav-transfer" role="tabpanel" aria-labelledby="nav-transfer-tab">
        
           <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="row mb-5">
                    <div class="col-12 px-5">
                      <div class="table-responsive">
                        <div class=" my-2">
                            <h2 class=" text-uppercase d-inline-block">Transfer List of <span class="text-danger">{{$patient->name}}</span></h2>
                            <button class="btn btn-danger  d-block btn-sm btn-newTransfer float-right"> New Transfer</button>
                        </div>
                      
                        <table class="table text-center table-bordered table-dark" id="AssignTable">
                          <thead class="">
                             <th>TransferDate</th>
                            <th>Recommend By Doctor</th>
                            <th>Remcommended Doctor</th>
                            <th>Reason</th>
                           
                            <th>Action</th>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                 
                </div>

      </div>
  @endhasanyrole
    </div>

</div>
</div>


<div class="modal fade indoctor" id="staticBackdrop"data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
       			 </button>
			<form method="post" action="{{route('incharge')}}" class="d-inline-block">
					@csrf
					<input type="hidden" name="patient_id" value="{{$patient->id}}">
					<div class="form-group">
						<label for="doctor" style="margin-left: 100px">Please choose doctor</label><br>
						<select name="doctor"  id="doctor" class="form-control" style="margin-left: 100px">
							@foreach($doctors as $row)
							<option value="{{$row->id}}">{{$row->user->name}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal">save</button>
				</form>
					
			</div>
			
		</div>
	</div>
</div>




<!-- doctor change and new model -->

<div class="modal fade"  id="doctor_change_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="max-height: 800px">

        <h3 class="modal-title" id="exampleModalLabel">
           {{$patient->reception->owner->clinic_name}} Clinic
        </h3>
        <!-- <h5 class="mr-4">{{date('Y:m:d')}}</h5> -->
        
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      
      <div class="modal-body" >
        <form id="changeDoctorForm" action="" method="post" enctype="multipart/form-data"> 
            <div>
                  <div class="form-group" >
                   <label for="exampleFormControlSelect1">From Who</label>
                   <input type="text" class="form-control" name="FromDoctorName" value="" readonly="readonly" >
                 </div>
                 
                 <div class="form-group">
                  <input type="hidden" name="referredID">
                    <label for="exampleFormControlSelect1">To Whom</label><br/>
                    <div class="doctor_option"></div>
                   
                 </div>
                 <div class="form-group">
                  <label for="" class="form-control-label">Reason For Changing</label>
                      <div class="input-group">
                        <textarea class="form-control" name="reason" aria-label="With textarea"></textarea>
                      </div>
                  </div>
            </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-DoctorChange">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if(!empty($treatment))

<div class="modal fade"  id="new_Transfer_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="max-height: 800px">

        <h3 class="modal-title" id="exampleModalLabel">
           {{$patient->reception->owner->clinic_name}} Clinic
        </h3>
        <!-- <h5 class="mr-4">{{date('Y:m:d')}}</h5> -->
        
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      
      <div class="modal-body" >
        <form id="newTransferForm" action="" method="post" enctype="multipart/form-data"> 
            <div>
                  <div class="form-group" >
                   <label for="exampleFormControlSelect1">From Who</label>
                   <input type="text" class="form-control" name="FromDoctorName" value="{{$treatments[0]->doctor->user->name}}" readonly="readonly" >
                 </div>
                 <input type="hidden" name="patient_id" value="{{$treatments[0]->patient_id}}">
                 <input type="hidden" name="fromDoctor" value="{{$treatments[0]->doctor_id}}">
                 <div class="form-group">
                    <label for="exampleFormControlSelect1">To Whom</label>
                    <span class="toDoctor-error text-danger"></span>
                    <div class="doctor_option"></div>
                   
                 </div>
                 <div class="form-group">
                  <label for="" class="form-control-label">Reason For Changing</label>
                  <span class="reason-error text-danger"></span>
                      <div class="input-group">
                        <textarea class="form-control" name="reason" aria-label="With textarea"></textarea>
                      </div>
                  </div>
            </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-DoctorChange">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
@section('script')
<script>
  $(document).ready(function(){
    // ajax _token
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
    let id=$('input[name="PatientId"]').val();
    var url="{{route('getTransferReport',':id')}}";
      
      url=url.replace(':id',id);
    // console.log(id);
    // $.get(`/getTransferReport/${id}`,function(res){
    //     if(res!=null){
    //       showData(res.data);
    //     }
    // })

     $('#AssignTable').DataTable({ 
                  "processing": true,
                destroy:true,
                "sort":false,
                   "ajax": url,
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
                   
                columns: [
                    { data: "created_at",
                    render:function(data){
                      let d=new Date(data);
                      
                      return d.toLocaleDateString();
                    } },

                    {data:'from_doctor.user.name'},

                    {data:'to_doctor',
                    render:function(data){
                      if(data==null){
                        return 'unknown';
                      }else{
                        return data.user.name;
                      }
                    }},

                    {data:"reason"},
                    {data:function(data){
                      let d=new Date(data.created_at);
                      let GivenDate =  d.toLocaleDateString();
                      // console.log(GivenDate);

                      let CurrentDate = new Date();



                     
                      let html='';
                      if(data.to_doctor==null){

                         if(GivenDate >= CurrentDate.toLocaleDateString()){
                           html=`<button class="btn btn-sm btn-muted btn-transfer" 
                           data-from_doctor="${data.from_doctor.user.name}"
                           data-reason="${data.reason}"
                           data-aid="${data.id}">Transfer</button>`;
                          }else{
                            html="unavaliable";
                          }
                      }else{
                        html="Done"
                      }
                      
                      return html;
                    }}
                    
                ]
            } );
    

    $('#AssignTable').on('click','.btn-transfer',function(){
     let id=$(this).data('aid');
     let doctor_from=$(this).data('from_doctor');
     // console.log(doctor_from);
     let reason=$(this).data('reason');
     $('#changeDoctorForm input[name="FromDoctorName"]').val(doctor_from);
     $('#changeDoctorForm input[name="referredID"]').val(id);
     $('#changeDoctorForm textarea[name="reason"]').val(reason);

     
     doctors(doctor_from);





     $('#doctor_change_modal').modal('show');

    })

     $('#changeDoctorForm').submit(function(e){
       e.preventDefault();
       // alert('helo');
          var formdata= new FormData(this);
          let  id=$('#changeDoctorForm input[name="referredID"]').val();
          var url="{{route('referredDoctor.update',':id')}}";
            url=url.replace(':id',id);
            formdata.append('_method', 'PUT');
          
          $.ajax({
             type:'POST',
              url: url,
              data: formdata,
              cache:false,
              contentType: false,
              processData: false,
             success:function(data){
                 $('#doctor_change_modal').modal('hide');
                  $('#AssignTable').DataTable().ajax.reload();
             },
             error:function(data){
                console.log(data);
             }
          })
      })
// ===========================Making Transferby reception ========================

$('.btn-newTransfer').click(function(){
  // alert('heo');
  let doctor_from=$('#newTransferForm input[name="FromDoctorName"]').val();
  doctors(doctor_from);
  $('#new_Transfer_modal').modal('show');
})

function doctors(doctor_from){
  let doctors=$('input[name="doctorsArray"]').val();

      doctors=JSON.parse(doctors);let option='';
       option=`<select class="col-12 form-control" name="toDoctor" >
                    
                  <option value="">Choose Doctor</option>`;
      $.each(doctors,function(i,v){

                  option += ` 
                     <option value="${v.id}"`
                     if(v.user.name==doctor_from){
                       option+="disabled"
                     }
                     

                  option+= `>${v.user.name}
                     </option>
                     `;
      })
      option+=` </select>`;

       // console.log(option);
      $('.doctor_option').html(option);

}

 $('#newTransferForm').submit(function(e){
   e.preventDefault();
   // alert('helo');
      var formdata= new FormData(this);
     
      var url="{{route('referredDoctor.store')}}";
      
       
      $.ajax({
         type:'POST',
          url: url,
          data: formdata,
          cache:false,
          contentType: false,
          processData: false,
         success:function(data){
             $('#new_Transfer_modal').modal('hide');
              $('#AssignTable').DataTable().ajax.reload();
            $('#newTransferForm').trigger('reset');
         },
         error:function(data){
            let errors=data.responseJSON.errors;
            $.each(errors,function(i,v){
              $(`.${i}-error`).html(v);
            })
         }
      })
  })
    
  })
</script>

@endsection