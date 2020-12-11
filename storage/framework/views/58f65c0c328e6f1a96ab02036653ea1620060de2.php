<?php $__env->startSection('content'); ?>
 <?php
  $uri=$_SERVER['REQUEST_URI'];
  $uriarray=explode('/',$uri);
  $patientid=$uriarray[2];

 ?>
<div class="row bg-white card">
   <div class="col-12" style="margin-top: 0;">
    <nav class="mx-5 my-3">
      <div class="nav nav-tabs my-3"  id="nav-tab" role="tablist">
        <a class="nav-item nav-link text-info " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ptient History</a>

        <a class="nav-item nav-link text-info" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Treatment History</a>
        <a class="nav-item nav-link text-warning active" id="nav-transter-tab" data-toggle="tab" href="#nav-transfer" role="tab" aria-controls="nav-profile" aria-selected="false">Transfer History</a>
        <input type="hidden" value="<?php echo e($patient->id); ?>" name="PatientId">
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade  mx-3 my-3 " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

			<div class="card ml-4 bg-">
				<div class="card-header">
					<h2 class="text-center text-dark"><?php echo e($patient->name); ?> </h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<div class="span8">
			    			<h4><b>FatherName:</b> <?php echo e($patient->fatherName); ?></h4>
			    			<h4><b>Age:</b> <?php echo e($patient->age); ?>

			    										<?php 
			    										if($patient->child==0){
			    										echo "year";
			    									}else{
			    									echo"month";
			    								}
			    								?>
			    							</h4>
			    			<h4><b>Gender: </b><?php echo e($patient->gender); ?></h4>
			    			<h4><b>phoneno: </b><?php echo e($patient->phoneno); ?></h4>
			    			

			    		</div>
						</div>

						<div class="col-6">
							<div class="span2">
			    			<h4><b>Address: </b><?php echo e($patient->address); ?></h4>

			    			<h4><b>Married:</b> 
			    								<?php 
			    								if($patient->married_status==0){
			    								echo "no";
			    							}else{
			    							echo"yes";
			    						}
			    						?>
			    					</h4>

			    			<h4><b>Pregnant:</b> 
			    						<?php 
			    						if($patient->pregnant==0){
			    						echo "no";
			    					}else{
			    					echo"yes";
			    				}
			    				?>
			    			</h4>
			    			<?php $__currentLoopData = json_decode($patient->file); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    			<a target="_blank" href="<?php echo e(asset($photo)); ?>">
			    				<img src="<?php echo e(asset($photo)); ?>" width="100px" height="100px">
			    			</a>

			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    			
			    		</div>
			    		

							
						</div>
					</div>


					

				</div>
			</div> 



		</div>

    <!-- for doctor array for assign modal -->
    <input type="hidden" name="doctorsArray" value="<?php echo e(json_encode($doctors)); ?>">



    	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    		<div class="accordion" id="accordionExample">

          <?php $i=1; ?>
          <?php $__currentLoopData = $treatments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$treatment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card my-3 ml-5">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($i); ?>" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo e($treatment->created_at); ?>

                </button>
              </h2>
            </div>

            <div id="collapse<?php echo e($i); ?>" class="collapse <?=($k==0)? 'show':''?>" aria-labelledby="headingOne bg-secondary" data-parent="#accordionExample">
              <div class="card-body">
               <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <p class="card-text"><strong>Complaint:  </strong><?php echo e($treatment->complaint); ?> </p>
                  <p class="card-text"><strong>SPO2:</strong><?php echo e($treatment->spo2); ?> </p>
                  <p class="card-text"><strong>PR:  </strong><?php echo e($treatment->pr); ?> </p>
                  <p class="card-text"><strong>Temperature:</strong><?php echo e($treatment->temperature); ?> </p>
                  <p class="card-text"><strong>Blood pressure:</strong><?php echo e($treatment->bp); ?> </p>
                  <p class="card-text"><strong>RB2:</strong><?php echo e($treatment->rbs); ?> </p>
                  <p class="card-text"><strong>Diagnosis:</strong><?php echo e($treatment->diagnosis); ?> </p>
                  <p class="card-text"><strong>Body Weight:</strong><?php echo e($treatment->body_weight); ?> </p>
                  <p class="card-text"><strong>Next Visit Date:</strong><?php echo e($treatment->next_visit_date); ?> </p>
                  <p class="card-text"><strong>relevant_info:</strong><?php echo e($treatment->relevant_info); ?> </p>
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
                            <?php
                            $alltreaments=$treatment->medicines;

                            
                            ?>
                            <!-- <?php echo e($alltreaments); ?> -->
                            <?php $__currentLoopData = $alltreaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $alldrugs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($alldrugs->pivot->type==null): ?>
                            <tr>
                              <td><?php echo e($alldrugs->name); ?></td>
                              <td><?php echo e($alldrugs->pivot->tab); ?></td>
                              <td><?php echo e($alldrugs->pivot->interval); ?></td>
                              <td><?php echo e($alldrugs->pivot->meal); ?></td>
                              <td><?php echo e($alldrugs->pivot->during); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php
                            $alltreaments=$treatment->medicines;
                            ?>
                            <!-- <?php echo e($alltreaments); ?> -->
                            <?php $__currentLoopData = $alltreaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $allinjections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($allinjections->pivot->type): ?>
                            <tr>
                              <td><?php echo e($allinjections->name); ?></td>
                              <td><?php echo e($allinjections->pivot->type); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</div>

    	</div>

      <div class="tab-pane fade show active" id="nav-transfer" role="tabpanel" aria-labelledby="nav-transfer-tab">
        
           <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="row mb-5">
                    <div class="col-12 px-5">
                      <div class="table-responsive">
                        <div class=" my-2">
                            <h2 class=" text-uppercase d-inline-block">Transfer List of <span class="text-danger"><?php echo e($patient->name); ?></span></h2>
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
			<form method="post" action="<?php echo e(route('incharge')); ?>" class="d-inline-block">
					<?php echo csrf_field(); ?>
					<input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
					<div class="form-group">
						<label for="doctor" style="margin-left: 100px">Please choose doctor</label><br>
						<select name="doctor"  id="doctor" class="form-control" style="margin-left: 100px">
							<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($row->id); ?>"><?php echo e($row->user->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
           <?php echo e($patient->reception->owner->clinic_name); ?> Clinic
        </h3>
        <!-- <h5 class="mr-4"><?php echo e(date('Y:m:d')); ?></h5> -->
        
        
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

