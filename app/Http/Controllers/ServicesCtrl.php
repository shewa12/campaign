<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;
use admin\UserServices;

class ServicesCtrl extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }    
    function getServices(){
    	$title= "Services";
    	$services= UserServices::orderBy('id','desc')
    							->get();

    	return view('admin/services')->with(['title'=>$title,'services'=>$services]);
    }

    function saveService(Request $request){
    	$service= new UserServices([
    			'name'=>$request->name
    		]);
    	if($service->save()){
    		return redirect()->route('getServices')->with('success','Service Added!');
    	}
    	else{
    		return redirect()->route('getServices')->with('fail','Service Could Not Add!');

    	}
    }

    function updateService(Request $request){
    	$services = UserServices::where('id', $request->id)
    					->update(['name'=>$request->name]);
   		if($services){
    		return redirect()->route('getServices')->with('success','Service Updated!');

   		} 
   		else{
    		return redirect()->route('getServices')->with('fail','Service Could Not Update!');

   		}					
    }

    function deleteService($id){
 		$user= UserServices::where('id',$id)
 					 ->delete();
     
    }
}
