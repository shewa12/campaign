<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;

class Campaign extends Controller
{
    function index(){
    	$title= "Campaign";
    	return view("campaign/campaign",['title'=>$title]);
    }

    function createCampaign(){

    	$title= "Create Campaign";
    	return view("campaign/create_campaign",['title'=>$title]);    	
    }

    function faq(){
    	echo "faq";
    }

    function affiliate(){
    	echo "affiliate";
    }
}
