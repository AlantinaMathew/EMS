<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function log(Request $request){
        $em=$request->input('email');
        $ps=$request->input('password');
       $login=Admin::where('email',$em)
       ->where('password',$ps)
       ->count();
        if($login>0)
        { 
            
                $name = 'admin';
               // Session::put('name' , $name);
                session()->put('name',$name);
                session()->save();
                //$request->session()->put('loginid', $login[0]->email);
                return redirect('/admindash');
            
        }
        else
        {
            session()->flash('statusn',"Deleted");

            return redirect()->back()->with('status', 'Login Failed!! Invalid Username or Pasword');
        }
      
    }
}
