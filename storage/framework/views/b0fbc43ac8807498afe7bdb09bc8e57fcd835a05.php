<?php $__env->startSection('content'); ?>

<div class="row card">
   <div class="col-12" style="margin-top: 0px;">
    <nav class="mx-5 my-3">
      <div class="nav nav-tabs "  id="nav-tab" role="tablist">
        <a class="nav-item nav-link text-info active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ptient History</a>
        <a class="nav-item nav-link text-info" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Treatment</a>

      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show mx-3 active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row mx-5 my-4">
          <div class="col-12"> 

            <div class="accordion" id="accordionExample">
              <div class="card bg-secondary shadow">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Patient Info
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                 <div class="card-body">
                    <form>
                      <!-- <h6 class="heading-small text-muted mb-4">General information</h6> -->
                      <div class="pl-lg-4">
                        <div class=" align-items-center">
                        <div class="flex">
                           <img src="<?php echo e(asset('template/assets/img/patient.png')); ?>" width="60" class="rounded-circle float-left d-inline-block mr-4 mt-3 ">  
                           <div>
                             <h4 class=" p-0 pr-4 mt-3 d-inline-block ">Name: <?php echo e($patient->name); ?></h4>
                             <h6 class="small text-muted  mb-4">PRN No: <?php echo e($patient->PRN); ?> </h6>
                           </div>
                           
                        </div>
                        
                      </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">job </label>
                              <input type="text" id="input-first-name" disabled="disabled" class=" text-dark form-control form-control-alternative"  value="<?php echo e($patient->job); ?>">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Age </label>
                              <input type="text" id="input-first-name" disabled="disabled" class=" text-dark form-control form-control-alternative"  value='<?php echo e($patient->age); ?><?php 
                                                if($patient->child==0){
                                                echo " year";
                                                }else{
                                                echo " month";
                                                }
                                                ?>'>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Martial</label>
                              <input type="text" id="input-last-name" disabled="disabled" class=" text-dark form-control form-control-alternative"  value='<?php 
                                                if($patient->married_status==0){
                                                echo " Yes";
                                                }else{
                                                echo " No";
                                                }
                                                ?>'>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4" />
                      <!-- Address -->
                      <a href="#health-div" data-toggle="collapse"><h6 class="heading-small text-primary mb-4">Health information</h6></a>
                      <div id="health-div"  class="collapse pl-lg-4">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-city">Pregnant Status</label>
                              <input type="text" disabled="disabled" id="input-city" class="text-dark form-control form-control-alternative"  value='<?php 
                                          if($patient->pregnant==0){
                                          echo " Yes";
                                        }else{
                                        echo " No";
                                      }
                                    ?>'>
                            </div>
                          </div>   
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-address">Known Drug Allergy  </label>
                              <textarea disabled="disabled" rows="4" class="text-dark form-control form-control-alternative" ><?php echo e($patient->allergy); ?></textarea>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <hr class="my-4" />
                      <!-- Address -->
                      <a href="#contact-div" data-toggle="collapse"><h6 class="heading-small text-primary mb-4">Contact information</h6></a>
                      <div id="contact-div" class="collapse pl-lg-4">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-city">Phone</label>
                              <input type="text" disabled="disabled" id="input-city" class="text-dark form-control form-control-alternative"  value="<?php echo e($patient->phoneno); ?>">
                            </div>
                          </div>   
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-address">Address</label>
                              <textarea disabled="disabled" rows="4" class="text-dark form-control form-control-alternative" ><?php echo e($patient->address); ?></textarea>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <hr class="my-4" />
                      <!-- Description -->
                       <a href="#test-div" data-toggle="collapse"><h6 class="heading-small text-primary mb-4">Test Result</h6></a>
                      <div id="test-div"  class="collapse pl-lg-4">
                        <div class="form-group">
                          <?php $__currentLoopData = json_decode($patient->file); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <a target="_blank" href="<?php echo e(asset($photo)); ?>">
                            <img src="<?php echo e(asset($photo)); ?>" width="100px" height="100px">
                          </a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </div>
                    </form>
                  </div>
            </div>
          </div>

          <?php $i=1; ?>
          <?php $__currentLoopData = $treatments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treatment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card my-3">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($i); ?>" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo e($treatment->created_at); ?>

                </button>
              </h2>
            </div>

            <div id="collapse<?php echo e($i); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
               <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <p class="card-text"><strong>Complaint:  </strong><?php echo e($treatment->complaint); ?> </p>
                  <p class="card-text"><strong>SPO2:</strong><?php echo e($treatment->spo2); ?> </p>
                  <p class="card-text"><strong>PR:  </strong><?php echo e($treatment->pr); ?> </p>
                  <p class="card-text"><strong>Temperature:</strong><?php echo e($treatment->temperature); ?> </p>
                  <p class="card-text"><strong>Blood pressure:</strong><?php echo e($treatment->bp); ?> </p>
                  <p class="card-text"><strong>RB2:</strong><?php echo e($treatment->rbs); ?> </p>
                  <p class="card-text"><strong>Diagnosis:</strong><?php echo e($treatment->diagnosis); ?> </p>
                  <p class="card-text"><strong>Body Weight:</strong><?php echo e($treatment->body_weight); ?> </p>
                  <p class="card-text"><strong>Next Visit Date:</strong><?php echo e($treatment->next_visit_date); ?> </p>
                  <p class="card-text"><strong>relevant_info:</strong><?php echo e($treatment->relevant_info); ?> </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="row my-5">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Treatment and Drug</h3>
                        <table class="table text-center table-bordered table-dark">
                          <thead class="">
                            <th>drug name</th>
                            <th>tab</th>
                            <th>Interval</th>
                            <th>Meal</th>
                            <th>Duration</th>
                          </thead>
                          <tbody>
                            <?php
                            $alltreaments=$treatment->medicines;

                            
                            ?>
                            <!-- <?php echo e($alltreaments); ?> -->
                            <?php $__currentLoopData = $alltreaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $alldrugs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($alldrugs->pivot->type==null): ?>
                            <tr>
                              <td><?php echo e($alldrugs->name); ?></td>
                              <td><?php echo e($alldrugs->pivot->tab); ?></td>
                              <td><?php echo e($alldrugs->pivot->interval); ?></td>
                              <td><?php echo e($alldrugs->pivot->meal); ?></td>
                              <td><?php echo e($alldrugs->pivot->during); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Injection/Prodecure</h3>
                        <table class="table text-center table-bordered table-dark w-50">
                          <thead class="">
                            <th>injection</th>
                            <th>injection type</th>
                          </thead>
                          <tbody>
                            <?php
                            $alltreaments=$treatment->medicines;
                            ?>
                            <!-- <?php echo e($alltreaments); ?> -->
                            <?php $__currentLoopData = $alltreaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $allinjections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($allinjections->pivot->type): ?>
                            <tr>
                              <td><?php echo e($allinjections->name); ?></td>
                              <td><?php echo e($allinjections->pivot->type); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>


  </div>
  
