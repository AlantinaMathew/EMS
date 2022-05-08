<?php

namespace App\Http\Controllers;
use App\Models\Repair;
use App\Models\User;
use App\Models\Req_repair;
use App\Models\Rep_loc;
use App\Models\Rep_service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RepairController extends Controller
{
    public function reg(Request $request){
        $em=$request->input('email');
        
       $log=Repair::where('email',$em)
       
       ->count();
        if($log>0)
        {
            return redirect()->back()->with('message','user already exist'); 
        }else{
        $psw=$request->input('password');
        $cpsw=$request->input('password_confirmation');
        if($psw==$cpsw){
        $adduser=new Repair();
        $adduser->name=$request->input('name');
        $adduser->email=$request->input('email');
        $adduser->phone=$request->input('phone');
       
        $adduser->password=$request->input('password');
        $adduser->save();

        $id=$adduser->id;
        foreach($request->input('place') as $a){
             $addloc=new Rep_loc();
             $addloc->rid=$id;
             $addloc->place=$a;
             $addloc->save();
        }
        foreach($request->input('service') as $a){
            $addloc=new Rep_service();
            $addloc->rid=$id;
            $addloc->service=$a;
            $addloc->save();
       }
        return view('/repair_login');
    }else{
        return redirect()->back()->with('message','Password should be same');
    }
   
    }
    }
      
    
    public function log(Request $request){
        $em=$request->input('email');
        $ps=$request->input('password');
       $login=Repair::where('email',$em)
       ->where('password',$ps)
       ->count();
        if($login>0)
        {
            
                $name = "GoMechanic";
               // Session::put('name' , $name);
                session()->put('name',$name);
                session()->save();
                //$request->session()->put('loginid', $login[0]->email);
                return redirect('/admindash');
            
        }
        else
        {
            session()->flash('statusn',"Deleted");

            return redirect()->back()->with('status','Username or Password is wrong');
        }
    }
}
