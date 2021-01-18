<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12" style="margin-top: 0px;">

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        
        <h3 class="mb-0">Patient tables</h3>
      </div>
      <?php if($doctors->count() >1): ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table  align-items-center table-white table-flush example" id="patientlistforRec" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>PRN</th>
                      <th>Father Name</th>
                      <th>Age</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>
                 	
                 </tbody>
          </table>
        </div>
      </div>
      <?php else: ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table  align-items-center table-white table-flush example" id="patientlistforRecSingle" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>PRN</th>
                      <th>Father Name</th>
                      <th>Age</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>
                 	
                 </tbody>
          </table>
        </div>
      </div>


      <?php endif; ?>
    </div>
  </div>
</div>
</div>
</div>

<!-- model for doctor chose start -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="doctorchosing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title justify-content-between" >
                <h3 >
                <?php echo e(Auth::user()->receptions[0]->owner->clinic_name); ?>


                </h3>
                <h5 class="text-muted"><?php echo e(date('Y-M-D')); ?></h5>


              </div>
              
              <form action="" method="post" 
               id="doctorChoosingforToday-form">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            	<div>
            		<p>Patient Name: <span class="show-patientName"></span>
             </p>	
             <p> Patient PRN:<span class="show-patientRRN"></span></p>	
             <h3>Token No : <span class="token text-primary"></span></h3>
            	</div>
              <label for="form-control-label">Please Choose Doctor for Today Treatment</label>
                <div class="form-group">
                  <select class="form-control" name="doctor_id" id="treatmentChosenDoctor">
                  <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <input type="hidden" name="token">
                <input type="hidden" name="patient_id">
            </div>
            <div class="modal-footer">
              <button type="button" class="closeit btn btn-secondary " data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary MakingTreatmentConfirm" >Make Treatment</button>
            </div>
        </form>
          </div>
        </div>
