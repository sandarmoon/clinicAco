<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
		              "ajax": "<?php echo e(route('getTreatments')); ?>",
		              
		              "columns":[

		                   {"data":"DT_RowIndex"},
		                   {"data":"patient.name"},
		                   {"data":"patient.gender"},
		                   {"data":"patient.age"},
		                   {"data":"patient.id",
		                   render:function(data){
		                   	let url="<?php echo e(route('bill-check-out',':pid')); ?>";
		                   	url=url.replace(':pid',data);
		                   	return `
		                   	<?php if(auth()->check() && auth()->user()->hasRole('Doctor')): ?>
		                   	<button class="btn btn-primary btn-sm d-inline-block btnEdit "  data-id="${data}"><i class="ni ni-settings"></i></button>
		                   	<?php endif; ?>
		                        <button class="btn btn-warning btn-sm d-inline-block btn-checkout "  data-id="${data}"><i class="ni ni-circle-08"></i></button>
		                        <?php if(auth()->check() && auth()->user()->hasRole('Reception')): ?>
		                        <a class="btn btn-success btn-sm d-inline-block "  href="${url}">check out</a>
		                        <?php endif; ?>
		                        `

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
		     	var url="<?php echo e(route('treatment.edit',':id')); ?>";
		      
		          url=url.replace(':id',id);
		          // $(this).attr('href',url);
		          window.location.href=url;
		     	
		     })
	} );
		


 
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/treatment/index.blade.php ENDPATH**/ ?>