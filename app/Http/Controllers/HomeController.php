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
use admin\Post;
use admin\Campaign;
use PDF;
use admin\Http\Controllers\CampaignAdmin as camp;
use admin\Http\Controllers\Users;
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
        //getting auth user role
        $role= Auth::user()->role;
        $title= "Dashboard";
        if($role===1){
            //if user
            
            return redirect()->route('campaign');
        }
        if($role===2){
            //if employee
            return redirect()->route('employee');
        }
        else{
            $employee= new Users;
            $camp= new camp; 
                     
            return view('admin/dashboard')->with(['title'=>$title,'campaigns'=>$camp->getCampaigns(),'employee'=>$employee->getAllusers()]);            
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

         $password= Auth::user()->password;//get pass for current user

        if (Hash::check($request->old_password, $password)) {
                $update= User::where('id',Auth::id())
                            ->update(['password'=>bcrypt($request->password)]);
                if($update){
                    return redirect()->back()->with('success',"Password updated!");
                }    
                else{
                    return redirect()->back()->with('fail',"Password could not update!");
                }                          

        }

        else{
 
            return redirect()->route('changePassword')->with('fail',"Old password  not matched!");
        }
    }    
    
    function bankDetail(){
        $title="Bank Detail";
        $post= $this->getPost('bank');
        return view('admin/bank_detail',['title'=>$title,'post'=>$post]);
    } 

    function affiliateManage(){
        $title="Affiliate Manage";
        $post= $this->getPost('affiliate');
        return view('admin/affiliate_manage',['title'=>$title,'post'=>$post]);

    }

    function faqManage(){
        $title="Faq Manage";
        $post= $this->getPost('faq');
        return view('admin/faq_manage',['title'=>$title,'post'=>$post]);

    } 

    function getPost($type){
        $q= Post::where('type',$type)->first();
        return $q;
        
    }
    function updateBank(Request $request){
        $q= Post::where('type','bank')
                ->update(['content'=>$request->content]);
        if($q){
            return redirect()->back()->with('success',"Bank detail udpated!");
        }         
        else{
            return redirect()->back()->with('fail',"Bank detail udpate failed!");
        }
    }     

    function updateAffiliate(Request $request){
        $q= Post::where('type','affiliate')
                ->update(['content'=>$request->content]);
        if($q){
            return redirect()->back()->with('success',"Bank detail udpated!");
        }         
        else{
            return redirect()->back()->with('fail',"Bank detail udpate failed!");
        }
    }     

    function updateFaq(Request $request){
        $q= Post::where('type','faq')
                ->update(['content'=>$request->content]);
        if($q){
            return redirect()->back()->with('success',"Bank detail udpated!");
        }         
        else{
            return redirect()->back()->with('fail',"Bank detail udpate failed!");
        }
    }

    function updatePaymentStatus($id){
        $q= Campaign::where('id',$id)
                ->update(['payment_status'=>1]);
    }   
}
