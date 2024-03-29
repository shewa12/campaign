<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;//request is for form input values 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;//hasching
use Illuminate\Support\Facades\Auth;//auth for get logged in info

use Illuminate\Http\UploadedFile;//for upload files

use admin\User;//user model
use admin\Campaign;//user model
class Users extends Controller
{
	function __construct(){
		$this->middleware('auth');
	}
 	function getUsers(){
 		$title= "Users";

					   
 		return view('admin.users')->with(['title'=>$title,'users'=>$this->getAllusers()]);
 	}

 	function getAllusers(){
		$users = User::select()
					->where('role',2)
		 			->orderBy('id','desc')
		 			->get(); 
		return $users;	 					
 	} 	

 	function userDetail($id){
 		$title="Employee Detail";
		$user = User::where('id',$id)
		 			 ->first(); 
		
		return view('admin.employee_detail',['title'=>$title,'user'=>$user]);	 					
 	}

 	function saveUser(Request $request){
        $this->validate($request, [


            'email' =>'required|email|max:255|unique:users',
            'password' =>'required|min:6'
        ]);
 		if($request->hasFile('image')){
 			if($request->file('image')->isValid()){
 				if($request->file('image')->storeAs("avatars", $request->file('image')->getClientOriginalName())){
 					$post=[

 						'image'=>$request->file('image')->getClientOriginalName(),
 						'image_path'=>$request->file('image')->path(),
 						'name'=>$request->name,
 						
 						'email'=>$request->email,
 						'password'=>bcrypt($request->password),
 						'address'=>$request->address,
 						'phoneNumber'=>$request->phoneNumber,
 						'role'=>$request->role,
 						'region'=>$request->region,
 						'zipCode'=>$request->zipCode
 						/*
 						'age'=>$request->age,
 						'recognitionSign'=>$request->recognitionSign,
 						'about'=>$request->about
 						*/


 					];

 					$user= new User($post);
 					
 					if($user->save()){
 						return redirect()->route('users')->with('success','Employee added succefully!');
 					}
 					else{
 						return redirect()->route('users')->with('fail','Failed to Add User!');

 					}
 				}
 			}
 			else{
 					return redirect()->route('users')->with('fail','Image Is Not Valid!');

 			}
 		}		
 	}

 	function updateUser(Request $request){

 		if($request->hasFile('image')){
 			if($request->file('image')->isValid()){
 				if( $request->file('image')->storeAs("avatars", $request->file('image')->getClientOriginalName())){
 					$user= User::where('id',$request->id)
 						->update([
 						'image'=>$request->file('image')->getClientOriginalName(),
 						'image_path'=>$request->file('image')->path(),
 						'name'=>$request->name,
 						
 						'email'=>$request->email,
 						
 						'address'=>$request->address,
 						'phoneNumber'=>$request->phoneNumber,
 						'region'=>$request->region,
 						'zipCode'=>$request->zipCode
/*
 						'age'=>$request->age,
 						'recognitionSign'=>$request->recognitionSign,
 						'about'=>$request->about
*/
 						]);
 				
 					if($user){
 						return redirect()->route('users')->with('success','User Added Succefully!');
 					}
 					else{
 						return redirect()->route('users')->with('fail','Failed to Update User!');

 					}
 				}
 			}
 			else{
 					return redirect()->route('users')->with('fail','Image Is Not Valid!');

 			}
 		}//if image not added
 		else{
 				$user= User::where('id', $request->id)
 						->update([

 					//'image'=>$request->img,
 					//'image_path'=>$request->img_path,
 					'name'=>$request->name,
 					
 					'email'=>$request->email,
 					
 					'address'=>$request->address,
 					'phoneNumber'=>$request->phoneNumber,
 					'region'=>$request->region,
 					'zipCode'=>$request->zipCode
 					/*
 					'age'=>$request->age,
 					'recognitionSign'=>$request->recognitionSign,
 					'about'=>$request->about
 					*/
 				]);

 				if($user){
 					return redirect()->route('users')->with('success','User Updated Succefully!');
 				}
 				else{
 					return redirect()->route('users')->with('fail','User Update Failed!');

 				}
 		}

 	}


 	function deleteUser($id){
 		$user= User::where('id',$id)
 					 ->delete();

 	}

 	function asignUser(Request $request){
 		$q= Campaign::where('id',$request->campaign_id)
 				->update(['employee_id'=>$request->employee_id]);
 		if($q){
 			return redirect()->back()->with('success',"Employee asigned succefully!");
 		}			
 		else{
 			return redirect()->back()->with('fail',"Employee asign failed!");
 		}
 	}
}
