<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Owner;
use App\Doctor;
use App\Reception;
use App\Medicine;
use App\Stock;
use App\Patient;
use App\Appointment;
use App\Monthlymedicine;

class SeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// owner table
        $json=File::get(public_path('database/user-table.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

        	$user=new User();
        	// dd($user);
            $user->name=$value->name;
            $user->email=$value->email;
            $user->password=Hash::make($value->password);
            $user->save();
      
            $user->assignRole('Admin');
            $clinic='Clinic-'.$user->name;
        	// dd($clinic);
	        Owner::create([
	            'user_id'=>$user->id,
	            'clinic_name'=>$clinic,
	            'clinic_time'=>'9-7',
	            'address'=>'yangon',
	            'phone'=>'098765543',
	        ]);
        }

        // doctor table
         $json=File::get(public_path('database/doctor-table.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

        	$user=new User();
        	// dd($user);
            $user->name=$value->name;
            $user->email=$value->email;
            $user->password=Hash::make($value->password);
            $user->save();
      
              $user->assignRole('doctor');
        

		        $doctor=Doctor::create([
		            // 'owner_id'=>Auth::user()->id,
		            'owner_id'=>$value->owner_id,
		            'user_id'=>$user->id,
		            'nrc'=>$value->nrc,
		            'age'=>$value->age,
		            'degree'=>$value->degree,
		            
		            'experience'=>$value->experience,
		            
		            'address'=>$value->address,
		            'phone'=>$value->phone,
		        ]);
        }

         // reception table
         $json=File::get(public_path('database/reception-table.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

        	$user=new User();
        	// dd($user);
            $user->name=$value->name;
            $user->email=$value->email;
            $user->password=Hash::make($value->password);
            $user->save();
      
		        $user->assignrole('reception');

		        $reception=new Reception;
		        $reception->gender=$value->gender;
		        $reception->phoneno=$value->phone;
		        $reception->education=$value->education;
		        $reception->address=$value->address;
		        $reception->user_id=$user->id;
		        $reception->owner_id=$value->owner_id;
		        $reception->file='[]';
		        $reception->save();
        }
        //medicine table
         $json=File::get(public_path('database/medicine-table.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

        $medicine=new Medicine();
        $medicine->medicinetype_id=$value->medicinetype_id;
        $medicine->name=$value->name;
        $medicine->chemical=$value->chemical;
        $medicine->size=$value->size;
        $medicine->owner_id=$value->owner_id;
        $medicine->save();
        }

        // stock table
           $json=File::get(public_path('database/stock-table.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

	         Stock::create([
	            'medicine_id'=>$value->medicine_id,
	            'qty'=>$value->qty,
	            'unit1'=>$value->unit1,
	            'unit2'=>$value->unit2,
	            'unit3'=>$value->unit3,
	            'unit4'=>$value->unit4,
	            'expire_date'=>$value->expire_date
	        ]);
        }

        //monthlymedicine
           $json=File::get(public_path('database/monthlymedicine.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

	          Monthlymedicine::create([
                    'medicine_id'=>$value->medicine_id,
                    'emdate'=>$value->emdate,
                    'qty'=>$value->qty
                 ]);
        }

        //patient
           $json=File::get(public_path('database/patient-table.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

	          $patient=new Patient;
			     $patient->PRN=$value->PRN;
			     $patient->name=$value->name;
			     $patient->fatherName=$value->fatherName;
			     $patient->age=$value->age;
			     $patient->child=$value->child;
			     $patient->gender=$value->gender;
			     $patient->phoneno=$value->phone;
			     $patient->address=$value->address;
			     $patient->married_status=$value->married_status;
			     $patient->status=0;
			     $patient->pregnant=$value->pregnant;
			     $patient->body_weight=$value->body_weight;
			     $patient->allergy=$value->allergy;
			     $patient->job=$value->job;
			     $patient->file=$value->file;
			     $patient->reception_id=$value->reception_id;
			     $patient->save();
        }


         //appointment for 11 and 12
           $json=File::get(public_path('database/appointment.json'));;
        $data=json_decode($json);
        foreach ($data as $value) {

		          Appointment::create([
	            'name'=>$value->name,
	            'phone'=>$value->phone,
	            'doctor_id'=>$value->doctor_id,
	            'A_Date'=>$value->A_Date,
	            'TokenNo'=>$value->Token,
	        ]);
        }




    }
}
