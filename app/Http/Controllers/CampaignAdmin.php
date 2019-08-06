<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use admin\Campaign as camp ;
use admin\Keyword;
use admin\User;
class CampaignAdmin extends Controller
{

    function getCampaigns(){
        $q= camp::select('campaign.*','users.id as userId','users.name')
                ->leftJoin('users','users.id','=','campaign.employee_id')
                ->orderBy('users.id','desc')
                ->paginate(10);
                    
        return $q;
    }     

    function getKeywordForCamp($camp_id){
        $keywords= Keyword::where('campaign_id',$camp_id)
                    ->orderBy('id','desc')
                    ->get();        
        $campaign= camp::where('id',$camp_id)
                    ->get();
        $title= "Campaign Keywords";

        return view('campaign.campaign_detail',['title'=>$title, 'keywords'=>$keywords,'campaign'=>$campaign]);
                
    }    

    function campaignSingle($user_id){
        $q= camp::where('user_id',$user_id)
                    ->orderBy('id','desc')
                    ->limit(1)
                    ->first();
        return $q;
    }


}
