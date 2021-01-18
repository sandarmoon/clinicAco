@extends('frontendTemplate')
@section('content')
<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header border-0">

          <h3 class="mb-0">Treatment Record</h3>

          <div class="alert alert-success success d-none" role="alert"></div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-white table-flush"  id="treatmentTable">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <!-- <th>Patient ID</th></th> -->
                <th>Gender</th>
                <th>Age</th>
                <th>Action</th>
                
                
              </tr>
            </thead>
            <tbody>
                  
            </tbody>
          </table>
        </div>	
      </div>

    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  
	

	$(document).ready(function() {
			getData();
		    

		     function getData(){
		          var i=1;
		              $('#treatmentTable').DataTable({
		              
		              "processing": true,
		              "serverSide": true,
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
		                 
		               "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
		              "ajax": "{{route('getTreatments')}}",
		              
		              "columns":[

		                   {"data":"DT_RowIndex"},
		                   {"data":"patient.name"},
		                   {"data":"patient.gender"},
		                   {"data":"patient.age"},
		                   {"data":"patient.id",
		                   render:function(data){
		                   	let url="{{route('bill-check-out',':pid')}}";
		                   	url=url.replace(':pid',data);
		                   	return `
		                   	@role('Doctor')
		                   	<button class="btn btn-primary btn-sm d-inline-block btnEdit "  data-id="${data}"><i class="ni ni-settings"></i></button>
		                   	@endrole
		                        <button class="btn btn-warning btn-sm d-inline-block btn-checkout "  data-id="${data}"><i class="ni ni-circle-08"></i></button>
		                        @role('Reception')
		                        <a class="btn btn-success btn-sm d-inline-block "  href="${url}">check out</a>
		                        @endrole
		                        {{--@role('Doctor')
		                                  <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${data}"> <i class="ni ni-fat-delete"></i></button>  @endrole--}}`

		                   }}
		                   
		                  

		                  
		              ],
		              "info":false
		              
		           });
		     }

		     $('#treatmentTable tbody').on('click','.btn-Detail',function(){
		     	var id=$(this).data('id');
		     	console.log(id);
		     	location.href='/treatment/'+id;
		     })

		      $('#treatmentTable tbody').on('click','.btnEdit',function(){
		     	var id=$(this).data('id');
		     	var url="{{route('treatment.edit',':id')}}";
		      
		          url=url.replace(':id',id);
		          // $(this).attr('href',url);
		          window.location.href=url;
		     	
		     })
	} );
		


 
</script>

@endsection