</div>




<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   <div class="card">
      <div class="card-header">

         <h4 class="text-primary"> Comments and Instructions of Doctor:</h4>
      </div>
      <div class="card-body bg-secondary">
         <div class="mx-2">
            <form method="post" action="" enctype="multipart/form-data" id="myeditform">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="exampleFormControlFile1">Patient Files:</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file[]" multiple>
                     </div>
                  </div>
               </div>
               <input type="hidden" name="treatment-id" value="<?php echo e($todayTreatment->id); ?>" class="treatment-id">

               <input type="hidden" name="used_Drug_list" value="<?php echo e(json_encode($finalUsedDrugList)); ?>" class="">

               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>GC Level</label>
                     <input type="text" name="gc" value="<?php echo e($todayTreatment->gc_level); ?>" class="form-control">
                     <span class="Egc error d-block" ></span>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Temperature</label>
                     <input type="text" name="temperature" value="<?php echo e($todayTreatment->temperature); ?>" class="form-control">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Body Weight</label>
                     <input type="text" name="bodyWeight" value="<?php echo e($todayTreatment->body_weight); ?>" class="form-control" value="">
                  </div>
                  <div class="form-group col-md-6">
                     <label>SPO2</label>
                     <input type="text" name="spo2" value="<?php echo e($todayTreatment->spo2); ?>"  class="form-control">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>PR</label>
                     <input type="text" name="pr" value="<?php echo e($todayTreatment->pr); ?>" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                     <label>BP</label>
                     <input type="text" name="bp" value="<?php echo e($todayTreatment->bp); ?>" class="form-control">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>RBS</label>
                     <input type="text" name="rbs" value="<?php echo e($todayTreatment->rbs); ?>" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Underlying Diseases with receiving treatment</label>
                     <input type="text" name="ud" value="<?php echo e($todayTreatment->ud); ?>" class="form-control">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Complaint and History</label>
                     <textarea class="form-control"  name="complaint"> <?php echo e($todayTreatment->complaint); ?>

                     </textarea>
                     <span class="Ecomplaint error d-block" ></span>
                  </div>
                  <div class="form-group col-md-6">
                     <label>On Examination</label>
                     <textarea class="form-control"  name="onexam">
                       <?php echo e($todayTreatment->examination); ?>

                     </textarea>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Relevant Info</label>
                     <textarea name="relevantinfo" class="form-control">
                       <?php echo e($todayTreatment->relevant_info); ?>

                     </textarea>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Diagnosis</label>
                     <input type="text" name="diagnosis" value="<?php echo e($todayTreatment->diagnosis); ?>" class="form-control">
                     <span class="Edia error d-block" ></span>
                  </div>
               </div>
               <div class="form-group">
                  <p>
                     <a class="btn btn-secondary btn-drug"  role="button" >
                     <label>Treatments / Drugs</label>
                     </a>
                     <a class="btn btn-secondary btn-injection" drole="button" >
                     <label>Injection / Procedure</label>
                     </a>
                     <a class="btn btn-secondary btn-recommending mt-xl-0 mt-lg-0 mt-md-2 mt-sm-2 mt-sx-2 mt-2"  role="button" >
                     <label class="text-danger">Making  Referral</label>
                     </a>
                  </p>
                  <!-- recommending start -->
                  <div class="collapse multi-collapse" id="recommending">
                     <div  class="card p-3">
                        <div class="form-group">
                           <label for="exampleFormControlTextarea1">Please Write Reason</label>
                           <textarea class="form-control" id="exampleFormControlTextarea1" name="reason" rows="3">
                             <?php if(!empty($todayTreatment->doctor->referredBy[0]->reason)): ?>
                             <?php echo e(trim($todayTreatment->doctor->referredBy[0]->reason)); ?>

                             <?php endif; ?>
                           </textarea>
                        </div>
                     </div>
                  </div>
                  <!-- recommending end -->
                  <div class="collapse" id="drug">
                     <div class="card card-body">
                        <div class="row tfd">
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 pr-0">
                                    <div class="form-group">
                                       <select name="drug"  class="form-control form-control-sm js-example-basic-single drugselect" style="width: 100%;">
                                          <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($drug->id); ?>"><?php echo e($drug->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                       <!-- <input type="text" name="drug" id="drug" class="form-control form-control-sm"> -->
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 pr-0">
                                    <div class="form-group">
                                       <input type="text" name="tab" id="tab" class="form-control form-control-sm" placeholder="Tab..">
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-3 pr-0">
                                    <div class="form-group">
                                       <select name="time" id="time" class="form-control form-control-sm">
                                          <option value="">Select interval:</option>
                                          <option>od</option>
                                          <option>bd</option>
                                          <option>tds</option>
                                          <option>qid</option>
                                          <option>hs</option>
                                          <option>cm</option>
                                          <option>prn</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-3 pr-0">
                                    <div class="form-group">
                                       <select name="bf" id="bf" class="form-control form-control-sm">
                                          <option value="">Select Meal:</option>
                                          <option>Before</option>
                                          <option>After</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-3 pr-0">
                                    <div class="form-group">
                                       <input type="text" name="duration" id="duration" class="form-control form-control-sm" placeholder="Dur..">
                                    </div>
                                 </div>
                                 <input type="hidden" name="alltreatment" id="alltreatment" class="form-control">
                                 <div class="col-md-6 col-sm-3 pr-0">
                                    <div class="form-group">
                                       <a class="btn btn-success btn-sm additem">+</a>
                                       <!-- <input type="submit" name="btnadd" class="btn btn-success btn-sm" value="+"> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-2">
                           <div class="col-md-12" id="mytable">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="collapse" id="injection">
                  <div class="form-group">
                     <!-- <textarea name="treatment" class="form-control"></textarea> -->
                     <div class="row">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <select name="injection" id="injection" class="form-control form-control-sm js-example-basic-single injection" style="width: 100%;">
                                       <?php $__currentLoopData = $injections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $injection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($injection->id); ?>"><?php echo e($injection->name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <select name="injectiontype" class="form-control form-control-sm" id="injectiontype">
                                       <option value="">Select Type:</option>
                                       <option value="IM">IM</option>
                                       <option value="IV">IV</option>
                                    </select>
                                 </div>
                                 <input type="hidden" name="injectionstreatment" id="injectionstreatment" class="form-control">
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                    <button class="btn btn-success btn-sm addinjection">+</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col-md-12" id="myinjectiontable">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label>External Medicine:</label>
                  <textarea name="externalMedicine" class="form-control">
                   <?php echo e(trim($todayTreatment->external_medicine)); ?>

                  </textarea>
               </div>
               <!-- <input type="hidden" name="externalMedicine" value=""> -->
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Next Visit Date:</label>
                        <input type="date" value="<?php echo e(($todayTreatment->next_visit_date)); ?>" name="nextVisitDate1" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Next Visit Date 2:</label>
                        <input type="date" value="<?php echo e(($todayTreatment->next_visit_date)); ?>" name="next_visit_date2" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label>Charges</label>
                  <input type="number" name="charges" value="<?php echo e($todayTreatment->charges); ?>" class="form-control">
                  <span class="Echarge error d-block" ></span>
               </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="save" value="Save" id="treatmentsave">
                  <input type="reset" name="btnreset" class="btn btn-dark" value="Reset">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    showtable();
    showinjectiontable();
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $("#drug").hide();
    $("#injection").hide();
    $(".btn-drug").click(function(){
       $("#drug").show();
    $("#injection").hide();
     $('#recommending').hide();
    })

     $(".btn-injection").click(function(){
       $("#drug").hide();
    $("#injection").show();
     $('#recommending').hide();
    })

     $('.btn-recommending').click(function(){
      // alert('helo');
      $('#recommending').show();
      $("#drug").hide();
    $("#injection").hide();
     })

     $('.js-example-basic-single').select2();


     $(".additem").click(function(){
      addDrugs();
      showtable();

     //var drugname=$('#drug').text();
     
     })
     loadingMedicine();
     function loadingMedicine(){
      localStorage.clear();
      var itemlistOral=localStorage.getItem("itemlist");
       var itemlistInj=localStorage.getItem("itemlistinjection");

       if(!itemlistOral && !itemlistInj){
        olddrugsLoading();
       }
     }
     function olddrugsLoading(){
      // alert('helo');
      let olddrugs=$('input[name="used_Drug_list"]').val();
      console.log(olddrugs);
       var myitemlist=JSON.parse(olddrugs);

       var itemlistOral=localStorage.getItem("itemlist");
        if(!itemlistOral){
          var itemlistOral='{"itemlist":[]}';
       }

        var itemlistInj=localStorage.getItem("itemlistinjection");
        if(!itemlistInj){
          var itemlistInj='{"itemlist":[]}';
        }
        var myOrallist=JSON.parse(itemlistOral);
        var myInjlist=JSON.parse(itemlistInj);


       var itemobjOral=null;
       var itemobjInj=null;

       for(i in myitemlist){
         var v=myitemlist[i];
        if(v.drug_type==1){
          // console.log('Yes it is oral');
         
            itemobjOral={drugid:v.drugid,
                      drug:v.drug,
                      tab:v.tab,
                      time:v.times,
                      bf:v.bf,
                      duration:v.during};
            myOrallist.itemlist.push(itemobjOral);
        }else{
          // console.log('no it is not oral');
           itemobjInj={injectionid:v.drugid,injectionname:v.drug,injectiontype:v.type};
           myInjlist.itemlist.push(itemobjInj);
        }

       }

       // $.each(myitemlist,function(i,v){

       //    if(v.drug_type==1){

       //     itemobjOral={drugid:v.drugid,
       //              drug:v.drug,
       //              tab:v.tab,
       //              time:v.times,
       //              bf:v.bf,
       //              duration:v.during};

             
       //         // console.log('helo');
       //        $.each(myOrallist.itemlist,function(u,o){
       //          console.log(o);
       //            // if(o.drugid==v.drugid){
       //            //    // myOrallist.itemlist.push(itemobjOral);
       //            //    console.log('heo');
       //            // }else{
       //            //   console.log('not same');
       //            // }
       //        })
             

       //      }
           // }else{
              
           //    itemobjInj={injectionid:v.drugid, injectionname: v.drug, injectiontype: v.type};
           //    $.each(myInjlist.itemlist,function(a,b){
           //      if(b.injectionid!=v.drugid){
           //        myInjlist.itemlist.push(itemobjInj);
           //      }
           //    })
                
           // }
       // });
        console.log(myOrallist);
        console.log(myInjlist);

        oral=JSON.stringify(myOrallist);
        localStorage.setItem("itemlist",oral);

         injection=JSON.stringify(myInjlist);
         localStorage.setItem("itemlistinjection",injection);
      
        showtable();
        showinjectiontable();
        
     }

     function addDrugs() {
      // alert('one');
     var drug= $(".drugselect :selected").text();
     var drugid= $(".drugselect :selected").val();
     var bf=$("#bf").val();
     var tab=$("#tab").val();
     var time=$("#time").val();
     var duration=$("#duration").val();

      // if (tab!=="" && duration !=="") {
      var itemlist=localStorage.getItem("itemlist");
        if(!itemlist){
          var itemlist='{"itemlist":[]}';
       }
        
        var myitemlist=JSON.parse(itemlist);
        var itemobj={drugid:drugid,drug:drug,tab:tab,time:time,bf:bf,duration:duration};
        
        myitemlist.itemlist.push(itemobj);
        myitemlist=JSON.stringify(myitemlist);
        localStorage.setItem("itemlist",myitemlist);

        var storeditemlist=localStorage.getItem("itemlist");
        storeditemlist=JSON.parse(storeditemlist);
        
      // }else{
      //  alert('Please fill out all field!');
      // }
    }

      function showtable() {
      var storeditemlist=localStorage.getItem("itemlist");
        // localStorage.clear();
      if(storeditemlist){
        var storeditemlist=JSON.parse(storeditemlist);
        var myitemlist=storeditemlist.itemlist;
        // console.log(myitemlist);
        var j=1;
        var value = "";
        var mytable='<table class="table table-sm table-bordered table-responsive-sm">'+
            '<thead class="">'+
              '<tr>'+
                '<th>Drugs</th>'+
                '<th>Tab</th>'+
                '<th>Time</th>'+
                '<th>Meal</th>'+
                '<th>Duration</th>'+
                '<th>Delete</th>'+
              '</tr>'+
            '</thead><body>';
        
        $.each(myitemlist,function(i,v){
          if(v){
            var drugname=v.drug;
            var drugid=v.drugid;
            var tab = v.tab;
            var time = v.time;
            var bf = v.bf;
            var duration = v.duration;
            mytable+="<tr><td>"+drugname+"</td><td>"+tab+"</td><td>"+time+"</td><td>"+bf+"</td><td>"+duration+"</td><td><button class='btn btn-danger btn-sm delete' data-id="+i+">&times;</button></td></tr>";
           /* if (j > 1) {
              value += '-'+drugid+'/'+tab+'/'+time+'/'+bf+'/'+duration;
            }else{
              value += drugid+'/'+tab+'/'+time+'/'+bf+'/'+duration;
            }*/
            j++;
          }
        })
        
        mytable+="</tbody></table>";
        //$("#alltreatment").val(value);
          $("#mytable").html(mytable);
      }
    }

    $('#mytable').on('click','.delete',function (event) {
      event.preventDefault();
      var id = $(this).data('id');
      // alert(id);

      var myitemlist=localStorage.getItem("itemlist");
      myitemlist=JSON.parse(myitemlist);
      itemlist = myitemlist.itemlist;
      itemlist.splice(id,1);
        var myitemlist=JSON.stringify(myitemlist);
        localStorage.setItem("itemlist",myitemlist);
        showtable();
    })




    $('.addinjection').on('click',function (event) {
      // alert('ok enter drug');
      event.preventDefault();
      addInjectionDrugs();
      showinjectiontable();
    })


    function addInjectionDrugs() {
      // alert('one');
     var injectionname= $(".injection :selected").text();
     var injectionid = $('#injection :selected').val();
      var injectiontype = $('#injectiontype').val();
      alert(injectionname+injectionid);
      // if (tab!=="" && duration !=="") {
        var itemlist=localStorage.getItem("itemlistinjection");
        if(!itemlist){
          var itemlist='{"itemlist":[]}';
        }
        
        var myitemlist=JSON.parse(itemlist);
        var itemobj={injectionid:injectionid,injectionname:injectionname,injectiontype:injectiontype};
        
        myitemlist.itemlist.push(itemobj);
        myitemlist=JSON.stringify(myitemlist);
        localStorage.setItem("itemlistinjection",myitemlist);

        var storeditemlist=localStorage.getItem("itemlistinjection");
        storeditemlist=JSON.parse(storeditemlist);

               
      // }else{
      //  alert('Please fill out all field!');
      // }
    }

    function showinjectiontable() {
      var storeditemlist=localStorage.getItem("itemlistinjection");
        // localStorage.clear();
      if(storeditemlist){
        var storeditemlist=JSON.parse(storeditemlist);
        var myitemlist=storeditemlist.itemlist;
         // console.log(myitemlist);
        var j=1;
       var value = "";
        var mytable='<table class="table table-sm table-bordered table-responsive-sm">'+
            '<thead class="">'+
              '<tr>'+
                '<th>Name</th>'+
                '<th>Type</th>'+
                '<th>Delete</th>'+
              '</tr>'+
            '</thead><body>';
        
        $.each(myitemlist,function(i,v){
          if(v){
            var injectionname =v.injectionname;  
            // alert(drugid);
            var injectionid = v.injectionid
            
            var injectiontype = v.injectiontype;
            mytable+="<tr><td>"+injectionname+"</td><td>"+injectiontype+"</td><td><button class='btn btn-danger btn-sm deleteinjection' data-id="+i+">&times;</button></td></tr>";
           
            j++;
          }
        })
        
        mytable+="</tbody></table>";
      //  $("#injectionstreatment").val(value);
          $("#myinjectiontable").html(mytable);
      }
    }


    $('#myinjectiontable').on('click','.deleteinjection',function (event) {
      event.preventDefault();
      var id = $(this).data('id');
      // alert(id);

      var myitemlist=localStorage.getItem("itemlistinjection");
      myitemlist=JSON.parse(myitemlist);
      itemlist = myitemlist.itemlist;
      itemlist.splice(id,1);
        var myitemlist=JSON.stringify(myitemlist);
        localStorage.setItem("itemlistinjection",myitemlist);
        showinjectiontable();
    })

