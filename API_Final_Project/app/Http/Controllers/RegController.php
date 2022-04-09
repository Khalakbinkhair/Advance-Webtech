<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;
use Sentinel;
use Reminder;
use Mail;

class RegController extends Controller
{
    public function reg(){
        return view('registration');
    }
   
    public function regsubmit(Request $req){
        // $req->file('file')->getClientOriginalName();
   
    
        $req->validate(
            [
            'name'=> 'required|regex:/^[A-Z a-z]+$/',
            'userid'=> 'unique:registrations,userid|regex:/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/',
            'email'=> 'required',
            
            'address'=> 'required',
            'password'=> 'required|min:4',
            'cpassword'=> 'required|same:password',
            'gender'=>'required',
            'usertype'=>'required',
            'file'=>'mimes:png,jpg',
            'session'=>'required',
            'blood_group'=>'required'

           
       
            ],
            [
                "name.required"=>"Enter your Name",
                "userid.required"=>"Enter your UserId",
                "address.required"=>"Enter your Address"
            ]
            ); 

         
    //  $file= $req->file('file')->store('images');

  
     $f_name=$req->name.time().'.'.$req->file('file')->getClientOriginalName();
     $file= $req->file('file')->move('images',$f_name);

         $user =new registration();
         $user->name= $req->name;
         $user->userid= $req->userid;
         $user->email= $req->email;
         $user->address= $req->address;
         $user->password= md5($req->password);
         $user->cpassword= md5($req->cpassword);
         $user->gender = $req->gender;
         $user->usertype=$req->usertype;
         $user->blood_group=$req->blood_group;
         $user->session=$req->session;
         $user->file=$f_name;
        
         $user->save();



      
         return redirect()->route('login');
    }

    public function login(){
        return view('login');
    }
    public function logsubmit(Request $req){





        $user= registration::where ("userid",$req->userid)
        ->where('password',md5($req->password))
        ->where('usertype','=','Student')
        ->first();
  
        

        if($user)
        {
            $req->session()->put('userid',$user->userid);
            $req->session()->put('name',$user->name);
         
          




           $req->session()->flash('msg',"Login Successful");
            return view('dashboard')
            ->with('user',$user);
         
            
        }
        else{
           session()->flash('msg',"userID password invalid");
            return redirect()->route('login');
        }
      


    }
    public function logout(){
          
        session()->flush();
        return redirect()->route('login');
    }
    public function profile(){

     

        $name=session()->get('userid');    
        $info=registration::where('userid',$name)->first(); 
      

        return view('profile.profile')
        ->with('info',$info);

    } 
    public function edit(){

     
        $name=session()->get('userid');    
        $info=registration::where('userid',$name)->first(); 


        return view('profile.edit')
        ->with('info',$info);
 

    } 

   
    public function editsub(Request $req){

     
    
    
        $req->validate(
            [
            'name'=> 'required|regex:/^[A-Z a-z]+$/',
         
            'email'=> 'required',
            
            'address'=> 'required',
         
           
        
        
            'file'=>'mimes:png,jpg'
           
       
            ],
            [
                "name.required"=>"Enter your Name",
            
                "address.required"=>"Enter your Address"
            ]
            ); 

         

            $f_name=$req->name.time().'.'.$req->file('file')->getClientOriginalName();
            $file= $req->file('file')->move('images',$f_name);

      
         $userid=session()->get('userid');    
         $store=registration::where('userid',$userid)->first();

         
      
         $store->name= $req->name;
         $store->userid= $req->userid;
         $store->email= $req->email;
         $store->address= $req->address;
         $store->password= $req->password;
         $store->cpassword= $req->cpassword;
         $store->gender = $req->gender;
         $store->usertype=$req->usertype;
         $store->file=$f_name;
        
         $store->save();



        
      
         return redirect()->route('profile');
 

    } 
    public function forgot_password(){

     
return view('forgotpassword');

    } 
    public function forgot_pass(Request $req){
   

   $user= registration::where('email',($req->email))->first();
   if($user==null){
       return redirect()->back()->with(['error'=>'Existing Email Unvalid']);
   }
        
   $user= Sentinel::authenticate(array(
    'email'    => $req->email,
));

   $reminder= Reminder:: exists($user)? :Reminder::create($user);
   $this->sendEmail($user,$reminder->code);


   return redirect()->back()->with(['success'=>"Reset code sent to your email"]);
            } 
        
public function sendEmail($user, $code){
Mail::send(
    'email.forgot',
    ['user'=>$user,'code'=>$code],
    function($message) use ($user){

        $message->to($user->email);
        $message->subject("$user->name,Reset Your password");
    }
);


 }

}
