@extends('frontendTemplate')
@section('style')
<style >

  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

/*card start here*/
 .card-profile-stats>div .heading {
    font-size: 0.8rem;
    font-weight: normal;
    display: block;
}

.dot-list {
  list-style-type: none;
  height: 300px;
  width: 100%;
  overflow: hidden;
  overflow-y: scroll;
  padding-left: 2px;
}

.dot-list li {

  /* You need to turn on relative positioning so the line is placed relative to the item rather than absolutely on the page */
  position: relative;
  
  /* Use padding to space things out rather than margins as the line would get broken up otherwise */
  margin: 0;
  padding-bottom: 1em;
  padding-left: 20px;
}

.dot-list li:before {
  background-color: #5e72e4;
  width: 3px;
  content: '';
  position: absolute;
  top: 0px;
  bottom: 0px;
  left: 5px;
}

ul.dot-list li:after {
    /* bullets */
    content: url('http://upload.wikimedia.org/wikipedia/commons/thumb/3/30/RedDisc.svg/30px-RedDisc.svg.png');
    position: absolute;
    left: -10px; /*adjust manually*/
    top: 29px;
}


.bullet { margin-left: -20px; width: 12px; fill: #c00; float: left; padding-right: 10px }
.bullet.big { width: 16px; margin-left: -18px; padding-right: 8px }


}

span.vl {
        display: inline-block;
        border-left: 1px solid #ccc;
        margin: 0 10px;
        height: 125px;
}


ul.dot-list li:hover .my-card{
  opacity: 0.9;
  transition: 1s;
  transform: translate(-2px,8px);

}

ul.dot-list li .my-card2 {
  opacity: 0.9;
  transition: 1s;
  transform: translate(-2px,8px);

}

.my-card2{
 background: rgb(85,85,85);
background: linear-gradient(90deg, rgba(85,85,85,1) 22%, rgba(119,119,119,1) 55%);
    /*background: rgb(251,99,64);*/
  /*background: -webkit-linear-gradient(rgba(251,99,64,1), rgba(251,177,64,1))!important; */
  /*background: -o-linear-gradient(rgba(251,99,64,1), rgba(251,177,64,1))!important; */
  /*background: -moz-linear-gradient(rgba(251,99,64,1), rgba(251,177,64,1))!important; */
  /*background: linear-gradient(#749d9e, #b3a68b)!important;*/
 /*background: linear-gradient(87deg, #fb6340 0, #fbb140 100%) !important;*/
   
/*jjbackground: linear-gradient(90deg, rgba(251,99,64,1) 40%, rgba(251,177,64,1) 75%)!important;*/
    /* background-image: radial-gradient(circle, #D53E9F, #7ea196, #8da48e, #a0a68a, #b3a68b);*/
}

/*.my-card2{
  background: rgb(245,54,92);
   
  background: -webkit-linear-gradient(rgb(245,54,92), rgba(245,96,54,0.5844712885154062))!important; 
  background: -o-linear-gradient(rgb(245,54,92), rgba(245,96,54,0.5844712885154062))!important; 
  background: -moz-linear-gradient(rgb(245,54,92), rgba(245,96,54,0.5844712885154062))!important; 
  
   background: radial-gradient(circle, rgba(245,54,92,0.6516981792717087) 22%, rgba(245,96,54,0.5844712885154062) 75%);


}*/

.my-card2 span{
  color: #fff;
    letter-spacing: 0.1rem;
}


.myfont,.my-card span{
  font-family: 'Old Standard TT', serif;
}

