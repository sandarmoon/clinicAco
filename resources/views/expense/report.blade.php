 @extends('frontendTemplate')
@section('content')
<div class="row">
     <!-- this is for xl view only start  -->
      <div class="col-xl-12 order-xl-1">
	          <div class="card bg-secondary shadow">
	            <div class="card-header bg-white border-0">
	              <h2 class="text-center">Report Transation</h2>

	              <!-- data filtering start -->
	            	<div class="filter-section mt-xl-5">
	            		
	            		<div id="search">
						  <div class="row col-xl-11 mx-auto">
						  <!-- 	<div class="col-xl-4 col-lg-4 d-xl-inline-flex order-xl-1 order-lg-1 mb-lg-3">
						  		
								    <label class="py-2 mr-2" for="exampleFormControlSelect1">Showing:</label>
								    <select class="form-control" id="exampleFormControlSelect1">
								      <option>Income</option>
								      <option>2</option>
								      <option>3</option>
								      <option>4</option>
								      <option>5</option>
								    </select>


								 
						  	</div> -->


						    <div class="col-xl-3 d-xl-inline-flex col-lg-3 order-xl-3 order-lg-2 mb-lg-3">
						    	<label class="py-2 mr-2" for="exampleFormControlSelect1">from:</label>
						      <input type="date" name="startdate" class="form-control " placeholder="First name">
						    </div>

						    <div class="col-xl-3 col-lg-3 order-xl-4 order-lg-4 d-xl-inline-flex">
						    	<label class="py-2 mr-2" for="exampleFormControlSelect1">to:</label>
						    <input type="date" name="enddate" class="form-control " placeholder="First name">
						    </div>

						    <div class="col-xl-3 col-lg-3 order-xl-4 order-lg-4 d-xl-inline-flex mt-xl-0 mt-lg-5 mt-md-5 mt-sm-3 mt-xs-3 mt-3 ">
						    	<button type="button" class="form-control btn btn-primary SearchButton">Search</button>
						    </div>
						   
						    <div class="col-xl-3 col-lg-3 order-xl-4 order-lg-4 d-xl-inline-flex mt-xl-0 mt-lg-5 mt-md-5 mt-sm-3 mt-xs-3 mt-3 ">
						    	
						    	<form id="export-form" action="{{ route('exportExcel') }}" method="post" >
                                        @csrf
                                        <input id="excel-sDate" type="hidden" name="sDate">
                                        <input id="excel-eDate" type="hidden" name="eDate">
                                        <button type="submit" class="form-control btn btn-info PrintButton">Print</button>
                                    </form>
						    </div>
						  </div>  	
						   
						  </div>
						

	            	</div>
	            	<!-- data filtering end -->
	            </div>
	            
	            	<div class="card-body h-100">
	            		<div class="row h-100">
	            			<!-- for income -->
	            			<div class="col-xl-6 col-lg-12 col-md-12  ">
	            				 <h3>Income Report</h3>
	            				 	<div class="table-responsive">
					              	   <table id="income-table" data-turbolinks="false" class="table align-items-center table-flush ">
				                        <thead class="thead-light">
				                          <tr>
				                            <th scope="col">Date</th>
				                            <th scope="col">Patient Name</th>
				                            <th scope="col">Charges</th>
				                          </tr>
				                        </thead>
				                        <tbody>
				                        </tbody>
				                      </table>
					              </div>
	            			</div>
	            			<!-- for expense -->
	            			<div class="col-xl-6 col-lg-12 col-md-12">
	            				<h3>Expense Report</h3>
	            				<div class="table-responsive">
				             	  <table id="expense-table" data-turbolinks="false" class="table align-items-center table-flush">
			                        <thead class="thead-light">
			                          <tr>
			                            <th scope="col">Date</th>
			                            <th scope="col">Category</th>
			                           
			                            <th scope="col">Transcation Amount</th>
			                           
			                          </tr>
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
	   <!-- this is for xl view only end  -->

</div>

@endsection
@section('script')
<script>
	function excelexport(){
			let sdate=document.querySelector('#search input[name="startdate"]').value;
			let edate=document.querySelector('#search input[name="enddate"]').value;
	      document.querySelector('#excel-sDate').value=sdate;
	      document.querySelector('#excel-eDate').value=edate;
				 document.getElementById('export-form').submit();
			return true;
		}
	$(document).ready(function(){
		 $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$('.SearchButton').click(function(){
			let sdate=$('#search input[name="startdate"]').val();
	        let edate=$('#search input[name="enddate"]').val();
	        let name='';
	        // console.log(firstDay,endDay);

	        $('#income-table').DataTable( {
	        	"destroy":true,
		        "processing": true,
		        "serverSide": true,
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
		        "ajax": {
		            "url": "{{route('getexpenseReport')}}",
		            "type": "POST",
		            "datatype": "json" ,
		            "data":{sDate:sdate,eDate:edate,name:'income'},
		            "dataSrc": "data"

		        },
		        "columns":[
		                    {data:"created_at",
		                    render:function(data){
		                      let date=new Date(data);
		                        return date.toLocaleDateString();
		                    }},
		                    {"data":"patient.name"},
		                    {"data":"charges"}
		                  
		                  ],
		                 
		    } );

		    $('#expense-table').DataTable( {
	        	"destroy":true,
		        "processing": true,
		        "serverSide": true,
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
		        "ajax": {
		            "url": "{{route('getexpenseReport')}}",
		            "type": "POST",
		            "datatype": "json" ,
		            "data":{sDate:sdate,eDate:edate,name:'expense'},
		            "dataSrc": "data"

		        },
		        "columns":[
		            {"data":"date"},
		            {"data":"category.name"},
		          
		            {"data":'amount'},
		            
		          
		          ],
		                 
		    } );
		})

		$('#export-form').submit(function(e){
			e.preventDefault();
			excelexport();
		})
		

		
	})
</script>
@endsection
