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
                ->paginate(10);    	
    	return view("employee/employee",['title'=>$title,'campaigns'=>$q]);
    }

    function employeeCampaign($camp_id){
        $keywords= Keyword::where('campaign_id',$camp_id)
                    ->orderBy('id','desc')
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

    	return view('employee.manage_sales',['title'=>$title ,'saleCount'=>$saleCount,'keyword'=>$keyword]);

    } 

    function countSaleAsperKeyword($keyword_id){
    	$q= Progress::where('keyword_id',$keyword_id)->get();
    	return count($q);
    }	

    function keywordDetail($keyword_id){
    	$q= Keyword::where('id',$keyword_id)->first();
    	return $q;
    }

}