//     $("#treatmentsave").click(function(e){
//       e.preventDefault();
//       var formData = new FormData(document.getElementById("myform"));
//               formData.append('_method','PUT');

//       //console.log(treatmentid);
//       var itemlist=localStorage.getItem("itemlist");

//       var myitemlist=JSON.parse(itemlist);

//       var injectionlist=localStorage.getItem("itemlistinjection");
//       var myinjectionlist=JSON.parse(injectionlist);

//       if(itemlist){
//      formData.append('drugs', JSON.stringify(myitemlist.itemlist));
//       }
//       // formData.append('drugs', JSON.stringify(myitemlist.itemlist));

//       if(myinjectionlist){
//       formData.append('injections', JSON.stringify(myinjectionlist.itemlist));
//       }

//     /* $.post("<?php echo e(route('treatment.store')); ?>",{formData:formData,myitemlist:myitemlist,myinjectionlist:myinjectionlist},function(response){

//      })*/
//       var treatmentid=$(".treatment-id").val();
//       alert('treatmentid');

//     var url="<?php echo e(route('treatment.update',':id')); ?>";
//       url=url.replace(':id',treatmentid);
//       // console.log(url);
//      $.ajax({
//                 type:'post',
//                 url:url,
//                 data: formData,
//                 dataType:'json',
//                 cache:false,
//                 contentType: false,
//                 processData: false,
//                 success: (data) => {
//                   if(data.success){
//                     // alert("treatmentsuccessfully")
//                    localStorage.clear();
//                    window.location.href = "/appointpatient";
//                   }
                          
