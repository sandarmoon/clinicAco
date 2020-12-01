@extends('frontendTemplate')
@section('content')
<div class="row">
  <div class="col-12" style="margin-top: 0px;">

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        @role('Reception')
        <a href="{{route('patient.create')}}" class="btn btn-primary btn-sm float-right">Add New Patient</a>
        @endrole
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
@endsection

@section('script')
<script type="text/javascript">
 $('div.alert').delay(3000).slideUp(300);
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
</script>
@endsection
