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
	            		
	            		<form id="search">
						  <div class="row col-xl-8 offset-xl-2">
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


						    <div class="col-xl-6 d-xl-inline-flex col-lg-6 order-xl-3 order-lg-2 mb-lg-3">
						    	<label class="py-2 mr-2" for="exampleFormControlSelect1">from:</label>
						      <input type="date" name="startdate" class="form-control " placeholder="First name">
						    </div>

						    <div class="col-xl-6 col-lg-6 order-xl-4 order-lg-4 d-xl-inline-flex">
						    	<label class="py-2 mr-2" for="exampleFormControlSelect1">to:</label>
						    <input type="date" name="enddate" class="form-control " placeholder="First name">
						    </div>
						  </div>
						</form>

	            	</div>
	            	<!-- data filtering end -->
	            </div>
	            <div class="card-body h-100 container-fluid">
	            	
	            	
	            	
	            	<div class="row h-100 p-2 m-auto">
	            		<div class="flex-fill col-xl-4 col-lg-6 text-center">
	            			<!-- showeing half donut chart -->
	            			<div>
	            				<canvas id="chart-area-2" />
	            			</div>
	            			<h4 class="text-primary">Pie Chart View</h4>
                            <span class="small startDate-title  text-primary"></span> to <span class="small endDate-title text-primary"></span>
                          	

	            		</div>

	            		<div class="h-100 col-xl-6 col-lg-6 offset-xl-1">
	            			
	            			<!-- xl device start -->
	            			<div class="d-xl-block d-lg-none d-md-none d-sm-none d-xs-none d-md-none d-none">
		            			<div class="row h-100 justify-content-around card-casts ">
		            				
					                  <div class="col-xl-6  flex-fill  ">
					                  		<div>
					                  			<h5>Net</h5>
					                  			<p class="net-outcome">20000Kyats</p>
					                  		</div>
					                    	<div>
					                    		<h6 class="small">Expense</h6>
					                    		<div class="progress ">
												  <div class="progress-bar bg-danger expense-progress" role="progressbar"
												   style="width: 25%;" aria-valuenow="25" aria-valuemin="0" 
												   aria-valuemax="100"></div>
												</div>
					                    	</div>	
					                    	<div>
					                    		<h6 class="small">Income</h6>
					                    		<div class="progress ">
												  <div class="progress-bar bg-success income-progress" role="progressbar" 
												  style="width: 56%;" aria-valuenow="25" aria-valuemin="0"
												   aria-valuemax="100"></div>
												</div>
					                    	</div>	
					                  </div>

					                   <div class="col-xl-6  h-100   ">
						                   	<div class=" mb-5 text-right ">
					                  			<a href="" class=" mr-2 current-month-button">Current Month</a>
					                  			<a href="" class=" last-month-button">Last Month</a>
						                  	</div>
				                   			 <div class="row justify-content-around py-4">
				                   			 	<div>
					                    		<h6 class="small">Expense</h6>
						                    		<p class="expense-outcome">rating</p>
						                    	</div>	
						                    	<div>
						                    		<h6 class="small">Income</h6>
						                    		<p class="income-outcome">rating</p>
						                    	</div>
				                   			 </div>	 
					                  </div>

					                 
						               
		            			</div>
		            		</div>
	            			<!-- xl device end -->
	            			<!--  chart for lg device start -->

			            	<div class="d-xl-none d-lg-block d-md-none d-sm-none d-xs-none d-none">
			            		<div class=" ">
			            			<div class="mb-3">
				                        
				                        <span class="description text-primary">Net</span>
				                        <span class="heading net-outcome">400000</span>
				                     </div>

				                     <div class="mb-3">
				                     	<span class="description text-danger">Expense</span>
				                        <span class="heading expense-outcome ">2200000</span>
				                        
				                     </div>
				                      <div>
				                     	<span class="description text-success">Income</span>
				                        <span class="heading income-outcome">10000000</span>
				                        
				                     </div>
				                     <div class="mt-3">
				                     	<a class="mr-3" href="#" >Current Month</a>
				                     	<a href="#" >Last Month</a>
				                     </div>
				                  </div>
			            	</div>

			            	<!-- chart for phone size device start -->
			            	<div class="d-xl-none d-lg-none d-md-block">
			            		<div class="card-profile-stats d-flex justify-content-center mt-md-5 ">
	                                 <div>
	                                    <span class="heading expense-outcome ">2200000</span>
	                                    <span class="description text-danger">Expense</span>
	                                 </div>
	                                 <div>
	                                    <span class="heading income-outcome">10000000</span>
	                                    <span class="description text-success">Income</span>
	                                 </div>
	                                 <div>
	                                    <span class="heading net-outcome">400000</span>
	                                    <span class="description text-primary">Net</span>
	                                 </div>
	                              </div>
			            	</div>

	            		</div>
	            	</div>
	            	

	            	

	            	<hr>
	            	<!-- table showing start -->
	            	<div class="h-100 p-2 ">
		            	<!-- for expense table showing -->
		            	<div class="">
		            		<!-- heading start -->
		            		<h1 class="text-center">Expense Record</h1>
		            		<h6 class="small text-primary text-center">
										<span class="startDate-title"></span> to <span class="endDate-title"></span>
									</h6>
		            		<div class="row mb-2">
								
								<div class="col-xl-6 col-lg-6 col-md-6 d-lg-inline-flex">
										
									    <label class="py-lg-2 mr-lg-2" for="expenseCategory">Category:</label>
									    <select class="form-control col-xl-3 col-lg-4  " id="expenseCategory">
									      
									      <option value="0" selected="selected">All</option>
									     @foreach($categories as $category)
									     	<option value="{{$category->id}}">{{$category->name}}</option>
									     @endforeach
									    </select>
									 
									</div>
								<div class="col-xl-6 col-lg-6 col-md-6 mt-xl-0 mt-lg-0 mt-md-4 text-right">

									<button class="btn btn-info mr-2 print-expense">Print</button>
								</div>
							</div>
		            	<!-- Projects table -->
			             <div class="table-responsive">
			             	 <table id="expense-table" data-turbolinks="false" class="table align-items-center table-flush">
		                        <thead class="thead-light">
		                          <tr>
		                            <th scope="col">Date</th>
		                            <th scope="col">Category</th>
		                            <th scope="col">Transcation Reason</th>
		                            <th scope="col">Transcation Amount</th>
		                           
		                          </tr>
		                        </thead>
		                        <tbody>
		                          
		                        </tbody>
		                      </table>
			             </div>
			            </div>
		            	<!-- for table showing end -->
		            	<!-- for table showing -->
		            	
		            	<!-- for table showing end -->
		            	</div>
	            	<!-- expense table showing end -->

	            		<!-- for income table showing -->
		            	<div class="">
		            		<!-- heading start -->
		            		<h1 class="text-center">Income Record</h1>
		            		<h6 class="small text-primary text-center">
										<span class="startDate-title"></span> to <span class="endDate-title"></span>
									</h6>
		            		<div class="row mb-2">
								
								
								<div class="col-xl-12 col-lg-12 text-right">

									<button class="btn btn-info mr-2 print-income">Print</button>
								</div>
							</div>
		            	<!-- Projects table -->
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
		            	<!-- for table showing end -->
		            	<!-- for table showing -->
		            	
		            	<!-- for table showing end -->
		            	</div>
	            	<!-- income table showing end -->
	            </div>
	          </div>
	        
	  </div>
	   <!-- this is for xl view only end  -->

