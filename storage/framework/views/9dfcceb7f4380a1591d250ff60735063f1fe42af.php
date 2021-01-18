 
 <?php $__env->startSection('style'); ?>
 <style>
 	p,h3{
 		font-size: 0.9rem;
 	}
 	.table-responsive {
    max-height:400px;
}

body::-webkit-scrollbar {
  width: 1em;
}
 
body::-webkit-scrollbar-track {
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
 </style>
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card ">
	<div class="card-header border-0">
		<h2>Medical Bill Payment</h2>
		<fieldset class="border px-2">
	    		<legend class="w-auto small text-primary">Treatment Information</legend>
	    			<div class="mx-xl-4 mx-lg-0  pt-2 row treatment-info">
	     			<div class="col-lg-4 col-md-4">
	     				<div class=" d-flex">
		     				<p>PRN No:</p>
		     				<h3 class="ml-2">1234</h3>
		     			</div>
		     			<div class=" d-flex">
		     				<p>Patient Name:</p>
		     				<h3 class="ml-2">Naing Zaw</h3>
		     			</div>
		     			
	     			</div>

	     			<div class="col-lg-4 col-md-4">
	     				<div class=" d-flex">
		     				<p>Age / Sex:</p>
		     				<h3 class="ml-2">13years / female</h3>
		     			</div>
		     			<div class=" d-flex">
		     				<p>Phone No:</p>
		     				<h3 class="ml-2">098765436</h3>
		     			</div>
		     			
	     			</div>

	     			<div class="col-lg-4 col-md-4">
	     				<div class=" d-flex">
		     				<p>Doctor:</p>
		     				<h3 class="ml-2">Dr.Ni Ni Win</h3>
		     			</div>
		     			<div class=" d-flex">
		     				<p>Visit Date:</h3>
		     				<h3 class="ml-2">08-Nov-2019</h3>
		     			</div>
		     			
	     			</div>
					
				</div>
    		</fieldset>
	</div>
     
    <div class="card-body mb-3">
    		
     	
     		
     	

			<div class="container h-100">
				<div class="row h-100">

					<div class="col-lg-4 card p-3  bg-secondary ">
						
						<h2 class="text-center mb-3">Bill Summary</h2>
						<div class="">
							<table class="table" >
								<thead >
									<tr>
										<th s>Payment :Cash</th>
										
										<th  class="text-right">KS</th>
										
									</tr>
								</thead >
								<tbody>
									
									<tr>
										<td >Total</td>
										<td  class="text-right"><h3 class="text-dark mb-0">2000</h3></td>
									</tr>
									<tr>
										<td >Commerical Tax 5%</td>
										<td class="text-right">0</td>
									</tr>
									<tr>
										<td >Net Total</td>
										<td  class="text-right"><h3 class="text-dark mb-0">2000</h3></td>
									</tr>
									<tr >
										<td >By Cash</td>
										<td class="text-right"><input type="text" class="form-control" ></td>
									</tr>
									<tr >
										<td >Changes</td>
										<td style="font-weight: bold" class="text-right"><h3 class="text-dark mb-0">2000</h3></td>
									</tr>
								</tbody>
								
							</table>
							<button class="btn btn-info float-right">Print</button>
						</div>
					</div>

					<div class="col-lg-8  p-3 ">
						<h2 class="mb-3">Medication List</h2>

						<div class="table-responsive">
							<table class="table"  style="width: 100%;" cellpadding="8" >
							<!-- /*<thead style="border-style: dotted; border-left: 0px;border-right: 0px; ">*/ -->
								<thead >
									<tr>
										<th>Medicine</th>
										
										<th>Dosage</th>
										<th>Meal</th>
										<th>During</th>
										
									</tr>
								</thead >
								<tbody>
									<tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr>
									<tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr>
									<tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr>
									<tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr>
									<tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr>
									<tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr><tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr><tr>
										<td>xyloitol</td>
										<td>ot</td>
										<td>Before</td>
										<td>3time</td>
									</tr>
									
									
								</tbody>
								
								
							</table>
						</div>

					</div>

					

					
					
				</div>
				
			</div>
	  </div>
	</div>
	   <!-- modal end here -->

	 

	

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/reception/billCheckout.blade.php ENDPATH**/ ?>