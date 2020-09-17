@extends('frontendTemplate')
@section('content')
<div class="row">

        
      <div class="col-xl-12 order-xl-1">
	          <div class="card bg-secondary shadow">
	            <div class="card-header bg-white border-0">
	              <div class="row align-items-center">
	                <div class="col-8">
	                	
	                	 @if( ($owner->avatar!=null) )
		              <img src="{{asset($owner->avatar)}}" width="60" class="rounded-circle float-left d-inline-block mr-4 mt-3 ">
		              @endif
		                  
	                  <h3 class=" p-0 pr-4 mt-3 ">{{$owner->user->name}}</h3>
	                   <h6 class="small text-muted mb-4">Position: {{$owner->user->getRoleNames()[0]}} </h6>
	                </div>
	                <div class="col-4 text-right">
	                  <a href="{{route('owners.edit',$owner->id)}}" class="btn btn-sm btn-primary">Edit Profile</a>
	                </div>
	              </div>
	            </div>
	            <div class="card-body">
	            	<div class="row" >

	            		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 ">
	            			<h6 class="heading-small text-muted mb-4">Clinic information</h6>
	            			<div class="row  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Name:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;"> {{$owner->clinic_name}}</h5>
		            			</div>
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">

		            				<p class="description mb-0 d-flex ">Logo:<img src="{{asset($owner->clinic_logo)}}" width="70" height="70" class="rounded-circle  d-inline-block ml-3"></p>
	                              	
	                          	</div>
		            		</div>
		            		<div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
		            			<div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Phone:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">{{$owner->phone}}</h5>
		            			</div>
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Address:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">{{$owner->address}}</h5>
	                          	</div>
		            		</div>
		            		<div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
		            			<div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				
		                              <p class="description mb-0 ">Opening:</p>
		                              <h5 class="heading-my ml-3 my-td " style="transform: none;">{{$owner->clinic_time}}</h5>
		            			</div>
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Register Date:</p>
	                              <h5 class="heading-my ml-3 my-td " style="transform: none;">
	                              	@php
	                              	$date=date_create($owner->created_at);
									$date= date_format($date,"Y M dS ");
	                              	 @endphp
	                              	{{$date}}
	                              </h5>
	                          	</div>
		            		</div>

		            		<!-- contact information -->
		            		<!-- <h6 class="heading-small text-muted mb-4">Helo information</h6>
	            			<div class="row  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Name:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">May Ka Lar</h5>
		            			</div>
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">

		            				<p class="description mb-0 d-flex ">Logo:<img src="{{asset('template/assets/img/theme/team-4-800x800.jpg')}}" width="40" class="rounded-circle  d-inline-block ml-3"></p>
	                              	
	                          	</div>
		            		</div>
		            		<div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
		            			<div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Phone:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">Mary Brown</h5>
		            			</div>
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Address:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">9/AHMAZA(N)0987665</h5>
	                          	</div>
		            		</div>
		            		<div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
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
	            		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 ">
	            			<h6 class="heading-small text-muted mb-4">User information</h6>
	            			<div class="row  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0" >
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Email:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">{{$owner->user->email}}</h5>
		            			</div>
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Password:</p>
	                              <h5 class="heading-my ml-3 " style="transform: none;">*********</h5>
	                          	</div>
		            		</div>
		            		<div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
		            			<div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">Name:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">{{$owner->user->name}}</h5>
		            			</div>
		            			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				<p class="description mb-0 ">NRC NO:</p>
		                              <h5 class="heading-my ml-3 " style="transform: none;">{{$owner->nrc}}</h5>
	                          	</div>
		            		</div>
		            		<div class="row mt-3  p-lg-2 p-md-2 p-sm-0 p-sx-0 p-0">
		            			<div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 col-12 mt-lg-0 mt-md-3 mt-sm-3 mt-xs-3 mt-3">
		            				
		                              <p class="description mb-0 ">Birthday:</p>
		                              <h5 class="heading-my ml-3 my-td " style="transform: none;">@php
	                              	$date=date_create($owner->dob);
									$date= date_format($date,"Y dS M ");
	                              	 @endphp
	                              	{{$date}}</h5>
		            			</div>
		            			
		            		</div>
	            		</div>

	            		
	            		
	            	</div>
	            </div>
	          </div>
	        </div>

      </div>

@endsection