<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12" style="margin-top: 0px;">

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        

        <h3 class="mb-0">Daily Expense List</h3>

         <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addExpense">
            Add Expense!
          </button>
      </div>
      
                 
                
      <div class="card-body">
        <div class="table-responsive">
          <table class="table  align-items-center table-white table-flush example" id="expenseTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
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
</div>
</div>
</div>


<!-- Add Model -->
<div class="modal fade" id="addExpense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Expense</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form start -->
      <form id="expense-from" method="post" enctype="multipart/form-data">
          <div class="modal-body p-2">
              
                
              
                <div class="col-md-12">
                    <div class="form-group ">
                      <input type="date" name="date" placeholder="" class="form-control is-valid" />
                      
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="expenseCategory">Choose Expense Category</label>
                      <select class="form-control" name="category" id="expenseCategory">
                        <option>Choose here</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>">
                          <?php echo e($category->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>



                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" name="description" class="form-control" id="description" placeholder="why use?" />
                       <span class="description error "></span>
                    </div>
                   
                    
                  </div>
                  
                
               
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <div class="input-group ">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni  ni-credit-card"></i></span>
                        </div>
                         <input class="form-control" name="amount" id="amount" placeholder="$$$" type="text">

                      </div>

                        <span class="amount error "></span>
                       
                    </div>
                  </div>
                  

                
                
                  <div class="col-md-12">
                    <div class="form-group remove1">
                      <label for="Recepits" class="d-block">Recepits</label>
                      <input type="file" name="file1" id="Recepits" placeholder="Success" class=" " />
                     <!--  <button type="button"  class="btn btn-danger btn-sm float-right delete1" data-id="1" ><span>×</span></button> -->
                    </div>
                    
                  </div>
                  
                    <div class="col-md-12 a" >
                      
                    </div>
                  

                  <div class="col-md-12" title="add more Recepits">
                      <button onclick="JavaScript:addmore(0);" type="button" class="btn btn-success" >
                      <i class="ni ni-fat-add "></i>
                      </button>
                    </div>
                
             
            
              
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary " value="Add Expense"/>
          </div>
      </form>
      <!-- form end -->
    </div>
  </div>
</div>
      <!-- modal end -->


      <!-- Edit Modal -->
<div class="modal fade" id="editExpense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Expense</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form start -->
      <form id="expense-from-edit" method="post" enctype="multipart/form-data">
          <div class="modal-body p-2">
              
                <!-- old id -->
                <input type="hidden" name="oldid" id="oldID">
              
                <div class="col-md-12">
                    <div class="form-group ">
                      <input type="date" name="date" id="edate" class="form-control is-valid" />
                    </div>
                  </div>

                   <div class="col-md-12">
                    <div class="form-group">
                      <label for="editexpenseCategory">Choose Expense Category</label>
                      <select class="form-control" name="category" id="editexpenseCategory">
                        <option>Choose here</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>">
                          <?php echo e($category->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>



                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="edescription">Description</label>
                      <input type="text" name="description" id="edescription" class="form-control" id="description" placeholder="why use?">
                      <span class="edescription error "></span>
                    </div>
                  </div>
                  
                
               
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="eamount">Amount</label>
                      <div class="input-group">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni  ni-credit-card"></i></span>
                        </div>
                        <input class="form-control" name="amount" id="eamount" placeholder="$$$" type="text">
                      </div>
                      <span class="eamount error "></span>
                    </div>
                  </div>

                  <div class="col-md-12 my-4">
                    <label for="eRecepits" class="d-block">Recepits</label>
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldRecepits" role="tab" >Old</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newRecepits" role="tab" >New</a>
                      </li>
                      
                      </ul>
                      <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="oldRecepits" role="tabpanel" aria-labelledby="home-tab">I am old photo</div>
                      <div class="tab-pane fade" id="newRecepits" role="tabpanel" aria-labelledby="profile-tab">
                        
                         <div class="col-md-12 mt-2">
                            <div class="form-group remove1">
                              
                              <input type="file" name="file1" id="eRecepits" placeholder="Success" class=" " />
                             <!--  <button type="button"  class="btn btn-danger btn-sm float-right delete1" data-id="1" ><span>×</span></button> -->

                             <!-- old image -->
                             <input type="hidden" name="oldimage" id="oldimage">

                            </div>
                            
                          </div>
                          
                            <div class="col-md-12 Edit">
                              
                            </div>
                          

                          <div class="col-md-12" title="add more Recepits">
                              <button onclick="JavaScript:addmoreEdit(0);" type="button" class="btn btn-success" >
                              <i class="ni ni-fat-add "></i>
                              </button>
                            </div>

                      </div>
                      
                      </div>
                  </div>
                  

                
                
                 
                
             
            
              
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary " value="Update Expense"/>
          </div>
      </form>
      <!-- form end -->
    </div>
  </div>
</div>
      <!-- modal end -->



       <!-- for recepit photo show -->
      <div class="modal fade bd-example-modal-lg" id="showphoto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- carousel start -->
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bigpreview">
                  
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            <!-- carousel end -->
        </div>
      </div>
    </div>
      <!-- for recepit photo end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
//chart start
/*var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});*/

//chart end



  //get today date with js start
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;


  document.querySelector('#expense-from input[type="date"]').value = today;
  // end date
  

  
    // document.querySelector('#addMoreFile').addEventListener('click',(function(){
  //     alert('helo');
  //     var btn= `<div class="form-group">
  //                     <label for="Recepits">Recepits</label>
  //                     <input type="file" name="file1" id="Recepits" placeholder="Success" class="form-control " />
  //                   </div>`;
  //   })
  //   );
  var i=2;


  //adding more file for add_from
  function addmore(){
    // console.log(i);
    // console.log("make");
    
    var btn= `<div class="form-group remove${i}">
                       <label for="Recepits" class="d-block">Recepits</label>
                       <input type="file" name="file${i}" data-id="${i}" id="Recepits" placeholder="Success" class="" />
                       <button type="button"  class="btn btn-danger btn-sm float-right delete" data-id="${i}" ><span>×</span></button>
                   </div>`;
                   i++;


                  document.querySelector('.a').innerHTML+=btn;
  }

 //adding more file for edit_from
  function addmoreEdit(){
    // console.log(i);
    // console.log("make");
    
    var btn= `<div class="form-group remove${i}">
                       <label for="Recepits" class="d-block">Recepits</label>
                       <input type="file" name="file${i}" data-id="${i}" id="Recepits" placeholder="Success" class="" />
                       <button type="button"  class="btn btn-danger btn-sm float-right delete" data-id="${i}" ><span>×</span></button>
                   </div>`;
                   i++;


                  document.querySelector('.Edit').innerHTML+=btn;
  }

  $(document).ready(function(){
    //csrf toten
    // getData();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


  //show data  start

         $('#expenseTable').DataTable({
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
                "ajax": "<?php echo e(route('getExpense')); ?>",
                "columns":[

                     {"data":"DT_RowIndex"},
                    {"data":"date"},
                    {"data":"category.name"},
                    {"data":"description"},
                    {"data":"amount"},
                    {data:function(data){

                      let html='';
                      html=`
                      <button class="btn btn-warning btn-sm d-inline-block btn-detail " data-date="${data.date}" data-description="${data.description}" data-amount="${data.amount}" data-files=${data.files} data-id="${data.id}"><i class="ni ni-album-2"></i></button>
                   <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-category="${data.category.id}"
                   data-date="${data.date}" data-description="${data.description}" data-amount="${data.amount}" data-files=${data.files} data-id="${data.id}"><i class="ni ni-settings"></i></button>
                            <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${data.id}"> <i class="ni ni-fat-delete"></i></button>

                      `
                      

                     return html;
                    }}
                ],
                "info":false
                
             });
   

  //show data end

//searchreport

  $('#search').submit(function(e){
    e.preventDefault();
    // alert('helo');
     var formdata= new FormData(this);
    var startdate=$('#search input[name="startdate"]').val();
    var enddate=$('#search input[name="enddate"]').val();
    // console.log(startdate,enddate);
      var url="<?php echo e(route('searchReport')); ?>";
      $.ajax({
                type:'POST',
                url: url,
                data: formdata,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                   if(data){
                    var expense=data.totalExpense;
                    var income=data.totalIncome;
                    var profit=income-expense;
                    $('.totalExpense').text(expense);
                    $('.totalIncome').text(income);
                    $('.totalProfit').text(profit);
                    $('.totalExpense').addClass('text-dark');
                    $('.totalIncome').addClass('text-dark');
                    $('.totalProfit').addClass('text-dark');
                   }
                       
                },
                error: function(error){
                   var errors=error.responseJSON.errors;
                   if(errors){
                      $('.Sdate').text(errors.startdate);
                      $('.Edate').text(errors.enddate);
                      $('span.error').addClass('text-danger');
                   }
                }
            });




  })









//deleting file for add_from

    $('.a').on('click','.delete',function(){
        var id=$(this).data('id');
        $(`.remove${id}`).remove();
    })

 //deleting file for edit_from

     $('.Edit').on('click','.delete',function(){
        var id=$(this).data('id');
        $(`.remove${id}`).remove();
    })



    // $('.delete1').click(function(){
    //   $('.remove1').remove();
    // })

    //add expense
    $('#expense-from').submit(function(e){
      e.preventDefault();
      var formdata= new FormData(this);
      var url="<?php echo e(route('expense.store')); ?>";
      // formData.append('_method', 'PUT');
          $.ajax({
                type:'POST',
                url: url,
                data: formdata,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                   $('#addExpense').modal('hide');
                        $('#expenseTable').DataTable().ajax.reload();
                   $('.success').removeClass('d-none');
                    $('.success').addClass('text-danger');
                        $('.success').show();
                        $('.success').text('successfully Added');
                        $('.success').fadeOut(3000);
                         i=2;
                       
                },
                error: function(error){
                   var errors=error.responseJSON.errors;
                   if(errors){
                   
                    $('.date').text(errors.name);
                    $('.description').text(errors.description);
                     $('.amount').text(errors.amount);
                    $('span.error').addClass('text-danger');
                   }
                }
            });

         
    })

    //edit expense
    $('#expense-from-edit').submit(function(e){
      e.preventDefault();
      var id=$('#oldID').val();
      var formdata= new FormData(this);
      var url="<?php echo e(route('expense.update',':oldID')); ?>";
      url=url.replace(':oldID',id);
      formdata.append('_method', 'PUT');
          $.ajax({
                type:'POST',
                url: url,
                data: formdata,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                  $('#editExpense').modal('hide');
                        $('#expenseTable').DataTable().ajax.reload();
                   $('.success').removeClass('d-none');
                    $('.success').addClass('text-danger');
                        $('.success').show();
                        $('.success').text('successfully updated');
                        $('.success').fadeOut(3000);
                          i=2;
                        
                },
                error: function(error){
                   $('.edate').text(errors.name);
                    $('.edescription').text(errors.description);
                     $('.eamount').text(errors.amount);
                    $('span.error').addClass('text-danger');
                }
            });

          
    })

   

    //show edit form of expense
    $('#expenseTable').on('click','.btnEdit',function(){
      // alert('i am edit');
        var id=$(this).data('id');
        var category=$(this).data('category');
        var description=$(this).data('description');
        var amount=$(this).data('amount');
        var date=$(this).data('date');
        var files=$(this).data('files');
        $('#edate').val(date);
        $('#edescription').val(description);
        $('#eamount').val(amount);
        // console.log(files);
        showImage('#oldRecepits',files)




         $('#eamount').val(amount);
         $('#editexpenseCategory').val(category);
         $('#oldimage').val(JSON.stringify(files));
         $('#oldID').val(id);
       $('#editExpense').modal('show');

     // var url="<?php echo e(route('expense.edit',':id')); ?>";
    })
//image show after deleting one by one

function showImage(palcement,files){
    var html2='';
    console.log(typeof files);
        $.each(files,function(i,v){
          var frame= `
          <div class="d-inline parent my-2">
              <img src="<?php echo e(asset(':v')); ?>" width ='100px' height="80px" class="img-fluid p-2"/>
              <div  class="top-right d-inline text-danger  img-remove" data-id="${i}">
                 <i class="ni ni-fat-remove" title="delete it!"></i>
              </div>
          </div>

            
          `;

          frame=frame.replace(':v',v);
          html2+=frame;
        })

        $(palcement).html(html2);
}



    //image delete by one by one

    $('#oldRecepits').on('click','.img-remove',function(e){
        e.preventDefault();
      var id=$(this).data('id');
      var files=$('.btnEdit').data('files');
        files.splice(id, 1);
        showImage('#oldRecepits',files);
         $('#oldimage').val(JSON.stringify(files));
      
    })






    //delete process
     $('#expenseTable').on('click','.btnDelete',function(){
      //alert('i am delete');
        if(confirm('Are you sure to delete?')){
           var id=$(this).data('id');
            // console.log(id);
             var url="<?php echo e(route('expense.destroy',':id')); ?>";
            
             url=url.replace(':id',id);

                 $.ajax({
                    url:url,
                    type:"post",
                    data:{"_method": 'DELETE'},
                    dataType:'json',
                    success:function(res){
                      if(res.success){
                      $('.success').removeClass('d-none');
                      $('.success').addClass('text-danger');
                          $('.success').show();
                          $('.success').text('successfully Deleted');
                          $('.success').fadeOut(3000);
                           $('#expenseTable').DataTable().ajax.reload();

                      }},
                      

                  });
        }
    })

     $('#expenseTable').on('click','.btn-detail',function(){
      // alert('heo');
      let files=$(this).attr('data-files');

      files=JSON.parse(files);
      // console.log(files);
      let len=Object.keys(files).length;
      if(len >0){
         showCarousel(files,"Recipets")
       }else{
        swal({
              icon: "error",
              text:"There is no record!"
            });
       }

      
     })

     function showCarousel(list,text){
      // alert('helo');
          var html=''; var isfrist=true;
          $.each(list,function(i,v){

            var carou=`<div class="`
            if(isfrist){
              carou+=`active `;
            }

            carou+=`carousel-item">

          <img src="<?php echo e(asset(':v')); ?>" class="d-block w-100" height = '500' alt="...">
        </div>`;
            carou=carou.replace(':v',v);
            html+=carou;
            isfrist=false;
          })
          $('.caption').html(text);
          $('.bigpreview').html(html);
          $('#showphoto').modal('show');
     }
  })//end js


// chart start




 


</script>


<?php $__env->stopSection(); ?>





<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/expense/expenseList.blade.php ENDPATH**/ ?>