</div>
<!-- model for doctor chose end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
 $('div.alert').delay(3000).slideUp(300);
 var counting=2;
 counting++;
 // $('#dataTable').dataTable();
  $('#dataTable').dataTable({
                "sort":false,
                pagingType: 'full_numbers',
                 pageLength: 10,
                 language: {
                   oPaginate: {
                     sNext: '<i class="fa fa-forward"></i>',
                     sPrevious: '<i class="fa fa-backward"></i>',
                     sFirst: '<i class="fa fa-step-backward"></i>',
                     sLast: '<i class="fa fa-step-forward"></i>'
                     }
                   } });

  $(document).ready(function(){



    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


    // for patientlist start
    $('#patientlistforRec').DataTable({
                "serverSide": true,
                "processing": true,
                destroy:true,
                "sort":false,
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
                   
                   
                 
                "ajax": "<?php echo e(route('getpatientlistforRec')); ?>",
                "columns":[

                     {"data":"DT_RowIndex"},
                    {"data":"name"},
                    {"data":"PRN"},
                    {"data":"fatherName"},
                    {"data":"age"},
                    {data:function(data){

                    	let len=Object.keys(data).length;
                    	let url1="<?php echo e(route('patient.edit',':id')); ?>";
                      url1=url1.replace(':id',data.id);
                      let url2="<?php echo e(route('patient.show',':id')); ?>";
                      url2=url2.replace(':id',data.id);

                      let url3="<?php echo e(route('patient.destroy',':id')); ?>";
                      url3=url3.replace(':id',data.id);

                    	let html='';
                    	
                    	html=`<a  data-toggle="modal" 
                        data-toggle="tooltip" 
                        data-patientId="${data.id}"
                        data-patientName="${data.name}"
                        data-patientPrn="${data.PRN}"

                        data-placement="bottom" title="Make Treatment"
                       class="btn btn-success btn-sm d-inline-block doctorChoosingforToday"><i class="ni ni-chart-bar-32" ></i></a>
                       <a href="${url1}" class="btn btn-primary btn-sm d-inline-block "><i class="ni ni-settings"></i></a>

                         <a href="${url2}" class="btn btn-warning btn-sm d-inline-block " > <i class="ni ni-circle-08"></i></a>

                          <form method="post" class="d-inline" onsubmit="return confirm('Are you sure to delete?');" action="${url3}" >

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"  class="btn btn-danger btn-sm d-inline-block btnDelete "><i class="ni ni-fat-delete"></i></button>
                          </form>
                      `
                      

	                   return html;
                    }}
                ],
                "info":false
                
             });
    // for patientlist end

    $('#patientlistforRec').on('click','.doctorChoosingforToday',function(){
      $('#doctorchosing').modal('show');

     var pname=$(this).attr('data-patientName');
     var prn=$(this).attr('data-patientPrn');
     var pid=$(this).attr('data-patientId');


     console.log(pname,prn,pid);
      
     	$('.show-patientRRN').html(prn);
     	$('.show-patientName').html(pname);
     	$('#doctorchosing input[name="patient_id"]').val(pid);

    })





      $('#treatmentChosenDoctor').change(function(){
            var value = $(this).val();
            // var date=$('input[name="A_date"]').val();

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
           date=today;
           // console.log(value);

              $.ajax({
                  url:"/getToken",
                  data:{date:date,id:value},
                  type:"POST",
                  success:function(res){
                    if(res){
                      // console.log(res);
                        $('.token').html(res);
                         $('#doctorchosing input[name="token"]').val(res);
                        
                      }
                  },
                  error:function(error){
                    console.log(error);
                  }
                })

                
               
          });




   

    $('#doctorChoosingforToday-form').submit(function(e){
    	e.preventDefault();
    	// alert('helo');
    
    	 var patient_id = $("input[name=patient_id]").val();

        var doctor_id = $("select[name=doctor_id]").val();

        var token = $("input[name=token]").val();
        console.log(patient_id);
        console.log(doctor_id);
        console.log(token);


    	// data:{doctor:doctor,patient:patient,a:appointment},
    	$.ajax({
                  url:"/makingTreatmentwithPRN",
                  type:"POST",
                 dataType: 'json',
			    data: {patient_id:patient_id,doctor_id:doctor_id,token:token},
                  success:function(res){
                    if(res){
                      if(res.status ==0){
                        swal({
                          icon: "error",
                          text:res.message
                        });
                    }else{
                        swal({
                          icon: "success",
                          text:res.message
                        });
                    }

                  
                     $('.token').html(res);
                         $('#doctorchosing input[name="token"]').val(res);

                       $('#doctorchosing').modal('hide');
                       $('#doctorChoosingforToday-form').trigger("reset");
                       $('.token').html('');
                       $('#doctorchosing input[name="token"]').val('');
                         
                      }

                  },
                  error:function(error){
                    console.log(error);
                  }
                })
    })


    $('#patientlistforRec').on('click','.doctorChoosingforToday',function(){
      $('#doctorchosing').modal('show');

     var pname=$(this).attr('data-patientName');
     var prn=$(this).attr('data-patientPrn');
     var pid=$(this).attr('data-patientId');


     console.log(pname,prn,pid);
      
     	$('.show-patientRRN').html(prn);
     	$('.show-patientName').html(pname);
     	$('#doctorchosing input[name="patient_id"]').val(pid);

    })



     $('#patientlistforRecSingle').DataTable({
                "serverSide": true,
                "processing": true,
                destroy:true,
                "sort":false,
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
                   
                   
                 
                "ajax": "<?php echo e(route('getpatientlistforRec')); ?>",
                "columns":[

                     {"data":"DT_RowIndex"},
                    {"data":"name"},
                    {"data":"PRN"},
                    {"data":"fatherName"},
                    {"data":"age"},
                    {data:function(data){

                    	let len=Object.keys(data).length;
                    	
                    	let html='';
                    	
                    	html=`<a  data-toggle="modal" 
                        data-toggle="tooltip" 
                        data-patientId="${data.id}"
                        data-patientName="${data.name}"
                        data-patientPrn="${data.PRN}"

                        data-doctor=<?php echo e($doctors[0]->id); ?>


                        data-placement="bottom" title="Make Treatment"
                       class="btn btn-success btn-sm d-inline-block doctorChoosingforTodaySignle"><i class="ni ni-chart-bar-32" ></i></a>
                      `
                      

	                   return html;
                    }}
                ],
                "info":false
                
             });
    // for patientlist end

     $('#patientlistforRecSingle').on('click','.doctorChoosingforTodaySignle',function(){
      

     var pname=$(this).attr('data-patientName');
     var prn=$(this).attr('data-patientPrn');
     var pid=$(this).attr('data-patientId');
     var did=$(this).attr('data-doctor');
     console.log(did);


            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

           today = yyyy + '-' + mm + '-' + dd;
           date=today;
           

	       $.ajax({
              url:"/getToken",
              data:{date:date,id:did},
              type:"POST",
              success:function(res){
                if(res){
                  // console.log(res);

                 	makeTretment(pid,did,res);
                    
                  }
              },
              error:function(error){
                console.log(error);
              }
            })

	      

     

    })

     function makeTretment(pid,did,token){
     	 // console.log(token);
	       $.ajax({
                  url:"/makingTreatmentwithPRN",
                  type:"POST",
                 dataType: 'json',
			    data: {patient_id:pid,doctor_id:did,token:token},
                  success:function(res){
                    if(res){
                      if(res.status ==0){
                        swal({
                          icon: "error",
                          text:res.message
                        });
                    }else{
                        swal({
                          icon: "success",
                          title:"Token No is "+token,
                          text:res.message
                        });
                    }
                      
                      }
                  },
                  error:function(error){
                    console.log(error);
                  }
                })

     }

    
  })
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/patients/patientlistforRec.blade.php ENDPATH**/ ?>