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


#qtyform .form-control,#searchform input[name="name"]{
  height: calc(2.0rem + 2px);
}




</style>
@endsection
@section('content')
 <!-- Page content -->










    <div class="container-fluid p-0 ">
      <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="p-4 row">
                <div class="col-xl-6 col-lg-12 col-md-12">  
                    <h3 class=" p-0 pr-4 mt-3 ">Medicine Management</h3>
                     <h6 class="small text-muted mb-4">Clinic Name :{{Auth::check()? Auth::user()->owners[0]->clinic_name:''}}</h6>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12 row mt-xl-3 ">
                  <div class="col-xl-12 col-lg-12 col-md-12 " id="searchform">
                    <input type="text" name="name" id="cname" placeholder="Search medicine name" class="d-inline form-control ">
                    <input type="hidden" name="medicineId">
                    
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-3 mt-md-3 mt-3 ">
                    
                        <button class="btn btn-primary btn-sm btn-create  float-right ">Create New</button>
                        <button class="btn btn-primary btn-sm btn-list float-right mr-2">Back to List</button>
                        <button class="btn btn-primary btn-sm btn-monthly_list float-right mr-2">Monthly Medicine List</button>
                        
                   
                  </div>
                </div>

                
              </div>
              <div class="card-body px-3 py-0 ">
                <div class="row d-none  " id="searching" >

                  <!-- general information -->
                  <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 col-12 ">
                    <h6 class="heading-small text-muted mb-4">Medicine information</h6>

                    <div class="row  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >

                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class=" mb-0 ">Name:</p>
                                  <h5 class="medNameinfo heading-my ml-3 " style="transform: none;">May Ka Lar</h5>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">

                        <p class=" mb-0 d-flex ">Size:</p>
                                  <h5 class="medSize  heading-my ml-3 " style="transform: none;">May Ka Lar</h5>
                              </div>
                      </div>

                      <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                        <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-xs-6 col-6 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                          
                                    <p class="description mb-0 ">Type:</p>
                                    <h5 class="medType heading-my ml-3 my-td " style="transform: none;">Sep 30th 1998</h5>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                          <p class="description mb-0 ">Chemical</p>
                                  <h5 class="medChemical my-td heading-my ml-3 my-td " style="transform: none;">Sep 30th 1998aefaefafaeafefefaefaefaeffafaefae</h5>
                                </div>
                      </div>

                      <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                        <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6 col-xs-6 col-6 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                          
                                    <p class="description mb-0 ">Created Date:</p>
                                    <h5 class="medType heading-my ml-3 my-td " style="transform: none;">Sep 30th 1998</h5>
                        </div>
                        
                      </div>

                    
                  </div>
                  <!-- user information -->
                  <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 col-12 ">
                    <h6 class="heading-small text-muted mb-4">Adding Stock
                      <span class="error error-medId"> </span>
                      <span class="success"> </span>
                    </h6>
                    
                    <form class="mt-3" id="qtyform" action="" method="post" enctype="multipart/form-data">
                        <!-- for uinit chosing -->
                        <input type="hidden" class="" name="medId">
                        <div class="form-row">

                          
                            <div class="col">
                              <label for="">Phar:</label>
                              <input type="text" name="phar"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                            <div class="col">
                              <label for="">Bu:</label>
                              <input type="text" name="bu"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                            <div class="col">
                              <label for="">Card:</label>
                              <input type="text" name="card"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                            <div class="col">
                              <label for="">Tab:</label>
                              <input type="text" name="tab"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                          
                        </div>

                        <div class="form-row">

                          
                            <div class="col">
                               <div class="form-group">
                                <label for="totalTab" class=" col-form-label">Total Tab<br/>
                                <span class="error error-tab"></span> </label>
                                <div class="">
                                  <input type="text" class="form-control" name="totaltab"  id="totalTab">
                                  
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="ExpiredDate" class=" col-form-label">Expired Date<br/>
                                 <span class="error error-expiredDate"></span></label>
                               
                                <div class="">
                                  <input type="date" class="form-control" name="expiredDate" id="ExpiredDate">
                                   
                                </div>
                              </div>
                            </div>
                            
                          
                        </div>


                      
                        <div class="row">
                          
                            <div class="col"><button type="reset" class="form-control btn btn-outline-danger btn-sm">Reset</button></div>
                            <div class="col">
                              <button type="submit" class="form-control btn btn-primary btn-sm">Add Now!</button>
                            </div>
                            
                          
                        </div>
                    </form>
                    
                  </div>

                  

                  
                  
                </div>

                <!-- start create new body -->
                <div class="row d-none" id="creating" >

                  <!-- general information -->
                  <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 col-12 ">
                    <span class="success"></span>
                    <h6 class="heading-small text-muted mb-4">Create Form</h6>

                    <form id="AddMedicineForm">

                           <!--  <div class="col-12">
                              <div class="alert text-scuccess success d-none" role="alert"></div>
                            </div> -->
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
                            
                          

                    
                            </div>
                            <!-- user information -->
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 col-12 ">
                              <h6 class="heading-small text-muted mb-4">Adding Stock
                                <!-- <span class="error error-medId"> </span>
                                <span class="success"> </span> -->
                              </h6>
                        
                        
                            <!-- for uinit chosing -->
                            <input type="hidden" class="" name="medId">
                            <div class="form-row">

                              
                                <div class="col">
                                  <label for="">Phar:</label>
                                  <input type="text" name="cphar"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                </div>
                                <div class="col">
                                  <label for="">Bu:</label>
                                  <input type="text" name="cbu"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                </div>
                                
                              
                            </div>
                            <div class="form-row mt-4">
                                <div class="col">
                                  <label for="">Card:</label>
                                  <input type="text" name="ccard"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                </div>
                                <div class="col">
                                  <label for="">Tab:</label>
                                  <input type="text" name="ctab"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                </div>
                              
                            </div>

                            <div class="mt-2">

                              
                                
                                   <div class="form-group">
                                    <label for="totalTab" class=" col-form-label">Total Tab<br/>
                                    <span class="error Ectab"></span> </label>
                                    <div class="">
                                      <input type="text" class="form-control" name="totaltab"  id="totalTab2">
                                      
                                    </div>
                                  </div>
                               
                                
                                  <div class="form-group">
                                    <label for="ExpiredDate" class=" col-form-label">Expired Date<br/>
                                     <span class="error EexpiredDate"></span></label>
                                   
                                    <div class="">
                                      <input type="date" class="form-control" name="expiredDate" id="ExpiredDate">
                                       
                                    </div>
                                  </div>
                                
                                
                              
                            </div>


                          
                            </div>
                            <div class="col-md-12 row">
                              
                                <div class="col"><button type="reset" class="form-control btn btn-outline-danger btn-sm">Reset</button></div>
                                <div class="col">
                                  <button type="submit" class="form-control btn btn-primary btn-sm">Add Now!</button>
                                </div>
                                
                              
                            </div>
                    </form>
                    
                  </div>
  
                </div>
                <!-- end here -->

                 <div class="d-none" id="monthMdiv" >
                 <!-- start table list n-->
              
                  
                        <!-- Card header -->
                        
                        <!-- Light table -->
                        <div class="table-responsive p-4">
                          <table class="table align-items-center" id="mmtable">
                            <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Chemical Things</th>
                                <th>Phar</th>
                                <th>bu</th>
                                <th>card</th>
                                <th>tab</th>
                                <th>Qty</th>
                                <th>In Unit</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                          </table>
                        </div>
                        <!-- Card footer -->
                        
                     
  
                
              </div>
                <!-- end here -->

                <!-- start table list n-->
                <div class=" p-3" id="mtable" >
              
                  
                        <!-- Card header -->
                        
                        <!-- Light table -->
                        <div class="table-responsive p-4">
                          <table class="table align-items-center " id="medicineTable">
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
                        
                     
  
              
                <!-- end here -->
              </div>


             

                <!-- editing medincin -->
                  <div class="row p-3 d-none" id="Editing" >

                  <!-- general information -->
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 col-12 ">
                      <h6 class="heading-small text-muted mb-4">Old Medicine information</h6>

                      <div class="  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 mt-lg-4x mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                          <p class=" mb-0 ">Name:</p>
                                    <h5 class="medNameinfo heading-my ml-3 " style="transform: none;">May Ka Lar</h5>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 mt-lg-4x mt-md-3 mt-sm-3 mt-xs-3 mt-3">

                          <p class=" mb-0 d-flex ">Size:</p>
                                    <h5 class="medSize  heading-my ml-3 " style="transform: none;">May Ka Lar</h5>
                                </div>
                        </div>

                        <div class=" mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                          <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-4 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                            
                                      <p class="description mb-0 ">Type:</p>
                                      <h5 class="medType heading-my ml-3  " style="transform: none;">Sep 30th 1998</h5>
                          </div>
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-4 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                            <p class="description mb-0 ">Chemical</p>
                                    <h5 class="medChemical my-td heading-my ml-3" style="transform: none;">Sep 30th 1998aefaefafaeafefefaefaefaeffafaefae</h5>
                                  </div>
                        </div> 

                       

                      
                  </div>
                  <!-- user information -->
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12 ">
                    <h6 class="heading-small text-muted mb-4">Update Medicine
                      <!-- <span class="error error-medId"> </span>
                      <span class="success"> </span> -->
                        <form id="EditMedicineForm">
                          <div class="form-group mt-4">
                            <label for="ucname" class="sfont">Medicine Name</label>
                            <span class="UEname error d-block" ></span>
                            <input type="text" name="name" id="ucname" placeholder="enter medicine name" class="d-inline form-control "> 
                          </div>

                          <div class="form-group mt-4">
                            <label for="ucname" class="sfont">Medicine Size</label>
                            <span class="UEsize error d-block" ></span>
                            <input type="text" name="medsize" id="ucsize" placeholder="enter medicine name" class="d-inline form-control "> 
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
                            <button type="submit" class="btn btn-primary btn-md  float-right update">Update</button>
                          </div>
                        </form>
                    </h6>
                    
                    
                    
                  </div>

                  

                  
                  
                </div>
                <!-- ending -->
              </div>
            </div>
          </div>
      <!-- Footer -->

      <!-- table start  -->
      
      <!-- table end -->

       <!-- <div class="row" id="mtable">
        
      </div> -->
      
    </div>
	