.my-card{
  background:#749d9e; 
  background: -webkit-linear-gradient(#749d9e, #b3a68b)!important; 
  background: -o-linear-gradient(#749d9e, #b3a68b)!important; 
  background: -moz-linear-gradient(#749d9e, #b3a68b)!important; 
  /*background: linear-gradient(#749d9e, #b3a68b)!important;*/
 /*background: linear-gradient(87deg, #fb6340 0, #fbb140 100%) !important;*/
     background: linear-gradient(87deg, #f5365c 0, #f56036 100%) !important;
}

.my-card span{
  color: #fff;
    letter-spacing: 0.1rem;
}

.form-group > .select2-container {
    width: 100% !important;
}

</style>
@endsection
@section('content')
  <div class="row d-flex">
        <div class="col-xl-4 order-xl-2   mb-5 mb-xl-0 d-xl-block d-lg-none d-md-none d-sm-none d-xs-none d-none">
          <div class="card   p-3 card-profile shadow">
            <h3>Schedule of Doctors</h3>
            

            <div class="mt-3">
              <ul class="dot-list doctor-list ">
                <li  class="active" data-did="0"><div class="bullet big"></div>
                  <div id="did-0" class="card p-3 my-card2">
                    
                     <span style="letter-spacing: 0.1rem">ALL List</span> 
                     <!-- <span class="small" style="letter-spacing: 0.1rem"><i class="fas fa-clock"></i>19:00am-1:00pm</span> --> 
                    
                  </div>

                </li>
                                    
               @foreach($doctors as $doctor) 
                <li class="" data-did="{{$doctor->id}}"><div class="bullet big"></div>
                  <div id="did-{{$doctor->id}}" class="card p-3 my-card">
                    
                     <span style="letter-spacing: 0.1rem">{{$doctor->user->name}}</span> 
                     <span class="small" style="letter-spacing: 0.1rem"><i class="fas fa-clock"></i>19:00am-1:00pm</span> 
                    
                  </div>

                </li>

              @endforeach
                
              </ul>
            </div>
          </div>

          
        </div>

        <!-- for small size to show doctor in dropdown list -->
       <div class="col-sm-12  d-xl-none d-lg-block d-md-block d-sm-block d-xs-block d-block">
           <div class="form-group">
              <label for="exampleFormControlSelect1" class="text-light">Example select</label>
              <select class="form-control" id="selectdoctor">
                <option value="0" >All</option>
                @foreach($doctors as $doctor)
                <option value="{{$doctor->id}}">{{$doctor->user->name}}</option>
                @endforeach
              </select>
            </div>
       </div>







        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-secondary  border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Today Appointment</h3>
                </div>
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div> -->
              </div>
            </div>
            <div class="card-body bg-white ">
                <div class="table-responsive ">
                    <table class="table align-items-center table-white table-flush"  id="todayAppointmentTable">
                      <thead class="thead-light">
                        <tr>
                          <th>Doctor</th>
                          <th>Token</th>
                          <th>Patient</th>
                         <th>Status</th>
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
      </div>

      
@endsection
@section('script')
<script>
  $(document).ready(function(){

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    //   setInterval(function(){$.get('/todayBoodking',function(res){
    //   showData(res.data);
    // }) }, 5000);

    $.get('/todayBoodking/0',function(res){
      showData(res.data);
    });
   
    function showData(data){
      $('#todayAppointmentTable').DataTable({
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
        data:data,
        columns:[
        {data:'doctor.user.name'},
        {data:'TokenNo'},
        {data:'treatment.patient.name'},
        {data:'status',
          render:function(data){
            let text='';
            if(data==1){
              text="waiting";
            }else{
              text="delay";
            }

            return text;
           }

        },
        {data:function(data){
          let html= `

                  <label class="switch">
                    <input type="checkbox" class="switcher"`
                    if(data.status==1){
                      html+=`checked data-on="1"`
                    }else{
                      html+=` data-on="0"`
                    }
                    html+=`  value="${data.id}" >
                    <span class="slider round"></span>
                  </label>`
                  return html;
        }}

        ]
      })
    }

    $('#todayAppointmentTable').on('change','.switcher',function(){
     let aid=$(this).val();
     let did=$( "#selectdoctor option:selected" ).val();
     // alert(aid);
      let on=$(this).attr('data-on');let value=0;
      if(on==1){
        $(this).attr('data-on',0);
        value=3;


      }else{
        $(this).attr('data-on',1);
        value=1;
      }

      $.get(`/toggleDelay/${aid}/${value}`,function(res){
        if(res.success){
               $.get(`/todayBoodking/${did}`,function(res){
            showData(res.data);
          })
        }
      })
    })

// for mobile view
    $('#selectdoctor').change(function(){
      let id=$(this).val();
      let sid= $('ul.doctor-list').find('li.active').data('did');
   // let id=$('ul li.active').attr('data-did');
 // console.log(id);

 $('ul.doctor-list').find('li.active').removeClass('active');
 $(`#did-${sid}`).removeClass('my-card2');
 $(`#did-${sid}`).addClass('my-card');
   $(`data-${id}`).addClass('active');
      
      $(`#did-${id}`).addClass('my-card2');
      $(`#did-${id}`).removeClass('my-card');
        $.get(`/todayBoodking/${id}`,function(res){
        showData(res.data);
      });
    })

//for laptop view
$('ul.doctor-list').on('click','li',function(){
  let did=$(this).attr('data-did');
 let id= $('ul.doctor-list').find('li.active').data('did');
  // let id=$('ul li.active').attr('data-did');
 // console.log(id);
 $('ul.doctor-list').find('li.active').removeClass('active');
 $(`#did-${id}`).removeClass('my-card2');
 $(`#did-${id}`).addClass('my-card');
 
      $(this).addClass('active');
      let idd= $('ul.doctor-list').find('li.active').data('did');
      $(`#did-${idd}`).addClass('my-card2');
      $(`#did-${idd}`).removeClass('my-card');

      console.log(did);

      $(`#selectdoctor option[value="${did}"]`).prop('selected', true);

      $.get(`/todayBoodking/${did}`,function(res){
      showData(res.data);
    });

    
})

  })
</script>

@endsection