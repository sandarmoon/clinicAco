@extends('frontendTemplate')
@section('style')
<style>
.my-list .list-group-item:first-child {
     border-top-left-radius: 0px; 
     border-top-right-radius: 0px; 
}
.my-list .list-group-item:last-child {
    margin-bottom: 0;
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom: 0px!important;
}
.my-list .list-group-item{
  border-left: 1px solid #0000002b;
  border-bottom: 0px;
  border-right: 0px;
  border-top: 0px;
 /*background-color: #f7fafc !important;*/
   
}
.my-list .list-group-item:hover{
     border-left: 1px solid #000;
}
.myactive{
    border-left: 1px solid #000!important;
}






</style>
@endsection
@section('content')
 <!-- Page content -->
    <div class="container-fluid ">
      <div class="row">
        <div class=" card p-5 m-4 bg-white">
            <div class="row">
                <div class="col-lg-4 col-md-12  ">
                  <div class="">
                    <h1>Medicine Management</h1>
                    <span class="heading-small">Clinic Name :{{Auth::check()? Auth::user()->owners[0]->clinic_name:''}}</span>
                  </div>
                    <ul class="nav nav-tabs my-list flex-md-column border-0 mt-5 ">
                      <li class="list-group-item myactive "><a id="nav-search" href="#nav-home" data-toggle="tab" role="tab">Add Stock</a></li>
                      <li class="list-group-item "><a href="#nav-profile " class="text-darked" data-toggle="tab" role="tab">Create New</a></li>
                      <li class="list-group-item d-none "><a id="nav-two" href="#nav-home-two" class="text-darked" data-toggle="tab" role="tab">Create New</a></li>

                      

                      <li class="list-group-item d-none "><a id="nav-med-update" href="#nav-contact " class="text-darked" data-toggle="tab" role="tab">Contact</a></li>
                      
                    </ul>
                </div>
                <div class="col-lg-8 col-md-12 bg-secondary p-5">
                  <div>
                    
                  </div>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h3 class="heading-medium">Search Medicine</h3>
                        <!-- nav-home is searching medicine -->

                         <form id="searchform">
                          <div class="form-row ">
                            <div class="form-group col-sm-8">
                              <label for="cname" class="sfont">Medicine Name</label>
                              <span class="Ename error d-block" ></span>
                              <input type="text" name="name" id="cname" placeholder="enter medicine name" class="d-inline form-control ">
                              <input type="hidden" name="medicineId">
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="cname" class="sfont">Medicine Size</label>
                              <span class="Ename error d-block" ></span>
                              <input type="text" name="medsize" id="medsize"  readonly class="d-inline form-control ">
                              <input type="hidden" name="medicineId">
                            </div>
                          </div>
             
                              

                              <div class="form-group">
                                <label for="cname" class="sfont">Medicine Type</label>
                                <span class="Ename error d-block" ></span>
                                <input type="text" name="medtype" readonly id="medicineType" class="d-inline form-control ">
                              </div>

                              <!-- <div class="form-group">
                                <label for="medicineType" class="sfont">Choose Medicine Type</label>
                                <select class="form-control" name="type_id"  id="medicineType">
                                  <option value="">Choose Type</option>
                                  @foreach($medTypes as $medType)
                                  <option value="{{$medType->id}}">{{$medType->name}}</option>
                                  @endforeach
                                </select>
                              </div> -->
                              <div class="form-group">
                                <label for="chemical" class="sfont"> Chemicals</label>
                                <span class="Echemical error d-block"></span>
                                <textarea class="form-control" id="chemical" readonly rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <button type="button" class="btn btn-primary btn-md readonly float-right nextbtn ml-1 " onclick="$('#nav-two').trigger('click')">Next</button>
                                 <button type="button" class="btn btn-primary btn-md  float-right addNew">Add</button>
                              </div>
                        </form>
                          
                      </div>
                      <!-- nav-home-tow for quantity for search medicine -->
                      <div class="tab-pane fade show active" id="nav-home-two" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <span class="heading-medium ">Add  Stock for </span><h2 class="medName d-inline text-info"></h2>
                        <div class="col-12">
                          <div class="alert text-scuccess qsuccess d-none" role="alert"></div>
                        </div>
                            <form class="mt-3" id="qtyform" action="" method="post" enctype="multipart/form-data">
                              <!-- for uinit chosing -->
                              <input type="hidden" class="" name="medId">

                              <fieldset class="form-group">
                                <div class="row">

                                  <legend class="col-form-label col-sm-2 pt-0"> Unit</legend>
                                  <div class="col-sm-10 d-flex">

                                    <div class="form-check mr-2">
                                      <input class="form-check-input" type="radio" name="unit" id="gridRadios1" value="1" checked="checked" >
                                      <label class="form-check-label" for="gridRadios1">
                                        Phar
                                      </label>
                                    </div>
                                    <div class="form-check mr-2">
                                      <input class="form-check-input" type="radio" name="unit" id="gridRadios2" value="2">
                                      <label class="form-check-label" for="gridRadios2">
                                        Bu
                                      </label>
                                    </div>
                                    <div class="form-check mr-2 ">
                                      <input class="form-check-input" type="radio" name="unit" id="gridRadios3" value="3" >
                                      <label class="form-check-label" for="gridRadios3">
                                        Card
                                      </label>
                                    </div>

                                     <div class="form-check mr-2 ">
                                      <input class="form-check-input" type="radio" name="unit" id="gridRadios3" value="4" >
                                      <label class="form-check-label" for="gridRadios3">
                                        Tab
                                      </label>
                                    </div>

                                  </div>
                                </div>

                              </fieldset>
                              <!-- for unit ending -->
                              <div class="form-group row">

                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>

                                <div class="col-sm-10 row pr-0">

                                  <div class="input-group col unit-phar ">
                                    <input type="text" name="phar"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    <div class="input-group-append">
                                      
                                      <span class="input-group-text">Phar</span>
                                    </div>
                                  </div>

                                  <div class="input-group col unit-bu ">
                                    <input type="text" name="bu"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    <div class="input-group-append">
                                      
                                      <span class="input-group-text">Bu</span>
                                    </div>
                                  </div>

                                  <div class="input-group col unit-card ">
                                    <input type="text" name="card"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    <div class="input-group-append">
                                      
                                      <span class="input-group-text">Card</span>
                                    </div>
                                  </div>

                                  <div class="input-group col unit-tab ">
                                    <input type="text" name="tab"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    <div class="input-group-append">
                                     
                                      <span class="input-group-text">Tab</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="totalTab" class="col-sm-2 col-form-label">Total Tab </label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="totaltab"  id="totalTab">
                                  <span class="error-tab"></span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ExpiredDate" class="col-sm-2 col-form-label">Expired Date</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" name="expiredDate" id="ExpiredDate">
                                   <span class="error-expiredDate"></span>
                                </div>
                              </div>
                              
                            
                              <div class="form-group row">
                                <div class="ml-auto">
                                  <button type="reset" class="btn btn-outline-danger">Reset</button>
                                  <button type="submit" class="btn btn-primary">Add Now!</button>
                                </div>
                              </div>
                          </form>
                      </div>
                      <!-- nav-profile-tab for medicine create new -->
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h2 class=" d-inline text-primary">New Medicine Form</h2>
                         <form id="AddMedicineForm">

                            <div class="col-12">
                              <div class="alert text-scuccess success d-none" role="alert"></div>
                            </div>
                             <div class="form-group">
                              <label for="cname" class="sfont">Medicine Name</label>
                              <span class="Ename error d-block" ></span>
                              <input type="text" name="name" id="cname" placeholder="enter medicine name" class="d-inline form-control ">
                            </div>

                            <div class="form-group">
                              <label for="medsize" class="sfont">Medicine Name</label>
                              <span class="Emedsize error d-block" ></span>
                              <input type="text" name="medsize" id="medsize" placeholder="enter medicine name" class="d-inline form-control ">
                            </div>
                            


                            <div class="form-group">
                              <label for="medicineType" class="sfont">Choose Medicine Type</label>
                              <span class="Etype_id error d-block" ></span>
                                <select class="form-control" name="type_id"  id="medicineType">
                                  <option value="">Choose Type</option>
                                  @foreach($medTypes as $medType)
                                  <option value="{{$medType->id}}">{{$medType->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="chemical" class="sfont">Enter Chemicals</label>
                              <span class="Echemical error d-block"></span>
                              <textarea class="form-control" name="chemical" id="chemical" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-md  float-right ">Add</button>
                            </div>
                          </form>


                         


                      </div>
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                         <form id="EditMedicineForm" >
                            <h2>Updating Medicine</h2>
                            <div class="form-group">
                              <label for="ucname" class="sfont">Medicine Name</label>
                              <span class="UEname error d-block" ></span>
                              <input type="text" name="name" id="ucname" placeholder="enter medicine name" class="d-inline form-control "> 
                            </div>
                             <div class="form-group">
                              <label for="umedsize" class="sfont">Medicine Size</label>
                              <span class="UEmedsize error d-block" ></span>
                              <input type="text" name="medsize" id="umedsize" placeholder="enter medicine name" class="d-inline form-control "> 
                            </div>
                            <input type="hidden" name="" class="medid">
                            <div class="form-group">
                              <label for="umedicineType" class="sfont">Choose Medicine Type</label>
                              <select class="form-control" name="typeid"  id="umedicineType">
                                 <option value="">Choose Type</option>
                                @foreach($medTypes as $medType)
                                <option class="medtype-{{$medType->id}}" value="{{$medType->id}}">{{$medType->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="uchemical" class="sfont">Enter Chemicals</label>
                              <span class="UEchemical error d-block"></span>
                              <textarea class="form-control" name="chemical" id="uchemical" rows="3"></textarea> 
                            </div>
                            <div class="form-group">
                              <button type="button" class="btn btn-primary btn-md  float-right update">Update</button>
                            </div>
                          </form>
                      </div>
                    </div>
                </div>
            </div>
            
            
        </div>
      </div>
      <!-- Footer -->

      <!-- table start  -->
      
      <!-- table end -->

       <div class="row">
        <div class="col-md-12  p-5 m-4 bg-white">
            <div class="">
                <!-- Card header -->
                <div class="card-header border-0">
                  <h3 class="mb-0">Medicines</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="medicineTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Chemical Things</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
                <!-- Card footer -->
                
              </div>  
        </div>
      </div>
      
    </div>
	
@endsection
@section('script')


<script>
    $(document).ready(function(){
      getData();

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      // showData start
       function getData(){
          var i=1;
              $('#medicineTable').DataTable({
              
              "processing": true,
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
                 "stateSave": true,  //restore table state on page reload,
               "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
              "ajax": "{{route('getMedicine')}}",
              "columns":[

                   {data:'DT_RowIndex'},

                  { "data": "name" },

                  { "data": "medcinetype"
                  } ,

                  { "data": "chemical"
                  } ,

                  { "data":function(data){
                      return `<button class="btn btn-primary btn-sm d-inline-block btnEdit "  data-id="${data.id}" data-name="${data.name}"><i class="ni ni-settings"></i></button>
                                <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${data.id}"> <i class="ni ni-fat-delete"></i></button>`;
                    }
                   }
              ],
              "info":false
              
           });
      }
      // showData end



        $('.my-list').on('click', 'li', function(){
            $('.my-list li').removeClass('myactive');
            $(this).addClass('myactive');
        });

         $('.nextbtn').bind('click', function() {
            activate = true; // Activate tab functionality
            //$().trigger('click'); // Trigger a click on the second tab link
            $('.nav-tabs li a[href="' + $('#nav-two').attr('href') + '"]').trigger('click');
          });

//search medicine here start
         $('#searchform input[name="name"]').autocomplete({
        source: function (request, response) {
                  jQuery.get("/getmed", {
                      query: request.term
                  }, function (data) {
                      var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                      // console.log(matcher);
          
                      // response(data.data);
                       response($.map( data, function( item ) {
                        if(matcher.test(item.name)){
                          // $('#log').html(item.name);
                         $(this).attr('data-med',item.id);
                          return {
                                label: item.name ,
                                value: item.name,
                                data:item
                            }
                        }
                            
                        }));
                  });
              },
          minLength: 2,
          select: function( event, ui ) {
            // console.log(event);
             $('input[name="medicineId"]').val(ui.item.data.id);
             $('.medName').html(ui.item.data.name);
            $('input[name="medtype"]').val(ui.item.data.medicinetype.name);
            $('#chemical').val(ui.item.data.chemical);
            $('input[name="medsize"]').val(ui.item.data.size);
            $('input[name="medId"]').val(ui.item.data.id);
            console.log(ui.item.label);
             // $('#log').html( "Selected: " +ui.item.label + " aka " + ui.item.type);
          }
      })
      
      $('#qtyform input[name="unit"]').on('change', function() {

         var value=$('input[name=unit]:checked', '#qtyform').val(); 
         if(value==1){
          $('.unit-phar').removeClass('d-none');
          $('.unit-bu').removeClass('d-none');
          $('.unit-card').removeClass('d-none');
          $('.unit-tab').removeClass('d-none');
          $('input[name="phar"]').val('');
      $('input[name="bu"]').val('');
        $('input[name="card"]').val('');
       $('input[name="tab"]').val('');
       $('#totalTab').val('');
        $('#totalTab').prop('readonly',false);
         }

         if(value==2){
          $('.unit-phar').addClass('d-none');
          $('.unit-bu').removeClass('d-none');
          $('.unit-card').removeClass('d-none');
          $('.unit-tab').removeClass('d-none');
          $('input[name="phar"]').val('');
      $('input[name="bu"]').val('');
        $('input[name="card"]').val('');
       $('input[name="tab"]').val('');
       $('#totalTab').val('');
        $('#totalTab').prop('readonly',false);
         }

         if(value==3){
          $('.unit-phar').addClass('d-none');
          $('.unit-bu').addClass('d-none');
          $('.unit-card').removeClass('d-none');
          $('.unit-tab').removeClass('d-none');
          $('input[name="phar"]').val('');
      $('input[name="bu"]').val('');
        $('input[name="card"]').val('');
       $('input[name="tab"]').val('');
       $('#totalTab').val('');
        $('#totalTab').prop('readonly',false);
         }

         if(value==4){
          $('.unit-phar').addClass('d-none');
          $('.unit-bu').addClass('d-none');
          $('.unit-card').addClass('d-none');
          $('.unit-tab').removeClass('d-none');
          $('input[name="phar"]').val('');
      $('input[name="bu"]').val('');
        $('input[name="card"]').val('');
       $('input[name="tab"]').val('');
       $('#totalTab').val('');
        $('#totalTab').prop('readonly',false);
         }


      });
      
      $('#totalTab').click(function(){
        // alert('he');
        var phar=$('input[name="phar"]').val();
        var bu=$('input[name="bu"]').val();
        var card=$('input[name="card"]').val();
        var tab=$('input[name="tab"]').val();
        let total=0;
        if(phar==''){
          phar=1;
        }

        if(bu==''){
          bu=1;
        }
        if(card==''){
          card=1;
        }
        // console.log(tab);
         total= phar *(bu *(tab * card));
       
        // if(phar=='' && bu=='' & card==''){
        //   alert('heo');
        //  total=tab;
        // }

        console.log(total);

       
        $(this).val(total);
        $(this).prop('readonly',true);
      })

      $('#qtyform').submit(function(e){
        e.preventDefault();
        let url="{{route('stock.store')}}";

        let formdata= new FormData(this);
         $.ajax({
                type:'POST',
                url: url,
                data: formdata,
                cache:false,
                contentType: false,
                processData: false,
                success:function(response){
                   if(response.success){
                    
                    $('.medName').html('');
                    $('input[name="medId"]').val('');
                  
                     $('.Ename').text('');
                    $('span.error').removeClass('text-danger');
                    $('.Echemical').text('');
                    $('.qsuccess').removeClass('d-none');
                    $('.qsuccess').show();
                    $('.qsuccess').text('successfully added');
                    $('.qsuccess').fadeOut(3000);
                    $(this).trigger('reset');
                    // $('#AddMedicineForm input[name="name"]').val('');
                    // $( "#medicineType option:selected" ).val('');
                    // chemical=$('#AddMedicineForm input[name="chemical"]').val('');
                    $('.nav-tabs li a[href="' + $('#nav-search').attr('href') + '"]').trigger('click');
                    // getData();
                }},
                error:function(data){
                  let errors=data.responseJSON.errors;
                  $.each(errors,function(i,v){
                    // console.log(i);
                    $(`.error-${i}`).html(v);
                    $(`.error-${i}`).addClass('text-danger');
                  })
                }


        })

      })

      //for createing new medicine
      $('#AddMedicineForm').submit(function(e){
        e.preventDefault();
        alert('heo');
      // var name=$('#cname').val();
      // var id=$( "#medicineType option:selected" ).val();
      // var chemical=$('#chemical').val();
      let formdata=new FormData(this);
      let url="{{route('medicine.store')}}"
    
       $.ajax({
          url:url,
          type:"post",
          data:formdata,
          cache:false,
                contentType: false,
                processData: false,
          success:function(response){
            if(response.success){
              let med=response.medicine;
              $('.medName').html(med.name);
              $('input[name="medId"]').val(med.id);
            
               $('.Ename').text('');
              $('span.error').removeClass('text-danger');
              $('.Echemical').text('');
              $('.success').removeClass('d-none');
              $('.success').show();
              $('.success').text('successfully added');
              $('.success').fadeOut(3000);
              $(this).trigger('reset');
              // $('#AddMedicineForm input[name="name"]').val('');
              // $( "#medicineType option:selected" ).val('');
              // chemical=$('#AddMedicineForm input[name="chemical"]').val('');
              $('.nav-tabs li a[href="' + $('#nav-two').attr('href') + '"]').trigger('click');
              getData();
                

              
            }
            // $('#medicineTable').DataTable().ajax().reload();
          },
          error:function(error){
            var message=error.responseJSON.message;
            var errors=error.responseJSON.errors;
            $.each(errors,function(i,v){
              $(`.E${i}`).html(v);
              $(`.E${i}`).addClass('text-danger');
            })
            // console.log(error.responseJSON.errors);
            // if(errors){
            //   var chemical=errors.chemical;
            //   var name=errors.name;
            //   $('.Ename').text(name);
            //   $('span.error').addClass('text-danger');
            //   $('.Echemical').text(chemical);
            // }

          }
          

        })

       
    })

      $('#medicineTable').on('click','.btnEdit',function(){
        // alert('show');
          $('.nav-tabs li a[href="' + $('#nav-med-update').attr('href') + '"]').trigger('click');
          // $()
         
        
        var id=$(this).data('id');
        // alert(id);
         var url="{{route('medicine.edit',':id')}}";
        
        url=url.replace(':id',id);
        $.get(url,function(res){
          $('#ucname').val(res.name);
          $('#umedsize').val(res.size);
          $( ".medtype-"+`${res.medicinetype_id}` ).attr('selected','selected');
          
          $('#uchemical').text(res.chemical);
          $('.medid').val(res.id);
         
        })


      })

      $('#EditMedicineForm .update').click(function(){
      var id=$('.medid').val();
      var obj=$('#EditMedicineForm').serialize();
      var url="{{route('medicine.update',':id')}}";
      url=url.replace(':id',id);
      $.ajax({
        url:url,
        type:'PATCH',
        data:obj,
        dataType:'json',
        success:function(res){
          // console.log('heloo world');
          if(res.success){
            $('.success').removeClass('d-none');
                  $('.success').show();
                  $('.success').text('successfully updated');
                  $('.success').fadeOut(3000);
                  $('#ucname').val('');
                   $('#uchemical').text('');
              $('.medid').val('');
              $('#EditMedicineForm').trigger('reset');
              // $('#EditMedicine').hide();
              // $('#AddMedicine').show();
              $('.nav-tabs li a[href="' + $('#nav-search').attr('href') + '"]').trigger('click');
            getData();
            // $('#medicineTable').DataTable().ajax().reload();
          }
          
          
        },
        error:function(error){
          var message=error.responseJSON.message;
              var errors=error.responseJSON.errors;
              console.log(error.responseJSON.errors);
              if(errors){
                var chemical=errors.chemical;
                var name=errors.name;
                $('.UEname').text(name);
                $('span.error').addClass('text-danger');
                $('.UEchemical').text(chemical);
              }
        }
      })
      
      
    })



    })
</script>


@endsection