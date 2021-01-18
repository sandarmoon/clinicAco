@extends('frontendTemplate')
@section('content')
<div class="row">
  <div class="col-12" style="margin-top: 0px;">

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        
        <h3 class="mb-0">Patient tables</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table  align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>PRN</th>
                      <th>Father Name</th>
                      <th>Age</th>
                      <th>Clinic Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="medicineTable">
                    <?php $i=1;?>
                    @foreach($patients as $patient)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$patient->name}}</td>
                        <td>{{$patient->PRN}}</td>
                        <td>{{$patient->fatherName}}</td>
                        <td>{{$patient->age}}</td>
                        <td>{{$patient->reception->owner->clinic_name}}</td>
                        <td>
                      @role('Reception')

                      
                        <a href="{{route('patient.edit',$patient->id)}}" class="btn btn-primary btn-sm d-inline-block "><i class="ni ni-settings"></i></a>

                        <a ></a>
                       @endrole
                        
                        <a href="{{route('patient.show',$patient->id)}}" class="btn btn-warning btn-sm d-inline-block " > <i class="ni ni-circle-08"></i></a>
                      
                      @role('Reception')
                          <form method="post" class="d-inline" onsubmit="return confirm('Are you sure to delete?');" action="{{route('patient.destroy',$patient->id)}}" >

                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger btn-sm d-inline-block btnDelete "><i class="ni ni-fat-delete"></i></button>
                          </form>
                        @endrole
                        </td>

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
</div>

<!-- model for doctor chose start -->
<!-- Button trigger modal -->


<!-- Modal
<div class="modal fade" id="doctorchosing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title justify-content-between" >
                <h3 >
                {{--Auth::user()->receptions[0]->owner->clinic_name--}}

                </h3>
                <h5 class="text-muted">{{date('Y-M-D')}}</h5>
              </div>
              

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="form-control-label">Please Choose Doctor for Today Treatment</label>
                <div class="form-group">
                  <select class="form-control" id="treatmentChosenDoctor">
                  @foreach($doctors as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->user->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="closeit btn btn-secondary " data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary MakingTreatmentConfirm" >Make Treatment</button>
            </div>
          </div>
        </div>
</div> -->
<!-- model for doctor chose end -->

@endsection

@section('script')
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

    $(`.doctorChoosingforToday-${counting}`).click(function(){
      $('#doctorchosing').modal('show');

      let paitentName=$(this).data('patientName');
      let paitentId=$(this).data('patientId');
      let paitentPRN=$(this).data('patientPrn');
      console.log(paitentId,paitentName,paitentPRN);

    })



      $('#treatmentChosenDoctor').change(function(){
            var value = $(this).val();
            // var date=$('input[name="A_date"]').val();

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = mm + '/' + dd + '/' + yyyy;
           date=today;
           // console.log(value);

              $.ajax({
                  url:"/getToken",
                  data:{date:date,id:value},
                  type:"POST",
                  success:function(res){
                    if(res){
                      console.log(res);
                        // $('.token').html(res);
                        // $('input[name="token"]').val(res);
                        
                      }
                  },
                  error:function(error){
                    console.log(error);
                  }
                })

                
               
          });




    // $('.MakingTreatmentConfirm').click(function(){
    //   let doctor_id=$('#treatmentChosenDoctor').val();


    // })
    
  })
</script>
@endsection


