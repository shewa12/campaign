<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use admin\Campaign;
use admin\Keyword;
use admin\Progress;
class Employee extends Controller
{
    function index(){
    	$title= "Asigned Campaign";

        $q= Campaign::where('employee_id',Auth::id())
                //->orderBy('users.id','desc')
                ->get();    	
    	return view("employee/employee",['title'=>$title,'campaigns'=>$q]);
    }

    function employeeCampaign($camp_id){
        $keywords= Keyword::where('campaign_id',$camp_id)
                    //->orderBy('id','desc')
                    ->get();        
        $campaign= Campaign::where('id',$camp_id)
                    ->get();
        $title= "Campaign Keywords";

        return view('employee.campaign_detail',['title'=>$title, 'keywords'=>$keywords,'campaign'=>$campaign]);
                
    }   

    function manageSales($keyword_id){
    	$title ="Manage Sale";
    	$saleCount= $this->countSaleAsperKeyword($keyword_id);
    	$keyword= $this->keywordDetail($keyword_id);
        $progress= $this->getProgressForKeyword($keyword_id);

    	return view('employee.manage_sales',['title'=>$title ,'saleCount'=>$saleCount,'keyword'=>$keyword,'progress'=>$progress]);

    } 

    function countSaleAsperKeyword($keyword_id){
    	$q= Progress::where('keyword_id',$keyword_id)->get();
    	return count($q);
    }	

    function getProgressForKeyword($keyword_id){
        $q= Progress::where('keyword_id',$keyword_id)
                    ->paginate(10);
        return $q;
    }

    function keywordDetail($keyword_id){
    	$q= Keyword::where('id',$keyword_id)->first();
    	return $q;
    }

    function addSale(Request $request){
        $request['order_no']= rand(10,100);
        $q= new Progress($request->all('except','_token'));
        if($q->save()){
            return redirect()->back()->with('success','Sale created successfully!');
        }
        else{
            return redirect()->back()->with('fail','Sale creation failed!');

        }
    }
}
