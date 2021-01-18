<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		

		.page-number:before {
		  content: "Page " counter(page);
      text-align: center;
		}

		 #info h3, #info p, #info h1{
			margin: 0px;
			padding: 0px;
		}

		img{
			object-fit: cover;
			position: absolute;
			top: -2%;
			right: 24%;
			width: 150px;
			height: 150px;
			}

			table{
				
				border-collapse: collapse;
			}

			

	</style>
</head>
<body>
	
		<div class="information" style="position: absolute; bottom: 0;">
            <table width="100%">
                <tr>
                    <td align="left" style="width: 40%;">
                        Aye Thu Ka Clinic
                    </td>
                   <td width="40%" align="center"> <div class="page-number"></div></td>
                    <td align="right" style="width: 40%;">
                        {{ date('Y-m-d') }}
                    </td>
                </tr>

            </table>
        </div>

        <table border="0" style="width:100%;margin-bottom:20px;">
		<tr>
			<td width="80%">
				<div id="info">
					<h1 class="text-dark ">
						{{$treatment->patient->reception->owner->clinic_name}}
					</h1>
					<h3 class="mb-0">Treatment Progress Report</h3>
					<small>To request futher certifications,please mail to {{$treatment->patient->reception->user->email}}</small>
					<p >{{$treatment->patient->reception->owner->address}}</p>
					<p>Phone: <span >{{$treatment->patient->reception->owner->phone}}</span></p>
				</div>
			</td>
			
			<td id="img">

				@php 
				$image_path = $treatment->patient->reception->owner->clinic_logo;
				$path = public_path($image_path);
		        $type = pathinfo($path, PATHINFO_EXTENSION);
		        $data = file_get_contents($path);
		        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
				 @endphp
				
				 <img src="{{ $base64 }}" alt="" /> 
				
			</td>
		</tr>
		</table>

		<table id="baseInfo" style="width:100%;margin-bottom:30px;">
			<tr>
				<td >PRN No</td>
				<td>:{{$treatment->patient->PRN}}</td>
				<td >Doctor</td>
				<td >:{{$treatment->doctor->user->name}} </td>
				<td >Visit Date</td>
				<td>:{{$treatment->created_at->toDateString()}}</td>
			</tr>
			<tr>
				<td >Age</td>
				<td>:{{$treatment->patient->age}}</td>
				<td >Phone</td>
				<td > :{{$treatment->doctor->phone}}</td>
				
			</tr>
			<tr>
				<td  rowspan="2">Patient Name</td>
				<td rowspan="2">:{{$treatment->patient->name}}</td>
				
			</tr>
		</table>

		
		
		<div style="float: left;">
			<div style="width: 200px;">
				<table cellpadding="14" width="100%" border="1">
			    	<tr>
			    		<th colspan="2">Observation</th>

			    	</tr>
			    	<tr>
			    		<td>Gc Level</td>
						<td>{{$treatment->gc_level}}</td>

					</tr>
					<tr>	<td>Temperature</td>
						<td>{{$treatment->temperature ? $treatment->temperature:'-'}}</td>
			    	</tr>

			    	<tr>
			    		<td>Spo2</td>
						<td>{{$treatment->spo2 ?  $treatment->spo2 : '-'}}</td>
						
			    	</tr>
			    	<tr>
			    		<td>Pr</td>
						<td>{{$treatment->pr ?  $treatment->pr : '-'}}</td>
			    	</tr>
			    	<tr>
			    		
			    		<td>Rbs</td>
						<td>{{$treatment->rbs ?  $treatment->rbs : '-'}}</td>
						
						
			    	</tr>
			    	<tr>
			    		<td>Bp</td>
						<td>{{$treatment->bp ?  $treatment->bp : '-'}}</td>
			    	</tr>
			    	<tr>
			    		

						<td>Body Weight</td>
						<td>{{$treatment->body_weight ?  $treatment->body_weight : '-'}}</td>

			    	</tr>
			    	<!-- <tr>
			    		<td >Examination</td>
						<td >{{$treatment->examination ?  $treatment->examination : ''}}</td>
			    	</tr> -->
				</table>
			</div>

			<div style="width: 460px;position: absolute; top: 205px;right:20px;display: inline;">
				<table cellpadding="14" width="100%" style="margin-top:30px;" border="1">
			    	<tr>
			    		<th colspan="4">Complaint and History</th>

			    	</tr>
			    	<tr>
			    		<td>Examination</td>
						<td colspan="3">
								{{$treatment->examination ?  $treatment->examination:'-'}}
								</td>

						
			    	</tr>
			    	<tr>
			    		<td>Complaint</td>
						<td colspan="3">
								{{$treatment->complaint ?  $treatment->complaint:'-s'}}
								</td>

						
			    	</tr>

			    	<tr>
			    		<td>Relevant Info</td>
						<td colspan="3" >
								{{$treatment->relevant ?  $treatment->relevant : '-'}}
							</td>

						
			    	</tr>
			    	<tr>
						<td>Diagnosis</td>
						<td  colspan="3">{{$treatment->diagnosis ?  $treatment->diagnosis : '-'}}</td>
						
						
						
					</tr>
					<tr>
						<td>Chronic Diseases</td>
						<td colspan="3">{{$treatment->chronic_disease ?  $treatment->chronic_disease : '-'}}</td>
						
					</tr>

			    	
				</table>
			</div>
		</div>
		<div style="clear: both;">
			
		</div>
		<div style="position: absolute; bottom: 50;left: 50px;">
			<table style="width: 100%;">
				<tr>
					<td>
						<p  style="margin: 0;padding: 0;">--------------------------</p>
						<span>(Doctor's Name)</span>
					</td>
					<td>
						<p  style="margin: 0;padding: 0;">--------------------------</p>
						<span>(sign)</span>
					</td>
					<td>
						<p  style="margin: 0;padding: 0;">--------------------------</p>
						<span>(Date)</span>
					</td>
				</tr>
			</table>
		</div>
		
		
		
	
</body>

</html>