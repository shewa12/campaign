<?php
 
namespace admin\Http\Controllers;
//auth package for authentication 
//use admin\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;//for file upload
use admin\Worklog ;
use admin\User;
use PDF;
class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(){
        return view('admin.test');
    }
    public function index()
    {


        $title= "Dashboard";
                        
        return view('admin/dashboard')->with(['title'=>$title]);
    }

    function workLog(){
        $title= "work-log";
        $id= Auth::id();
        $date= date('Y-m-d');
        $worklog= worklog::where('user_id',$id)
                        ->where('created_at',$date)
                        ->orderBy('id', 'desc')
                        ->get();        
        return view('admin/worklog')->with(['title'=>$title,'worklog'=>$worklog]);
    }

    function saveWorklog(Request $request){
        $date= date('Y-m-d');

        $data= [
            'hour'=>$request->hour,
            'title'=>$request->title,
            'description'=>$request->detail
            ];
        $worklog= worklog::where(['hour'=>$request->hour,'created_at'=>$date])
            ->count();
        if($worklog >0){
            return redirect()->route('workLog')->with('fail',"You have aleary entered this hour!");
        }
        $worklog= new Worklog([
            'user_id' => Auth::id(),//getting active id
            'hour'=>$request->hour,
            'title'=>$request->title,
            'description'=>$request->detail
            ]);

        $worklog->save();
        return redirect()->route('workLog')->with('success', "data saved successfully!");   
      
    }

    function updateWorklog(Request $request){
        $worklog= Worklog::where('id',$request->id)
                          ->update(['hour'=>$request->hour,'title'=>$request->title,'description'=>$request->detail]) ;
        if($worklog){

            return redirect()->route('workLog')->with('success',"Data updated successfully!");
        }
        else{
            return redirect()->route('workLog')->with('fail',"Data not updated!");

        }
    }
    function deleteWorklog($id){
       $worklog= Worklog::where('id', $id)
                        ->delete();
        if($worklog){
            echo json_encode("Deleted");
        }          
        else{
            echo json_encode("not found");
        }      
    }

    function downloadPDF(){
        $data="hello";
        $pdf = PDF::loadView('admin.htmltopdfview',compact('data',$data));
      
        return $pdf->stream('invoice.pdf'); //stream is use for preview    
        //return $pdf->download('invoice.pdf');  //download is for direct download   

    }   

    function setting(){
        $id= Auth::id();
        $user=  user::all()->where('id',$id)->first();//fetching single row
                            
        return view('setting')->with(['user'=>$user]);
    }
    function updateAccount(Request $request){
        $dir= "uploads";
        //echo $request->user()->id; getting current user id 
       
        if(empty($request->file('image'))){
            $id= Auth::id();
            $user=  user::where('id',$id)
                            ->update([

                            'name'=>$request->name,
                            'email'=>$request->email,
                            'image'=>$request->img,
                            'image_path'=>$request->img_path,
                            'about'=>$request->about,
                            //'password'=>$request->password,
                            'role'=>"0"
                            ]);

 
            if($user){
               
               return redirect()->route('setting')->with('success',"Information has updated!");                
            }
        }
        else{
        if($request->hasFile('image')){

            if($request->file('image')->isValid()){
 
               if( $request->file('image')->storeAs("avatars", $request->file('image')->getClientOriginalName())){
                    $id= Auth::id();
                    $user=  user::where('id',$id)
                        ->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'about'=>$request->about,
                        'image'=>$request->file('image')->getClientOriginalName(),//retrieve filename
                        'image_path'=>$request->file('image')->path(),//retrieve file path
                        //'password'=>$request->password,
                        'role'=>"0"
                        ]);

                    if($user){
                        
                       return redirect()->route('setting')->with('success',"Information has updated!");                        
                    }
                    else{
                        echo "data could not saved";
                        return redirect()->route('setting')->with('fail',"Information could not update!");
                       }


               }
               
               }

                 
            }            
        }
   

       
    }
//change password
    function changePassword(){
        return view('change_password');
    }  

    function updatePassword(Request $request){


        $this->validate($request, [
           'old_password' => 'required',
           'password' => 'required|min:6|confirmed',
           
            ]);

         $password= Auth::user()->password ."<br>";//get pass for current user
      


        if (!Hash::check($request->old_password, $password)) {
               return redirect()->route('changePassword')->with('fail',"Old password not matched!");

        }

        else{
            $request->user()->fill([
                'password' => Hash::make($request->password)
            ])->save();  
            return redirect()->route('changePassword')->with('fail',"Password Changed!");

            }            
        }

     
}