</div>

@endsection
@section('script')
<script>
	//start coyp-------------------
function getPieView(result,net){
	var ctx = document.getElementById('chart-area-2').getContext('2d');
	var result=result;
	var rp=['expenese','income'];
	var myChart = new Chart(ctx, {
	    type: 'pie',
	    data: {
	        labels: rp,
	        datasets: [{
	            label: '# of Votes',
	            data: result,
	            backgroundColor: [
	                'rgb(245,54,92)',
	                'rgb(45,206,137)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgb(245,54,92)',
	                'rgb(45,206,137)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	            legend: {
	                display: true
	            },
	            circumference:1 * Math.PI,
	            rotation: -1 * Math.PI,
	            title: {
	               display: true,
	               text:'helo',
	               position: 'bottom'
	            },
	            animation: {
				    
				    
				    onComplete: function () {
				      var ctx = this.chart.ctx;
				      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
				      ctx.textAlign = 'center';
				      ctx.textBaseline = 'bottom';
				      var labels=this.data.labels;

				      this.data.datasets.forEach(function (dataset) {

				        for (var i = 0; i < dataset.data.length; i++) {
				          // console.log(dataset.labels);
				          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
				              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
				              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
				              start_angle = model.startAngle,
				              end_angle = model.endAngle,
				              mid_angle = start_angle + (end_angle - start_angle)/2;

				          var x = mid_radius * Math.cos(mid_angle);
				          var y = mid_radius * Math.sin(mid_angle);
				          // console.log(total);

				          ctx.fillStyle = '#000';
				          if (i == 3){ // Darker text color for lighter background
				            ctx.fillStyle = '#444';
				          }
				          var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
				          // var testing=percent+'('+dataset.data[i]+')';
				           var testing=percent;
				          // ctx.fillText(dataset.data[i], model.x + x, model.y + y);
				          // Display percent in another line, line break doesn't work for fillText
				          ctx.fillText(testing, model.x + x, model.y + y + 15);
				        }
				      });               
				    },
				    animateRotate:false,
				    animateScale:false
				  }
	        }
	});

	 myChart.options.title.text="Net: "+net+"Ks";
	myChart.render();
}

	
     // var ctx_2 = document.getElementById("chart-area-2").getContext("2d");            
        
     //    window.myDoughnut_2 = new Chart(ctx_2, config_2);
    // half pie chart end

    $(document).ready(function(){
    	 $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

    	  //chaning format
	    function formatDate(date){
	      var formattedDate = new Date(date);
	            var dd = String(formattedDate.getDate()).padStart(2, '0');
	            var mm = String(formattedDate.getMonth() + 1).padStart(2, '0'); //January is 0!
	            var yyyy = formattedDate.getFullYear();

	           return yyyy + '-' + mm + '-' + dd;
	           
	    }

	    function getDiffrentDay(firstDate,secondDate){
	    	var startDay = new Date(firstDate);
		    var endDay = new Date(secondDate);
		   
		    var millisBetween = startDay.getTime() - endDay.getTime();
		    var days = millisBetween / (1000 * 3600 * 24);
		   
		    return Math.round(Math.abs(days));
	    }

	    //getDataforcurrentmonth
	    var date = new Date(), y = date.getFullYear(), m = date.getMonth();
	    var firstDay = formatDate(new Date(y, m, 1));
	    var endDay = formatDate(date);

	    $('.startDate-title').html(firstDay);
	    $('.endDate-title').html(endDay);

	     getReport(firstDay,endDay,"income");
	     getReport(firstDay,endDay,"expense");

	      function getReport(sdate,edate,name){
		      // ajax start
		          $.ajax({
		            url:"{{route('getexpenseReport')}}",
		            type:'POST',
		            data:{sDate:sdate,eDate:edate,name:name},
		            success:function(res){
		              let expenseTotal=res.data.totalExpense;
		              let incomeTotal=res.data.totalIncome;
		              let net=incomeTotal - expenseTotal;
		              let total=incomeTotal + expenseTotal;
		              let nameClass=null;
		              // console.log(net);
		              if(net > 0){
		                net=net;
		                nameClass="text-success";
		                 $('.net-outcome').removeClass('text-danger');
		               
		              }else{
		                
		                net=net * (-1);
		                nameClass="text-danger";
		                $('.net-outcome').removeClass('text-success');
		               
		              }
		              // console.log(res.data);

		              // char start
		              // const expensresult = Math.round((expenseTotal ) / 100);
		              // char end
		              // console.log(expensresult);

		              let result=[expenseTotal,incomeTotal];
		              getPieView(result,net);
		             
		              let expensePercent = String(Math.round(expenseTotal/total*100)) ;
		              let incomePercent = String(Math.round(incomeTotal/total*100)) ;
		              
		              //start progress rate start
		              $('.expense-progress').attr('aria-valuenow',expensePercent);
		              $('.expense-progress').css('width',expensePercent+'%');

		               $('.income-progress').attr('aria-valuenow',incomePercent);
		              $('.income-progress').css('width',incomePercent+'%');

		              //start progress rate start

		              
		              if("expense" in res.data){
		                tableExpense(sdate,edate,res.data.expense);
		              }else{
		               tableIncome(sdate,edate,res.data.income)
		              }
		             
		              $('.expense-outcome').text(expenseTotal+'Ks');
		              $('.income-outcome').text(incomeTotal+'Ks');
		              $('.net-outcome').text(net +'Ks');
		               $('.net-outcome').addClass(nameClass);

		             
		              
		            },
		            error:function(error){
		              console.log(error);
		            }

		          })
		      // ajax end
		   }

		   function tableIncome(sdate,edate,income){
		    $('#expense-table-div').addClass('d-none');
		      $('#income-table-div').removeClass('d-none');
		       $('#expense-table').DataTable().clear().destroy();
		             $('#income-table').DataTable({
		                  "destroy":true,
		                  "data":income,
		                  "searching":true,
		                  scrollY:'50vh',
		                  scrollCollapse: true,
		                  "columns":[
		                    {data:"created_at",
		                    render:function(data){
		                      let date=new Date(data);
		                        return date.toLocaleDateString();
		                    }},
		                    {"data":'patient.name'},
		                    {"data":'charges'}
		                  
		                  ],
		                  "info":false,
		                  "paging":true,
		                })

		    }

		    function tableExpense(sdate,edate,expense){
		      $('#income-table-div').addClass('d-none');
		      $('#expense-table-div').removeClass('d-none');
		      // $('#income-table').DataTable().clear().destroy();
		      $('#expense-table').DataTable({
		          "destroy":true,
		          "data":expense,
		          "searching":true,
		        

		        scrollCollapse: true,
		          "columns":[
		            {"data":"date"},
		            {"data":"category.name"},
		            {"data":"description"},
		            {"data":'amount'},
		            
		          
		          ],
		          "info":false,
		          "paging":true,
		        })
		    }

		     //seaching with start and end
	       $('#search input[name="enddate"]').change(function(){
	        // e.preventDefault();
	        // alert('helo');
	          var formdata= new FormData();
	        firstDay=$('#search input[name="startdate"]').val();
	        endDay=$('#search input[name="enddate"]').val();
	        // formdata.append('startdate',startdate);
	        // formdata.append('enddate',enddate);
	        $('.startDate-title').html(firstDay);
	        $('.endDate-title').html(endDay);
	        $('.expense-title-show').addClass('d-none');
	         $('.income-title-show').removeClass('d-none');
	        getReport(firstDay,endDay,'income');
	        getReport(firstDay,endDay,'expense');
	        // console.log(startdate,enddate);
	          // var url="{{route('searchReport')}}";
	          // $.ajax({
	          //           type:'POST',
	          //           url: url,
	          //           data: formdata,
	          //           cache:false,
	          //           contentType: false,
	          //           processData: false,
	          //           success: (data) => {
	          //             console.log(data);
	          //              // if(data){
	          //              //  var expense=data.totalExpense;
	          //              //  var income=data.totalIncome;
	          //              //  var profit=income-expense;
	          //              //  $('.totalExpense').text(expense);
	          //              //  $('.totalIncome').text(income);
	          //              //  $('.totalProfit').text(profit);
	          //              //  $('.totalExpense').addClass('text-dark');
	          //              //  $('.totalIncome').addClass('text-dark');
	          //              //  $('.totalProfit').addClass('text-dark');
	          //              // }
	                           
	          //           },
	          //           error: function(error){
	          //              var errors=error.responseJSON.errors;
	          //              if(errors){
	          //                 $('.Sdate').text(errors.startdate);
	          //                 $('.Edate').text(errors.enddate);
	          //                 $('span.error').addClass('text-danger');
	          //              }
	          //           }
	          //       });




	      })
	    //seaching with start and end

	    $('.current-month-button').click(function(e){
	    	e.preventDefault();
	    	var date = new Date(), y = date.getFullYear(), m = date.getMonth();
		    var firstDay = formatDate(new Date(y, m, 1));
		    var endDay = formatDate(new Date(y, m+1, 0));
		    // console.log(endDay);
		    $('.startDate-title').html(firstDay);
		    $('.endDate-title').html(endDay);

		     getReport(firstDay,endDay,"income");
		     getReport(firstDay,endDay,"expense");
	    })

	    $('.last-month-button').click(function(e){
	    	e.preventDefault();
	    	var date = new Date(), y = date.getFullYear(), m = date.getMonth();
		    var firstDay = formatDate(new Date(y, m-1, 1));
		    var endDay = formatDate(new Date(y, m, 0));
		   
		    console.log(firstDay,endDay);

		    $('.startDate-title').html(firstDay);
		    $('.endDate-title').html(endDay);

		     getReport(firstDay,endDay,"income");
		     getReport(firstDay,endDay,"expense");
	    })

	    $('#expenseCategory').change(function(){
	    	var categoryid=$(this).val();
	    	var start=$('.startDate-title').html();
		    var end=$('.endDate-title').html();
		    var url="{{route('filterExpensbyCategory')}}";
      // url=url.replace(':cid',categoryid);
      		$('#expense-table').DataTable({
		          "destroy":true,
		          "sort":false,
                pagingType: 'simple',
                 language: {
                   oPaginate: {
                     sNext: '<i class="fa fa-forward"></i>',
                     sPrevious: '<i class="fa fa-backward"></i>',
                     sFirst: '<i class="fa fa-step-backward"></i>',
                     sLast: '<i class="fa fa-step-forward"></i>'
                     }
                   } ,
		          "searching":true,
		          "processing": true,
       			  "serverSide": true,
		        
		          "ajax": {
		            "url": url,
		            "type": "POST",
		            "data":{cid:categoryid,startdate:start,enddate:end}
		        },
		       	
		          "columns":[
		            {"data":"date"},
		            {"data":"category.name"},
		            {"data":"description"},
		            {"data":'amount'},
		            
		          
		          ],
		          "info":false,
		          "paging":true,
		        })
		    

	    })

	    $('.print-income').click(function(){
	    	var start=$('.startDate-title').html();
		    var end=$('.endDate-title').html();
		    var url="{{route('printIncomeListpdf')}}";
		    $.ajax({
		    	 url: url,
	            type: "POST",
	            data:{startdate:start,enddate:end},
	            success:function(res){
	            		console.log(res);
	            }
		    })
	    })

    })
</script>
@endsection