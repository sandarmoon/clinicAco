<?php $__env->startSection('style'); ?>
<style>
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
    top: 40px;
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


ul.dot-list li:hover .med{
  color: purple;
  transform: scale(1.01,1.0);
  box-shadow: 20px 50px 100px rgba(0, 0, 0, 0.5);
}

.myfont{
  font-family: 'Old Standard TT', serif;
}




</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php


?>




<div class="row mt-3 ">

      <div class="col-sm-10 offset-md-1 ">
        
        <div class="card h-100 bg-transparent border-0 ">
            <div class="card-body p-0">
                <div class="row">
                  <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0 px-0">
                    <div class="card card-profile shadow" style="border-radius: 0.375rem 0 0 0.375rem">
                     <!--  <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                          <div class="card-profile-image">
                            <a href="#">
                              <img src="<?php echo e(asset('template/assets/img/theme/team-4-800x800.jpg')); ?>" class="rounded-circle">
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                          <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                          <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                      </div> -->
                      <div class="card-body pt-0 pt-md-4">
                        <div class="text-center" style="margin-top: 1rem;">
                            <img style="max-width: 110px;" src="<?php echo e(asset('template/assets/img/theme/team-4-800x800.jpg')); ?>" class="rounded-circle">
                        </div>
                        <h2 class="text-center mt-5 mb-0"><?php echo e($patientinfo->patient->name); ?></h2>
                        <h4 class="text-center text-muted m-0"></h4>
                          <div class="row">
                            <div class="col">
                              <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                  <span class="heading"><?php echo e(count($treatments)); ?></span>
                                  <span class="description">Visit time</span>
                                </div>
                                <div>
                                  <span class="heading"><?php echo e(count($chargeDoctor)); ?></span>
                                  <span class="description">Charge Doctor</span>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-8  order-xl-2">
                    <div class="card h-100  shadow" style="border-radius: 0 0.375rem 0.375rem 0">
                      
                      <div class="card-body">
                        <div class="row">
                            <div class="col py-0 my-0">
                              <div class="card-profile-stats d-flex justify-content-around my-0 py-0">
                                <div class="p-0">
                                  <span class="description ">Gender</span>
                                  <span class="heading "><?php echo e($patientinfo->patient->gender); ?></span>
                                </div>

                                <div class="p-0">
                                  <span class="description ">Age</span>
                                  <span class="heading "><?php echo e($patientinfo->patient->age); ?></span>
                                </div>

                                <div class="p-0">
                                  <span class="description ">Family Member</span>
                                  <span class="heading "><?php echo e($patientinfo->patient->fatherName); ?></span>
                                </div>
                                
                                
                              </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid rgb(206 210 215 / 68%);">
                        <div class="row">
                            <div class="col py-0 my-0">
                              <div class="card-profile-stats d-flex justify-content-around my-0 py-0">
                                <div class="p-0">
                                  <span class="description"> Address</span>
                                  <span class="heading my-td"><?php echo e($patientinfo->patient->address); ?></span>
                                </div>

                                <div class="p-0">
                                  <span class="description">Phone</span>
                                  <span class="heading"><?php echo e($patientinfo->patient->phoneno); ?></span>
                                </div>

                                <div class="p-0">
                                  <span class="description">Registered Date</span>
                                  <span class="heading"><?php echo e(Carbon\Carbon::parse($patientinfo->patient->created_at)->toFormattedDateString()); ?></span>
                                </div>
                                
                                
                              </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid rgb(206 210 215 / 68%);">
                        <div class="row">
                            <div class="col pb-0 mb-0">
                              <div class="card-profile-stats d-flex justify-content-left my-0 py-0">
                                <div class="pr-5 ml-4 py-0">
                                  <span class="description">Job Description</span>
                                  <span class="heading"><?php echo e($patientinfo->patient->job); ?></span>
                                </div>

                                <div class="p-0">
                                  <span class="description"></span>
                                  <span class="heading"></span>
                                </div>

                                <div class="p-0">
                                  <span class="description"></span>
                                  <span class="heading"></span>
                                </div>
                                
                                
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        
      </div>
       <!--  <div class="col-sm-3 " >
            <div class="card h-100 card-body">
                
            </div>
        </div> -->
</div>

