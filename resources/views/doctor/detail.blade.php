 @extends('frontendTemplate')
@section('content')
<div class="row">
        
      <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    
                     
                  <img src="{{asset($doctor->avatar)}}" width="60" class="rounded-circle float-left d-inline-block mr-4 mt-3">
                      
                    <h3 class=" p-0 pr-4 mt-3 ">{{$doctor->user->name}}</h3>
                     <h6 class="small text-muted mb-4">Position:  {{$doctor->user->roles[0]->name}}</h6>
                  </div>
                  @role('Admin|Doctor')
                  <div class="col-4 text-right">
                    <a href="{{route('doctor.edit',$doctor->id)}}" class="btn btn-sm btn-primary">Edit Profile</a>
                  </div>
                  @endrole
                </div>
              </div>
              <div class="card-body">
                <div class="row" >

                  <div class="col-xl-7 col-lg-7 col-md-6 col-sm-6 col-xs-6 col-6 ">
                    <h6 class="heading-small text-muted mb-4">Account information</h6>

                    <div class="row  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Email:</p>
                                  <h5 class="heading-my ml-3 " style="transform: none;">{{$doctor->user->email}}</h5>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Password:</p>
                                <h5 class="heading-my ml-3 " style="transform: none;">*********</h5>
                              </div>
                    </div>
                    <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                      <div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Name:</p>
                                  <h5 class="heading-my ml-3 " style="transform: none;">{{$doctor->user->name}}</h5>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">NRC NO:</p>
                                  <h5 class="heading-my ml-3 " style="transform: none;">{{$doctor->nrc}}</h5>
                              </div>
                    </div>
                    <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                      <div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        
                                  <p class="description mb-0 ">Birthday:</p>
                                  <h5 class="heading-my ml-3 my-td " style="transform: none;">
                                    @php
                                  $date=date_create($doctor->dob);
                            $date= date_format($date,"Y M dS ");
                                   @endphp
                                  {{$date}}</h5>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Register Date:</p>
                                <h5 class="heading-my ml-3 my-td " style="transform: none;">
                                  @php
                                  $date=date_create($doctor->created_at);
                                  $date= date_format($date,"Y M dS ");
                                   @endphp
                                  {{$date}}
                                </h5>
                              </div>
                    </div> 

                    <!-- contact information -->
                    <h6 class="heading-small text-muted mb-4 mt-3">Contact  information</h6>
                    <!-- <div class="row  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Name:</p>
                                  <h5 class="heading-my ml-3 " style="transform: none;">May Ka Lar</h5>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">

                        <p class="description mb-0 d-flex ">Logo:<img src="{{asset('template/assets/img/theme/team-4-800x800.jpg')}}" width="40" class="rounded-circle  d-inline-block ml-3"></p>
                                  
                              </div>
                    </div> -->
                    <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                      <div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Phone:</p>
                                  <h5 class="heading-my ml-3 " style="transform: none;">{{$doctor->phone}}</h5>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Address:</p>
                                  <h5 class="heading-my ml-3 " style="transform: none;">{{$doctor->address==null? "not added!":$doctor->address}}</h5>
                              </div>
                    </div>
                    <!-- <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                      <div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        
                                  <p class="description mb-0 ">Opening:</p>
                                  <h5 class="heading-my ml-3 my-td " style="transform: none;">Sep 30th 1998</h5>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Register Date:</p>
                                <h5 class="heading-my ml-3 my-td " style="transform: none;">Sep 30th 1998</h5>
                              </div>
                    </div> -->
                  </div>



                  <!-- user information -->
                  <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-xs-6 col-6 ">

                    <h6 class="heading-small text-muted mb-4">Education</h6>
                     
                    <div class="row  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >


                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Degree:</p>
                                <h5 class="heading-my ml-3 " style="transform: none;">{{$doctor->degree}}</h5>
                    </div>



                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        
                        <div id="preview-certificate"  data-img={{$doctor->certificate}}><span class="description">Certificate:</span>
                        @if(!empty($doctor->certificate))
                          
                          <?php $array=json_decode($doctor->certificate,true);
                            foreach($array as $k=>$a):?>
                            <img src="{{asset($a)}}" class="showimg"  data-id="{{$k}}" data-img="{{$doctor->certificate}}" width="40" height="40">
                          
                          <?php endforeach; ?>
                         
                          @endif



                       </div>
                                  <!-- <h5 class="heading-my ml-3 " style="transform: none;">marybrown@gmail.com</h5> -->
                      </div>
                      <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Password:</p>
                                <h5 class="heading-my ml-3 " style="transform: none;">*********</h5>
                              </div> -->
                    </div>
                    <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                      <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        
                        <div id="preview-license" class="mt-4" data-img={{$doctor->license}}><span class="description">License:</span>
                        @if(!empty($doctor->license))
                          
                          <?php $array=json_decode($doctor->license,true);
                            foreach($array as $k=>$a):?>
                            <img src="{{asset($a)}}" class="showimg" data-id="{{$k}}"   width="40" height="40">
                          
                          <?php endforeach; ?>
                         
                          @endif
                        </div>
                                  <!-- <h5 class="heading-my ml-3 " style="transform: none;">Mary Brown</h5> -->
                      </div>
                      <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">NRC NO:</p>
                                  <h5 class="heading-my ml-3 " style="transform: none;">9/AHMAZA(N)0987665</h5>
                              </div> -->
                    </div>
                    <div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
                      <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        
                                  <p class="description mb-0 ">Experience:</p>
                                  <p class="heading-my ml-3  " style="transform: none;">
                                    ${{$doctor->experience}}
                                  </p>
                      </div>
                      <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
                        <p class="description mb-0 ">Register Date:</p>
                                <h5 class="heading-my ml-3 my-td " style="transform: none;">Sep 30th 1998</h5>
                              </div> -->
                    </div>
                  </div>

                  
                  
                </div>
              </div>
            </div>
          </div>

      </div>
<!-- model show -->
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

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content preimages">
         
          
        </div>
      </div>
    </div>
@endsection
@section('script')

<script type="text/javascript">
  $('document').ready(function(){
    

     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    
            

     $('#preview-certificate').on('click','.showimg',function(){
        var list=$('#preview-certificate').data('img');
       
      showCarousel(list,'Certificate');

     })

     $('#preview-license').on('click','.showimg',function(){
        var list=$('#preview-license').data('img');
        showCarousel(list,"License");
     })

     function showCarousel(list,text){
          var html=''; var isfrist=true;
          $.each(list,function(i,v){

            var carou=`<div class="`
            if(isfrist){
              carou+=`active `;
            }

            carou+=`carousel-item">

          <img src="{{asset(':v')}}" class="d-block w-100" height = '500' alt="...">
        </div>`;
            carou=carou.replace(':v',v);
            html+=carou;
            isfrist=false;
          })
          $('.caption').html(text);
          $('.bigpreview').html(html);
          $('#showphoto').modal('show');
     }
  })
</script>
@endsection