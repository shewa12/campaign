<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//db facades
use admin\Features;
use admin\UserServices;

class FeaturesCtrl extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
        
    function getFeatures(){
    	$title= "Features";
        $services= UserServices::orderBy('id','desc')
                    ->get();
        //inner joining
    	$features= DB::table('features')
                    ->join('services as s','features.service_id','=','s.id')
                    ->select('features.*','s.name as serviceName')
    				->get();
        
    	return view('admin/features')->with(['title'=>$title,'features'=>$features,'services'=>$services]);
    }

    function saveFeature(Request $request){
    	$feature= new Features([
                'service_id'=>$request->service_id,
    			'name'=>$request->name
    		]);
    	if($feature->save()){
    		return redirect()->route('getFeatures')->with('success','Feature Added!');
    	}
    	else{
    		return redirect()->route('getFeatures')->with('fail','Feature Could Not Be Add!');

    	}
    }

    function updateFeature(Request $request){
    	$feature = Features::where('id', $request->id)
    					->update(['name'=>$request->name]);
   		if($feature){
    		return redirect()->route('getFeatures')->with('success','Feature Updated!');

   		} 
   		else{
    		return redirect()->route('getFeatures')->with('fail','Feature Could Not Update!');

   		}					
    }

    function deleteFeature($id){
 		$feature= Features::where('id',$id)
 					 ->delete();
     
    }
}