<div class="row mt-3 ">

      <div class="col-sm-10 offset-md-1 pl-0 ">
        
        <div class="card h-100   ">
            <div class="card-body">
                <div class="nav-wrapper bg-secondary p-2 shadow">
                  <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                      
                      <li class="nav-item col-3">
                          <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-collection mr-2"></i>Medical Records</a>
                      </li>
                      <!-- <li class="nav-item">
                          <a class="nav-link mb-sm-3 mb-md-0 " id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Medicine Record</a>
                      </li> -->
                      <!-- <li class="nav-item">
                          <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Examination</a>
                      </li> -->
                  </ul>
                </div>
                <div class="card border-0">
                  <div class="card-body pb-0 bg-secondary">
                      <div class="tab-content " id="myTabContent">
                          <div class="tab-pane fade show " id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                              <div class="table-responsive">
                                 <div>
                                    <table class="table align-items-center">
                                       <thead class="thead-light">
                                          <tr>
                                             <th scope="col" class="sort" data-sort="name">Name</th>
                                             <th scope="col" class="sort" data-sort="budget">Budget</th>
                                             <th scope="col" class="sort" data-sort="status">Status</th>
                                             <th scope="col">Users</th>
                                             <th scope="col" class="sort" data-sort="completion">Completion</th>
                                             <th scope="col"></th>
                                          </tr>
                                       </thead>
                                       <tbody class="list">
                                          <tr>
                                             <th scope="row">
                                                <div class="media align-items-center">
                                                   <a href="#" class="avatar rounded-circle mr-3">
                                                   <img alt="Image placeholder" src="../../assets/img/theme/bootstrap.jpg">
                                                   </a>
                                                   <div class="media-body">
                                                      <span class="name mb-0 text-sm">Argon Design System</span>
                                                   </div>
                                                </div>
                                             </th>
                                             <td class="budget">
                                                $2500 USD
                                             </td>
                                             <td>
                                                <span class="badge badge-dot mr-4">
                                                <i class="bg-warning"></i>
                                                <span class="status">pending</span>
                                                </span>
                                             </td>
                                             <td>
                                                <div class="avatar-group">
                                                   <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                   <img alt="Image placeholder" src="../../assets/img/theme/team-1.jpg">
                                                   </a>
                                                   <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                   <img alt="Image placeholder" src="../../assets/img/theme/team-2.jpg">
                                                   </a>
                                                   <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                   <img alt="Image placeholder" src="../../assets/img/theme/team-3.jpg">
                                                   </a>
                                                   <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                   <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg">
                                                   </a>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="d-flex align-items-center">
                                                   <span class="completion mr-2">60%</span>
                                                   <div>
                                                      <div class="progress">
                                                         <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </td>
                                             <td class="text-right">
                                                <div class="dropdown">
                                                   <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <i class="fas fa-ellipsis-v"></i>
                                                   </a>
                                                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                      <a class="dropdown-item" href="#">Action</a>
                                                      <a class="dropdown-item" href="#">Another action</a>
                                                      <a class="dropdown-item" href="#">Something else here</a>
                                                   </div>
                                                </div>
                                             </td>
                                          </tr>
                                          
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                          </div>
                          <div class="tab-pane active " id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                              <div class="col-md-12">
                                  <ul class="dot-list ">
                                    <?php $__currentLoopData = $uniquedoctorT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li data-doctorid="<?php echo e($record->doctor_id); ?>" data-patientid="<?php echo e($record->patient_id); ?>"><div class="bullet big"></div>
                                      <div class="med card col-sm-12 shadow" style="border-radius: 0px;">
                                        <div class="card-body pt-4">
                                          <div class="row">
                                              <div class="col-md-6 px-0">
                                                <div class="d-flex justify-content-lg-around">
                                                    <div>
                                                      <h2 class="mt-2 myfont" >
                                                        <?php 
                                                        $record_date1=date_create($record->created_at);
                                                        $record_date=date_format($record_date1,'d M y');
                                                        $record_time=date_format($record_date1,'h:s:i');
                                                        ?>
                                                        <?php echo e($record_date); ?>

                                                      </h2>
                                                      <span class="text-muted" ><?php echo e($record_time); ?></span >
                                                    </div>
                                                    <span class="vl" 
                                                  style="display:inline-block;border-left: 1px solid #ccc; margin: 25px 0px; height: 30px;"></span>
                                                    <div class="mt-2"><p class="pb-0 mb-0 myfont">Doctor</p><p><?php echo e($record->doctor->user->name); ?></p></div>
                                                  <span class="vl" 
                                                  style="display:inline-block;border-left: 1px solid #ccc; margin: 25px 0px; height: 30px;"></span>  
                                                </div>
                                              </div>
                                              
                                              <div class="col-md-6">
                                                <div class="d-flex justify-content-lg-around">
                                                    <div class="mt-2"><p class="pb-0 mb-0 ">GC-Level</p><p><?php echo e($record->gc_level== null ? 'no record':$record->gc_level); ?></p></div>
                                                    <div class="mt-2"><p class="pb-0 mb-0 ">Weight</p><p><?php echo e($record->body_weight== null ? 'no record':$record->body_weight); ?></p></div>
                                                    <div class="mt-2"><p class="pb-0 mb-0 ">Temperature</p><p><?php echo e($record->temperature== null ? 'no record':$record->temperature); ?></p></div>
                                                    
                                                </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>

                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                   

                                    
                                   

                                    
                                   
                                    
                                  </ul>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                              <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        
      </div>
        <!-- <div class="col-sm-3 " >
            <div class="card h-100 card-body">
                Card. I'm just a simple card-block, but I have a little more text!
            </div>
        </div> -->
</div>


    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
 $(document).ready(function(){
  $('.dot-list li').click(function(){
    var did=$(this).data('doctorid');
    var pid=$(this).data('patientid');
      location.href="<?php echo e(URL('patientRecordD')); ?>"+"/"+did+"/"+pid;
  })
 })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/patients/healthRecordHome.blade.php ENDPATH**/ ?>