<div class="modal fade"  id="new_Transfer_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="max-height: 800px">

        <h3 class="modal-title" id="exampleModalLabel">
           <?php echo e($patient->reception->owner->clinic_name); ?> Clinic
        </h3>
        <!-- <h5 class="mr-4"><?php echo e(date('Y:m:d')); ?></h5> -->
        
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      
      <div class="modal-body" >
        <form id="newTransferForm" action="" method="post" enctype="multipart/form-data"> 
            <div>
                  <div class="form-group" >
                   <label for="exampleFormControlSelect1">From Who</label>
                   <input type="text" class="form-control" name="FromDoctorName" value="<?php echo e($treatments[0]->doctor->user->name); ?>" readonly="readonly" >
                 </div>
                 <input type="hidden" name="patient_id" value="<?php echo e($treatments[0]->patient_id); ?>">
                 <input type="hidden" name="fromDoctor" value="<?php echo e($treatments[0]->doctor_id); ?>">
                 <div class="form-group">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function(){
    // ajax _token
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
    let id=$('input[name="PatientId"]').val();
    var url="<?php echo e(route('getTransferReport',':id')); ?>";
      
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
          var url="<?php echo e(route('referredDoctor.update',':id')); ?>";
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
     
      var url="<?php echo e(route('referredDoctor.store')); ?>";
      
       
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
            console.log(data);
         }
      })
  })
    
  })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/patients/show.blade.php ENDPATH**/ ?>