//                 },
//                 error: function(error){
//                   var message=error.responseJSON.message;
//                    var errors=error.responseJSON.errors;
//                   //console.log(error.responseJSON.errors);
//                   if(errors){
//                       var gc=errors.gc;
//                         //var email=errors.email;
//                         var complaint=errors.complaint;
//                         var diagnosis=errors.diagnosis;
//                         var charges=errors.charges;
//                          $('span.error').addClass('text-danger');
//                         $('.Egc').text(gc);
//                          $('.Ecomplaint').text(complaint);
//                          $('.Edia').text(diagnosis);
//                          $('.Echarge').text(charges);
//                   }
//                 }
//           })


//     })
  $('#myeditform').submit(function(e){
    e.preventDefault();
     var formData = new FormData(document.getElementById("myeditform"));
      formData.append('_method','PUT');
      var itemlist=localStorage.getItem("itemlist");

      var myitemlist=JSON.parse(itemlist);

      var injectionlist=localStorage.getItem("itemlistinjection");
      var myinjectionlist=JSON.parse(injectionlist);

      if(itemlist){
     formData.append('drugs', JSON.stringify(myitemlist.itemlist));
      }
      // formData.append('drugs', JSON.stringify(myitemlist.itemlist));

      if(myinjectionlist){
      formData.append('injections', JSON.stringify(myinjectionlist.itemlist));
      }

       var treatmentid=$(".treatment-id").val();
       // alert(treatmentid);

        var url="<?php echo e(route('treatmentUpdateByDoctor',':id')); ?>";
          url=url.replace(':id',treatmentid);
          // console.log(url);
         $.ajax({
                    type:'post',
                    url:url,
                    data: formData,
                    dataType:'json',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                      console.log(data);
                      if(data.success){
                        swal("Good job!", "The Date is updated!", "success").then(() => {
                            localStorage.clear();
                       window.location.href = "/treatment";
                          });;
                         // alert("treatmentsuccessfully")
                        
                      }
                              
                    },
                    error: function(error){
                      var message=error.responseJSON.message;
                       var errors=error.responseJSON.errors;
                      //console.log(error.responseJSON.errors);
                      if(errors){
                          var gc=errors.gc;
                            //var email=errors.email;
                            var complaint=errors.complaint;
                            var diagnosis=errors.diagnosis;
                            var charges=errors.charges;
                             $('span.error').addClass('text-danger');
                            $('.Egc').text(gc);
                             $('.Ecomplaint').text(complaint);
                             $('.Edia').text(diagnosis);
                             $('.Echarge').text(charges);
                      }
                    }
              })

  })

 })


   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/myprj/gp-clinic/resources/views/treatment/edit.blade.php ENDPATH**/ ?>