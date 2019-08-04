<?php

namespace admin\Http\Controllers;

use Illuminate\Http\Request;

class Employee extends Controller
{
    function index(){
    	$title= "Employee";
    	return view("employee/employee",['title'=>$title]);
    }
}
