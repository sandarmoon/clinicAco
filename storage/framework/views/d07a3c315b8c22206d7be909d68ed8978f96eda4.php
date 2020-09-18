<?php $__env->startSection('style'); ?>
<style type="text/css">
@import  url(https://fonts.googleapis.com/css?family=Fjalla+One:400|Roboto:400,400italic,700);
.select2-container .select2-selection--single {
    
    height: 45px!important;
    
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 37px!important;
    /* position: absolute; */
    /* top: 1px; */
    /* right: 1px; */
    /* width: 20px; */
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #8898aa !important;
    line-height: 42px !important;
}

.select2-container--default .select2-selection--single {
    background-color: #fff!important;
    border: 1px solid #8898aa!important;
    border-radius: 4px!important;
}

.jzdbox1 {
  width:315px; 
  background:#332f2e; 
  border-radius:5px; 
  overflow:hidden; 
  display:block; 
  margin-bottom:10px; 
  box-shadow:0 0 5px #201d1c; 
  margin:0 auto; 
  *margin-bottom:20px;*/
}

.jzdcal {
  padding:0 10px 10px 10px; 
  box-sizing:border-box!important; 
  background:#749d9e; 
  background: -webkit-linear-gradient(#749d9e, #b3a68b)!important; 
  background: -o-linear-gradient(#749d9e, #b3a68b)!important; 
  background: -moz-linear-gradient(#749d9e, #b3a68b)!important; 
  /*background: linear-gradient(#749d9e, #b3a68b)!important;*/
  background: linear-gradient(87deg,#5e72e4 10%,#825ee4 100%)!important;
}

.jzdcalt {
  font:18px 'Roboto'; 
  font-weight:700; 
  color:#f7f3eb; 
  display:block; 
  margin:18px 0 0 0; 
  text-transform:uppercase; 
  text-align:center; 
  letter-spacing:1px;
}

.jzdcal span {
  font:11px 'Roboto'; 
  font-weight:400; 
  color:#f7f3eb; 
  text-align:center; 
  width:42px; 
  height:42px; 
  display:inline-block; 
  float:left; 
  overflow:hidden; 
  line-height:40px;
}

.jzdcal .jzdb:before {
  opacity:0.3; 
  content:'o';
}

.circle {
  border:1px solid #f7f3eb; 
  box-sizing:border-box!important; 
  border-radius:200px!important;
}

span[data-title]:hover:after, 
div[data-title]:hover:after {
  font:11px 'Roboto'; 
  font-weight:400; 
  content:attr(data-title); 
  position:absolute; 
  margin:0 0 100px; 
  background:#282423; 
  border:1px solid #f7f3eb; 
  color:#f7f3eb; 
  padding:5px; 
  z-index:9999; 
  min-width:150px; 
  max-width:150px;
}

.month {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 3rem;
  text-align: center;
  
}

.month i {
  font-size: 1.5rem;
  cursor: pointer;
  color:#fff;
}

.month h1 {
  font-size: 1rem;
  font-weight: 200;
  text-transform: uppercase;
  letter-spacing: 0.2rem;
  margin-bottom: 1rem;
  margin-top: 1rem;
  color:#fff;
}

.month p {
  font-size: 0.6rem;
  color:#fff;
}

/*span[data-title]:hover:after, 
div[data-title]:hover:after {
  font:11px 'Roboto'; 
  font-weight:400; 
  content:attr(data-title); 
  position:absolute; 
  margin:0 0 100px; 
  background:#282423; 
  border:1px solid #f7f3eb; 
  color:#f7f3eb; 
  padding:5px; 
  z-index:9999; 
  min-width:150px; 
  max-width:150px;
}*/

.days span:hover:not(.today) {
 border:1px solid #000; 
  box-sizing:border-box!important; 
  border-radius:200px!important;
}

.prev-date,
.next-date {
  opacity: 0.5;
}

.today {
  background-color: #167e56;
}


/*card start here*/
 .card-profile-stats>div .heading {
    font-size: 0.8rem;
    font-weight: normal;
    display: block;
}

.dot-list {
  list-style-type: none;
  height: 300px;
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


</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="row d-flex">
        <div class="col-xl-4 order-xl-2   mb-5 mb-xl-0">
          <div class="card   p-3 card-profile shadow">
            <h3>Schedule of Doctors</h3>
            <div class=" pt-0 pt-md-4">
              <div class="jzdbox1 jzdbasf jzdcal">

                <div class="month">
                    <i class="fas fa-angle-left prev"></i>
                    <div class="date">
                      <h1></h1>
                      <p></p>
                    </div>
                    <i class="fas fa-angle-right next"></i>
                  </div>

                <span>Su</span>
                <span>Mo</span>
                <span>Tu</span>
                <span>We</span>
                <span>Th</span>
                <span>Fr</span>
                <span>Sa</span>

                <div class="days"></div>
                
              </div>
            </div>

            <div class="mt-3">
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
          </div>

          
        </div>
        <div class="col-xl-8 h-100 order-xl-1 ">
          <!-- booking div start -->
          <div class="card bg-secondary shadow">
             <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                   <div class="col-8">
                      <h3 class="mb-0">Booking NO:<span class="token"></span></h3>
                   </div>
                   <div class="col-4 text-right">
                      <a href="#!" class="text-primary">Today</a>
                   </div>
                </div>
                <?php if( Session::has("success") ): ?>
                <div class="alert alert-success success alert-block" role="alert">
                   <button class="close" data-dismiss="alert"></button>
                   <?php echo e(Session::get("success")); ?>

                </div>
                <?php endif; ?>
                <?php Session::forget('success'); ?>
             </div>
             <div class="card-body">
                <form action="<?php echo e(route('appointment.store')); ?>" method="post" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>
                   <h6 class="heading-small text-muted mb-4">General Information</h6>
                   <div class="pl-lg-4">
                      <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                               <label for="example-datetime-local-input" class="form-control-label">Appointment Date</label>
                               <input class="form-control" name="A_date" type="date" value="2018-11-23" min="<?= date('Y-m-d'); ?>" id="example-date-input">
                            </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                               <label class="form-control-label" for="input-first-name">Choose Doctor</label>
                               <select class="form-control p-3" data-width="100" name="doctor_id"  id="doctorchoice" >
                                  <option value="0"></option>
                                  <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($doctor->id); ?>" class="p-2"><?php echo e($doctor->user->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </select>
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                               <label class="form-control-label" for="input-username">Name</label>
                               <input type="text" id="input-username" name="name" class="form-control form-control-alternative" placeholder="Name" value="">
                            </div>
                            <input type="hidden" name="token" >
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                               <label class="form-control-label" for="input-email">Phone</label>
                               <input type="text" id="input-email" name="phone" class="form-control form-control-alternative" placeholder="">
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                             <input class="form-control btn btn-primary" type="submit" value="Save">
                          </div>
                       </div>
                   </div>
                   
             </div>
             <!-- <hr class="my-4" />
                Address
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                Description
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div> -->
             </form>
          </div>
          <!-- booking div end -->

          <!-- booking list start -->
          <div class="card   shadow mt-4" class="min-height:100%;">
            <div class="card-header border-0">

              <h3 class="mb-0">Appointment List</h3>
              <a href="<?php echo e(route('noappointment.create')); ?>" class="btn btn-outline-danger float-right">Add Patient(NB)</a>
            </div>
            <div class="table-responsive p-2">
              <table class="table align-items-center table-flush appointmentTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Date</th>
                    <th scope="col">Token</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
           
          </div>
          <!-- booking list end -->
        </div>
      </div>

      <div class="modal" tabindex="-1" id="patientNo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title justify-content-between" >
                <h3 >
                <?php echo e($r_user->owner->clinic_name); ?>


                </h3>
                <h5 class="text-muted"><?php echo e(date('Y-M-D')); ?></h5>
              </div>
              

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="form-control-label">Search with Patient No</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="PRN" placeholder=" PRN ID" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-primary searchPRN" type="button" id="button-addon1"><i class="ni ni-zoom-split-in"></i></button>
                  </div>
                  
                </div>
                <div class="result"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary addTreatment" data-patient data-doctor data-appoint disabled="disabled">Add Patient</button>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

  const date = new Date();

const renderCalendar = () => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().toDateString();

  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<span class="prev-date">${prevLastDay - x + 1}</span>`;
  }

  for (let i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<span class="circle" >${i}</span>`;
    } else {
      days += `<span>${i}</span>`;
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<span class="next-date">${j}</span>`;
    monthDays.innerHTML = days;
  }
};

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

renderCalendar();

$(document).ready(function(){

  $(window).resize(function() {
    $('.select2').css('width', "100%");
});
    // getAppointment();
    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
      $("#doctorchoice").select2();
      // $('.alert').hide();
      
        //var id=$('#doctorchoice').select2().val();

        // Set option selected onchange
          $('#doctorchoice').change(function(){
            var value = $(this).val();
            var date=$('input[name="A_date"]').val();
           // console.log(value);

              $.ajax({
                  url:"/getToken",
                  data:{date:date,id:value},
                  type:"POST",
                  success:function(res){
                    if(res){
                        $('.token').html(res);
                        $('input[name="token"]').val(res);
                        
                      }
                  },
                  error:function(error){
                    console.log(error);
                  }
                })

                // $.post('/getToken/',{date:date,id:value},function(res){
                //     if(res){
                //       $('.token').html(res);
                //       $('input[name="token"]').val(res);
                      
                //     }
                // })
               
          });
       
       $('.success').fadeOut(2000);

       
       
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
          // $.get('/getAppointment',function(res){
          //   console.log(res);
          // })
          $('.appointmentTable').DataTable( {
               "serverSide": true,
                "processing": true,
                
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
                "ajax": "/getAppointment",
                "type":"POST",
                "columns":[
                {"data":"DT_RowIndex"},
                {"data":"appointment.name"},
                {"data":"doctor_info"},
                {"data":"appointment.A_Date"},
                {"data":"appointment.TokenNo"},
                {"data":"appointment",render:function(data){
                  return `<button class="btn btn-outline-primary oldPatient" data-id="${data.id}" data-doctor=${data.doctor_id}>Old Patient</button><button class="btn btn-outline-info newPatient">New Patient</button><button data-id="${data.id}" class="btn btn-outline-danger btn-cancel">Cancel</button>`
                }}],
                info:false
            } );
       

       $('.appointmentTable').on('click','.oldPatient',function(){
          $('#patientNo').modal('show');
       })


       $('.searchPRN').on('click',function(){
          var value=$('input[name="PRN"]').val();
          var doctor=$('.oldPatient').data('doctor');
          var appointment=$('.oldPatient').data('id');
          var html='';

          $.ajax({
            url:"/searchPRN",
            data:{PRN:value},
            type:"POST",
            success:function(res){
              if(res){
              
              var patient=JSON.parse(res);
              var file=JSON.parse(patient.file);
              $('.addTreatment').attr('data-patient',patient.id);
              $('.addTreatment').attr('data-doctor',doctor);
              $('.addTreatment').attr('data-appoint',appointment);
              $('.addTreatment').prop('disabled',false);

              html =`<div class="card mb-3">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <img src="/${file[0]}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Patient Name:${patient.name}</h5>
                            <p>Age:${patient.age}<p>
                            <p>Allergy:${patient.allergy}<p>
                            
                            <p class="card-text"><small class="text-muted">created at:${moment(patient.created_at).format('Y-M-D')}</small></p>
                          </div>
                        </div>
                      </div>
                    </div>`;
                    $('.result').html(html);
             }
            },
            error:function(error){
              console.log(error);
            }
          })

          // $.post('/searchPRN',{PRN:value},function(res){
          //    if(res){
              
          //     var patient=JSON.parse(res);
          //     var file=JSON.parse(patient.file);
          //     $('.addTreatment').attr('data-patient',patient.id);
          //     $('.addTreatment').attr('data-doctor',doctor);
          //     $('.addTreatment').attr('data-appoint',appointment);
          //     $('.addTreatment').prop('disabled',false);

          //     html =`<div class="card mb-3">
          //             <div class="row no-gutters">
          //               <div class="col-md-4">
          //                 <img src="/${file[0]}" class="card-img" alt="...">
          //               </div>
          //               <div class="col-md-8">
          //                 <div class="card-body">
          //                   <h5 class="card-title">Patient Name:${patient.name}</h5>
          //                   <p>Age:${patient.age}<p>
          //                   <p>Allergy:${patient.allergy}<p>
                            
          //                   <p class="card-text"><small class="text-muted">created at:${moment(patient.created_at).format('Y-M-D')}</small></p>
          //                 </div>
          //               </div>
          //             </div>
          //           </div>`;
          //           $('.result').html(html);
          //    }
          // })
       })

       $('.addTreatment').click(function(){
        var doctor=$(this).data('doctor');
        var patient=$(this).data('patient');
        var appointment=$(this).data('appoint');
         console.log(doctor,patient,appointment);
         $.ajax({
            url:"/confirmAppoints",
            data:{doctor:doctor,patient:patient,a:appointment},
            type:"POST",
            success:function(res){
              if(res){
                 $('#patientNo').modal('hide');
                 $(".appointmentTable").DataTable().ajax.reload();
              }
            },
            error:function(error){
              console.log(error);
            }
          })
        // $.post('/confirmAppoints',{doctor:doctor,patient:patient,a:appointment},function(res){
        //   if(res){
        //      $('#patientNo').modal('hide');
        //      $(".appointmentTable").DataTable().ajax.reload();
        //   }
        // })
       })

       //new patient start

       $('.appointmentTable').on('click','.newPatient',function(){
        window.location.href="/patient/create";
       })

        $('.appointmentTable').on('click','.btn-cancel',function(){
          var id=$(this).data('id');
          var url="<?php echo e(URL('appointmentCancel')); ?>";
          url=url+'/'+id;
           $.ajax({
            url:url,
            data:{ _token:'<?php echo e(csrf_token()); ?>',_method:"DELETE"},
            type:"POST",
            success:function(res){
              if(res){
                 $('#patientNo').modal('hide');
                 $(".appointmentTable").DataTable().ajax.reload();
              }
            },
            error:function(error){
              console.log(error);
            }
          })
        // window.location.href="/patient/create";
       })
      
   })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/my-gp/GP/resources/views/Appointment/create.blade.php ENDPATH**/ ?>