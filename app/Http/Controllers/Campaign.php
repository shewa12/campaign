<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use admin\Campaign as camp ;
use admin\Keyword;
use admin\Progress;

class Campaign extends Controller
{
    function index(){
    	$title= "Campaign";
    	return view("campaign/campaign",['title'=>$title,'campaigns'=>$this->getCampaigns(Auth::id())]);
    }


    function createCampaign(){

    	$title= "Create Campaign";
    	return view("campaign/create_campaign",['title'=>$title]);    	
    }

    function saveCampaign(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'asin'=>'required',
            'product_link'=>'required|url',
            'full_price'=>'required|numeric',
            'keyword'=>'required',
            'perday_sale'=>'required',
            'product_page'=>'required',
            'duration'=>'required'
        ]);

        $campaign= [
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'asin'=>$request->asin,
            'product_link'=>$request->product_link,
            'full_price'=>$request->full_price
        ];


        if($this->campaignCreation($campaign)===true){
            $campaignSingle= $this->campaignSingle(Auth::id());
            $campaign_id= $campaignSingle->id;

            $count= count($request->keyword);
            for ($i=0; $i<$count ; $i++) { 
                $keywords= [
                    'campaign_id'=>$campaign_id,
                    'keyword'=>$request->keyword[$i],
                    'perday_sale'=>$request->perday_sale[$i],
                    'product_page'=>$request->product_page[$i],
                    'duration'=>$request->duration[$i]
                ];
                try{
                    if($this->keywordCreation($keywords)!==true){
                        throw new Exception("keyword creation failed");
                        
                    }
                }
                catch(Exception $e){
                    echo "Exception at $i";
                }
                echo PHP_EOL;
                             
            }
            return redirect()->route('campaign')->with('success',"Campaign created successfully!");
        }
        else{
            return redirect()->back()->with('fail',"Campaign creation failed");
        }

    }

    function getCampaigns($user_id){
        $q= camp::where('user_id',$user_id)
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


    function campaignCreation($data){
        $q= new camp($data);
        if($q->save()){
            return true;
        }
    }    

    function keywordCreation($data){
        $q= new Keyword($data);
        if($q->save()){
            return true;
        }
    }

    function campaignSales($keyword_id){
        $title ="Campaign Sale";
        $saleCount= $this->countSaleAsperKeyword($keyword_id);
        $keyword= $this->keywordDetail($keyword_id);
        $progress= $this->getProgressForKeyword($keyword_id);

        return view('campaign.campaign_sales',['title'=>$title ,'saleCount'=>$saleCount,'keyword'=>$keyword,'progress'=>$progress]);

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

    function faq(){
    	echo "faq";
    }

    function affiliate(){
    	echo "affiliate";
    }
}
