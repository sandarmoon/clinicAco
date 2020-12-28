<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Mail;
use URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;

class AccountsController extends Controller
{
    public function validatePasswordRequest(Request $request){
    	$user = DB::table('users')->where('email', '=', $request->email)
			    ->first();
		if (empty($user)) {
		    return response()->json(['message'=>'User does not exist! Try Again Later','status'=>0]);
		}

		//Create Password Reset Token
		DB::table('password_resets')->insert([
    		'email'=>$request->email,
    		'token'=>Str::random(40),
    		'created_at' => Carbon::now()
    	]);
    	$row=DB::table('password_resets')->where('email',$request->email)->orderBy('created_at','desc')->first();
    	 // dd($row->token);
    	// url(config('app.url').route('password.reset', $this->token, false))
    	 $link = config('base_url') . 'password/reset/' . $row->token . '?email=' . urlencode($row->email);
    	 $link=url($link);
    	  // dd($link);

    	 $data = array('name'=>$user->name,'url'=> $link);
         $email=$row->email;
          // dd($email);

         try{

          Mail::send(['text'=>'Resetmail'], $data, function($message) use ($email) {
             $message->to($email, 'Please reset your password')->subject
                ('Please reset your password');
             $message->from('_mainaccount@bobomm.me','Myan GP Clinic');
          });

          
          return response()->json(['message'=>'A reset link has been sent to your email address.','status'=>1]);

     	}catch(Exception $e){
     		
     		return response()->json(['message'=>'A Network Error occurred. Please try again.','status'=>0]);

     	}
    }

     public function resetPassword(Request $request){
    	 $messages = [
                    'password.regex' => 'Must have 8 characters, at least one UpperCase, LowerCase ,number and special sign!',
                ];
    	// dd($request);
    	// $validator=Validator::make($request->all(),[
    	// 	'email'=>'required|email|exists:users,email',
    	// 	'password'=>'required|confirmed',
    	// 	'token'=>'required'
    	// ]);

    	$request->validate([
            'email'=>'required|email|exists:users,email',
    		'password'=>'required|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
    		'token'=>'required'
        ],$messages);

    	$password=$request->password;

    	$token=DB::table('password_resets')->where('token',$request->token)->first();

    	if(!$token){
    		return view('auth.passwords.email');
    	}

    	$user =User::where('email',$token->email)->first();

    	if(!$user){
    		return redirect()->back()->withErrors(['email'=>'Email not Found']);
    	}

    	$user->password=Hash::make($password);
    	$user->update();

    	DB::table('password_resets')->where('email', $user->email)
    	->delete();

    	//  if ($this->sendSuccessEmail($tokenData->email)) {
		   //      return view('index');
		   // } else {
		   //      return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
		   // }
      //hels
    	
    	 
    	try{

    		$link=url('/password/reset');
    		$email=$user->email;
    		$data = array('name'=>$user->name,'resetlink'=> $link,'email'=>$user->email);
          Mail::send(['text'=>'successResetMail'], $data, function($message) use ($email) {
             $message->to($email, '[MyanGP]Your password was reset')->subject
                ('[MyanGP]Your password was reset');
             $message->from('_mainaccount@bobomm.me','MyanGP Clinic');
          });
          Auth::login($user);
			 if($user->hasRole('Reception')){
            return redirect('/rdashboard');
	        }elseif($user->hasRole('Doctor')){
	            return redirect('/ddashboard');
	        }elseif($user->hasRole('Admin')){
	            return redirect('/ownerDashboard');
	        }else{
	            return redirect('/dashboard');
	        }

     	}catch(Exception $e){
     		return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.later')]);

     	}



    }


}
