<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//db facades
use admin\Locations;


class LocationCtrl extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    function getLocations(){
    	$title= "Locations";
        $locations= Locations::orderBy('id','desc')
                    ->get();

        
    	return view('admin/location')->with(['title'=>$title,'locations'=>$locations]);
    }

    function saveLocation(Request $request){
    	$location= new Locations([
                'country'=>$request->country,
                'city'=>$request->city,
    			'address'=>$request->address
    		]);
    	if($location->save()){
    		return redirect()->route('getLocations')->with('success','Location Added!');
    	}
    	else{
    		return redirect()->route('getLocations')->with('fail','Location Could Not Be Add!');

    	}
    }

    function updateLocation(Request $request){
    	$location = Locations::where('id', $request->id)
    					->update([
                        'country'=>$request->country,
                        'city'=>$request->city,
                        'address'=>$request->address
                        ]);
   		if($location){
    		return redirect()->route('getLocations')->with('success','Location Updated!');

   		} 
   		else{
    		return redirect()->route('getLocations')->with('fail','Location Could Not Update!');

   		}					
    }

    function deleteLocation($id){
 		$location= Locations::where('id',$id)
 					 ->delete();
     
    }
}
