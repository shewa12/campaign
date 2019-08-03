<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;

class Campaign extends Controller
{
    function index(){
    	$title= "Campaign";
    	return view("campaign/campaign",['title'=>$title]);
    }
}