@endsection
@section('script')


<script>
  $(document).ready(function(){
    $('.btn-create').click(function(){

      $(this).addClass('btn-success');
      $('.btn-list').removeClass('btn-success');
      $('.btn-monthly_list').removeClass('btn-success');

      $('#creating').removeClass('d-none');
      $('#searching').addClass('d-none');
      $('#mtable').addClass('d-none');
      $('#monthMdiv').addClass('d-none');

    })

    $('.btn-list').click(function(){
      $('.btn-create').removeClass('btn-success');
      $(this).addClass('btn-success');
      
      $('.btn-monthly_list').removeClass('btn-success');

      $('#creating').addClass('d-none');
      $('#searching').addClass('d-none');
      $('#mtable').removeClass('d-none');
      $('#monthMdiv').addClass('d-none');

    })









    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    // showing table start
    getMonthlyStock();
   getData();
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

                  { "data": "medicine.name" },

                  { "data": "medicine.medicinetype.name"
                  } ,

                  { "data": "medicine.chemical"
                  } ,

                  { "data":function(data){
                      return `<button class="btn btn-primary btn-sm d-inline-block btnEdit "  data-id="${data.medicine.id}" data-name="${data.medicine.name}"><i class="ni ni-settings"></i></button>
                                <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${data.id}"> <i class="ni ni-fat-delete"></i></button>`;
                    }
                   }
              ],
              "info":false
              
           });
      }
    // ===========================================================================
    //search input with jquery autocomplete
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
                                // label: item.name ,
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
            // $(this).trigger('reset');
            $('#searching').removeClass('d-none');
            $('#creating').addClass('d-none');
            $('#mtable').addClass('d-none');
            $('#monthMdiv').addClass('d-none');
             $('.medNameinfo').html(ui.item.data.name);
             $('.medName').html(ui.item.data.name);
            $('.medType').html(ui.item.data.medicinetype.name);
            $('.medChemical').html(ui.item.data.chemical);
            $('.medSize').html(ui.item.data.size);
            $('input[name="medId"]').val(ui.item.data.id);
            $('input[name="medicineId"]').val(ui.item.data.id);
            console.log(ui.item.label);
            $(this).val(''); return false;
             // $('#log').html( "Selected: " +ui.item.label + " aka " + ui.item.type);
          }
      })
     // ===========================================================================

     // calculating total tab

     $('#totalTab').click(function(){
        // alert('he');
        var phar=$('#qtyform input[name="phar"]').val();
        var bu=$('#qtyform input[name="bu"]').val();
        var card=$('#qtyform input[name="card"]').val();
        var tab=$('#qtyform input[name="tab"]').val();
        // console.log(phar,bu,card,tab);
        let total=0;

        if(tab ==''){
          // <span class="error-tab"></span>
          $('.error-tab').html('fill value at "tab" unit');
          $('.error-tab').addClass('text-danger');
        }else{
          $('.error-tab').html('');
          $('.error-tab').removeClass('text-danger');
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
        }
        
      })

     $('#totalTab2').click(function(){
        // alert('he');
        var phar=$(' input[name="cphar"]').val();
        var bu=$(' input[name="cbu"]').val();
        var card=$(' input[name="ccard"]').val();
        var tab=$(' input[name="ctab"]').val();
       // console.log(tab);
        let total=0;

        if(tab ==''){
          // <span class="error-tab"></span>
          $('.error-tab').html('fill value at "tab" unit');
          $('.error-tab').addClass('text-danger');
        }else{
          $('.error-tab').html('');
          $('.error-tab').removeClass('text-danger');
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
        }
        
      })
     // ===========================================================================
     // adding qty for eixting value
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
                    
                    // $('.medName').html('');
                    $('input[name="medId"]').val('');
                  
                     // $('.Ename').text('');
                    $('span.error').removeClass('text-danger');
                    $('.error').html('');
                    $('.success').removeClass('d-none');
                    $('.success').addClass('text-success');
                    $('.success').show();
                    $('.success').text('successfully added');
                    $('.success').fadeOut(3000);
                    $('#qtyform').trigger('reset');
                    // $('#AddMedicineForm input[name="name"]').val('');
                    // $( "#medicineType option:selected" ).val('');
                    // chemical=$('#AddMedicineForm input[name="chemical"]').val('');
                    // $('.nav-tabs li a[href="' + $('#nav-search').attr('href') + '"]').trigger('click');
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


      // ===========================================================================

      // creating new fromCharCode()
       $('#AddMedicineForm').submit(function(e){
              e.preventDefault();
              // alert('heo');
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
                  
                     // $('.Ename').text('');
                     $('.error').html('');
                    $('span.error').removeClass('text-danger');
                    // $('.Echemical').text('');
                    $('.success').removeClass('d-none');
                    $('.success').addClass('text-success');
                    $('.success').show();
                    $('.success').text('successfully added');
                    $('.success').fadeOut(3000);
                    $('#AddMedicineForm').trigger('reset');
                    // $('#medicineTable').DataTable().ajax().reload();
                    // $('#AddMedicineForm input[name="name"]').val('');
                    // $( "#medicineType option:selected" ).val('');
                    // chemical=$('#AddMedicineForm input[name="chemical"]').val('');
                    // $('.nav-tabs li a[href="' + $('#nav-two').attr('href') + '"]').trigger('click');
                   getData();
                      

                    
                  }
                  
                },
                error:function(error){
                  var message=error.responseJSON.message;
                  var errors=error.responseJSON.errors;
                  $('#AddMedicineForm').trigger('reset');
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
        // ===========================================================================
        // edit form start
         $('#medicineTable').on('click','.btnEdit',function(){
            $('#Editing').removeClass('d-none');
             $('#creating').addClass('d-none');
              $('#searching').addClass('d-none');
              $('#mtable').addClass('d-none');

            // $('#AddMedicine').hide();
            var id=$(this).data('id');
            alert(id);
            var url="{{route('medicine.edit',':id')}}";
            
            url=url.replace(':id',id);
            $.get(url,function(res){
              $('#Editing .medNameinfo').html(res.name);
              $('#Editing .medSize').html(res.size);
              $('#Editing .medType').html(res.medicinetype.name);
              $('#Editing .medChemical').html(res.chemical);
              $('#ucname').val(res.name);
              $('#ucsize').val(res.size);
              $( ".medtype-"+`${res.medicinetype_id}` ).attr('selected','selected');
              
              $('#uchemical').text(res.chemical);
              $('.medid').val(res.id);
             
            })


          })
        // edit form end
        // ===========================================================================
        // update formdat
        $('#EditMedicineForm').submit(function(e){
          e.preventDefault()
          let id=$('.medid').val();
          alert(id);
          let formdata=new FormData(this);
          formdata.append('_method','PATCH');
          let url="{{route('medicine.update',':id')}}";
          url=url.replace(':id',id);
          $.ajax({
            url:url,
            type:'post',
            data:formdata,
            // dataType:'json',
            cache:false,
            contentType: false,
            processData: false,
            success:function(res){
              // console.log('heloo world');
              if(res.success){
                $('.success').removeClass('d-none');
                      $('.success').show();
                      $('.success').text('successfully updated');
                      $('.success').fadeOut(3000);
                      // $('#ucname').val('');
                      //  $('#uchemical').text('');
                      $('#EditMedicineForm').trigger('reset');
                  $('.medid').val('');
                  $('#Editing').addClass('d-none');
                  $('#mtable').removeClass('d-none');
                  // $('#AddMedicine').show();
                
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

         // ===========================================================================

         // monthlystock starthere
         monthlystock();
         function monthlystock(){
           var date = new Date(), y = date.getFullYear(), m = date.getMonth();
          // console.log(isLastDay(y,m,date.getDate()));

          // if(isLastDay(2020,9,31)){

          if(isLastDay(y,m,date.getDate())){
            $.get('/monthlyStock',function(response){
              console.log(response);
            })
          }else{
            console.log('not yet');
          }

         }

         function isLastDay(y, m, d)
          {
              var d1 = (m < 11) ? new Date(y, m + 1, 0) : new Date(y, 0, 0);
              // console.log(d1);
              var d2 = new Date(y, m, d);
              // var d2 = new Date(2020, 9, 31);
              // console.log(d2);
              return (d1.getTime() === d2.getTime());
          }
          // ===========================================================================

          $('.btn-monthly_list').click(function(){
            // alert('heo');

            $('.btn-create').removeClass('btn-success');
      $('.btn-list').removeClass('btn-success');
      
      $(this).addClass('btn-success');


            $('#creating').addClass('d-none');
            $('#searching').addClass('d-none');
            $('#mtable').addClass('d-none');
            $('#monthMdiv').removeClass('d-none');
          })


           

          function getMonthlyStock(){
               $('#mmtable').DataTable({
                  "processing": true,
                  destroy:true,
                  "sort":true,
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
                  "ajax": "{{route('getm')}}",
                  "columns":[

                       {"data":'DT_RowIndex'},

                      { "data": "medicine" },

                      { "data": "type"
                      } ,

                      { "data": "chemical"
                      } ,
                      { "data": "phar"
                      } ,
                      { "data": "bu"
                      } ,
                      { "data": "card"
                      } ,
                      { "data": "tab"
                      } ,
                      { "data": "qty"
                      } ,
                      {
                        data:function(data){
                          let phar=data.phar;
                          let bu=data.bu;
                          let card=data.card;
                          let tab=data.tab;
                          let qty=data.qty;
                          let r=0;



                           if(phar==null){
                            phar=1;
                           }

                            if(bu==null){
                            bu=1;
                           }

                            if(card==null){
                            card=1;
                           }

                           //  if(phar!=null){
                           //  phar=0;
                           // }


                          let  tp=(phar * (bu*(tab*card)));

                          let  tb=(bu*(tab*card));

                          let  tc=(tab*card);

                          let  tt=tab;
                          let remain=0;

                            if(qty > tp){

                                phar=Math.floor(qty / tp);
                                remain= qty% tp;

                                if(remain > tb){

                                  bu=Math.floor(qty / tb);
                                  remain= qty% tb;

                                  if(remain > tc ){
                                     card=Math.floor(qty / tc);
                                      tab= qty% tc;
                                  }else{
                                      card=0;
                                      tab=remain;
                                  }

                                }else if(remain > tc){
                                  bu=0;
                                   card=Math.floor(qty / tc);
                                    tab= qty% tc;

                                }else{
                                  bu=0;card=0;
                                  tab=remain;

                                }

                                


                            }else if(qty > tb){
                              phar=0;
                               bu=Math.floor(qty / tb);
                                remain= qty% tb;

                                if(remain > tc ){
                                     card=Math.floor(qty / tc);
                                      tab= qty% tc;
                                  }else{
                                      card=0;
                                      tab=remain;
                                  }


                            }else if(qty > tc){
                              phar=0;
                              bu=0;
                              card=Math.floor(qty / tc);
                              tab= qty% tc;

                            }else{
                              phar=0;bu=0;card=0;
                               tab=qty;
                            }

                            // console.log(phar,bu,card,tab);

                            // return `${phar ?}:phar, ${bu}:bu, <br/>
                            //         ${card}:card, ${tab}:tab`;
                            var html='';

                             html+= (phar==0) ? '': phar+":phar,"; 
                             html+= (bu==0) ? '': bu+":bu,"; 
                             html+= (card==0) ? '': card+":card,"; 
                             html+= tab+':tab';

                             return html;

                          // }



                          
                        }
                      }

                     
                  ],
                  "info":false
                  
               });
          }


          // function phar(v1,v2){
          //   return Math.floor(v1/v2);
          // }

  })
</script>


@endsection