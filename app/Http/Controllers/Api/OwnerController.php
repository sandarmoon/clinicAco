<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OwnerResource;
use App\Owner;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Illuminate\Support\Facades\Storage;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json([
        //     'status' => 'ok',
        //     'totalResults' => count($categories),
        //     'categories' => CategoryResource::collection($categories)
        // ]);
        $owners=Owner::all();
        return OwnerResource::collection($owners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
         $validator=Validator::make($input,[
            'avatar' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|unique:users',
            'clinic_name'=>'required',
            'clinic_logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'clinic_time'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'nrc'=>'required',
            'age'=>'required',
            'dob'=>'required'
        ]);

         if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        // if($request->file()) {
        //     // 624872374523_a.jpg
        //     $fileName = time().'_'.$request->photo->getClientOriginalName();

        //     // brandimg/624872374523_a.jpg
        //     $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

        //     $path = '/storage/'.$filePath;
        // }

         $avatar = $request->file('avatar');
         $logo = $request->file('clinic_logo');
        
            if($avatar){
            
                $name=uniqid().time().$avatar->getClientOriginalName();
                 $afilePath = $request->file('avatar')->storeAs('owner', $name, 'public');
                // $avatar->move(public_path('storages/owner/'),$name);
                $avatar_path='storage/'.$afilePath;
                  
            }

            if($logo){
            
                 $name=uniqid().time().$logo->getClientOriginalName();
                 $lfilePath = $request->file('clinic_logo')->storeAs('logo', $name, 'public');
                // $avatar->move(public_path('storages/owner/'),$name);
                $logo_path='storage/'.$lfilePath;
                  
            }

            $user=new User();
            $user->name=request('name');
            $user->email=request('email');
            $user->password=Hash::make(request('password'));
            $user->save();
      
            $user->assignRole('Admin');
        
        $owner=Owner::create([
            'user_id'=>$user->id,
            'nrc'=>request('nrc'),
            'age'=>request('age'),
            'dob'=>request('dob'),
            'avatar'=>$avatar_path,
            'clinic_name'=>request('clinic_name'),
            'clinic_logo'=>$logo_path,
            'clinic_time'=>request('clinic_time'),
            'address'=>request('address'),
            'phone'=>request('phone'),
        ]);
      
        return $this->sendResponse(new OwnerResource($owner), 'Owner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

          $owner =Owner::with('user')->find($id);
        if (is_null($owner)) {
            return $this->sendError('Data not found.');
        }


        return $this->sendResponse(new OwnerResource($owner), 'Owner retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=Validator::make($input,[
            'avatar' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|unique:users',
            'clinic_name'=>'required',
            'clinic_logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'clinic_time'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'nrc'=>'required',
            'age'=>'required',
            'dob'=>'required',
            'oldavatar'=>'required',
            'old_clinic_logo'=>'required'
        ]);

         if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

         $avatar = $request->file('avatar');
         $logo = $request->file('clinic_logo');
         $profile='';
         $logo_path='';
       // dd($avatar);
        
        if($avatar){

                $name=uniqid().time().$avatar->getClientOriginalName();
                 $afilePath = $request->file('avatar')->storeAs('owner', $name, 'public');
                // $avatar->move(public_path('storages/owner/'),$name);
                $profile='storage/'.$afilePath;

                Storage::delete($request->oldavatar);
           
                // $name=uniqid().time().'.'.$avatar->getClientOriginalExtension();
                // $avatar->move(public_path('storages/owner/'),$name);
                // $profile='storages/owner/'.$name;  
        }else{
            $profile=request('oldavatar');
        }

        if($logo){
           
                $name=uniqid().time().$logo->getClientOriginalName();
                 $lfilePath = $request->file('clinic_logo')->storeAs('logo', $name, 'public');
                // $avatar->move(public_path('storages/owner/'),$name);
                $logo_path='storage/'.$lfilePath;
                Storage::delete($request->old_clinic_logo);
        }else{
            $logo_path=request('old_clinic_logo');
        }

        $owner=Owner::with('user')->find($id);
            
            $owner->nrc=request('nrc');
            $owner->age=request('age');
            $owner->dob=request('dob');
            $owner->avatar=$profile;
            $owner->clinic_name=request('clinic_name');
            $owner->clinic_logo=$logo_path;
            $owner->clinic_time=request('clinic_time');
            $owner->address=request('address');
            $owner->phone=request('phone');
            $owner->update();

            $user=User::find($owner->user->id);
            $user->name=request('name');
            $user->update();

             return $this->sendResponse(new OwnerResource($owner), 'Owner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner=Owner::find($id);
        $owner->delete();
         return $this->sendResponse(new OwnerResource($owner), 'Owner deleted successfully.');
    }

   
}
