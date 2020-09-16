@extends('frontendTemplate')
@section('style')
<style>
  /*.select2-dropdown {
   top: 22px !important;
   left: 8px !important;
  }*/
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
</style>
@endsection
@section('content')
  <div class="row">
   <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
         <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
               <div class="card-profile-image">
                  <a href="#">
                  <img src="{{asset($r_user->file)}}" class="rounded-circle">
                  </a>
               </div>
            </div>
         </div>
         <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
               <!-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                  <a href="#" class="btn btn-sm btn-default float-right">Message</a> -->
            </div>
         </div>
         <div class="card-body pt-0 pt-md-4">
            <div class="">
               <div class="col-12">
                  <div class="card-profile-stats justify-content-center  mt-md-5">
                     <p>Name : <b>{{$r_user->user->name}}</b></p>
                     <p>clinic  : <b>{{$r_user->owner->clinic_name}}</b></p>
                     <p>Phone : <b>{{$r_user->phoneno}}</b></p>
                     <p>Email : <b>{{$r_user->user->email}}</b></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-8 order-xl-1">
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
            @if( Session::has("success") )
            <div class="alert alert-success success alert-block" role="alert">
               <button class="close" data-dismiss="alert"></button>
               {{ Session::get("success") }}
            </div>
            @endif
            @php Session::forget('success'); @endphp
         </div>
         <div class="card-body">
            <form action="{{route('appointment.store')}}" method="post" enctype="multipart/form-data">
               @csrf
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
                           <select class="form-control p-3" name="doctor_id"  id="doctorchoice" >
                              <option value="0"></option>
                              @foreach($doctors as $doctor)
                              <option value="{{$doctor->id}}" class="p-2">{{$doctor->user->name}}</option>
                              @endforeach
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
               </div>
               <div class="col-lg-12">
                  <div class="form-group">
                     <input class="form-control btn btn-primary" type="submit" value="Save">
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
   </div>
</div>

<div class="row mt-3">
   <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">

          <h3 class="mb-0">Appointment List</h3>
          <a href="{{route('noappointment.create')}}" class="btn btn-outline-danger float-right">Add Patient(NB)</a>
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
    </div>
</div>

<div class="modal" tabindex="-1" id="patientNo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title justify-content-between" >
          <h3 >
          {{$r_user->owner->clinic_name}}

          </h3>
          <h5 class="text-muted">{{date('Y-M-D')}}</h5>
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

@endsection
@section('script')
  <script>
   $(document).ready(function(){
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
          var url="{{URL('appointmentCancel')}}";
          url=url+'/'+id;
           $.ajax({
            url:url,
            data:{ _token:'{{ csrf_token() }}',_method:"DELETE"},
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
@endsection