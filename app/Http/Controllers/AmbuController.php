<?php

namespace App\Http\Controllers;
use App\Models\ambu;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class AmbuController extends Controller
{
    public function reg(Request $request){

        $em=$request->input('email');
        
       $log=Ambu::where('email',$em)
       
       ->count();
        if($log>0)
        {
            return redirect()->back()->with('message','user already exist'); 
        }else{
       
        $psw=$request->input('password');
        $cpsw=$request->input('password_confirmation');
        if($psw==$cpsw){
        $adduser=new Ambu();
        
        $adduser->email=$request->input('email');
        $adduser->password=$request->input('password');
        $adduser->vehicle_num=$request->input('vehicleno');
        $adduser->license_num=$request->input('licenseno');
        $adduser->phone=$request->input('phone');
        $adduser->place=$request->input('place');
        
        $adduser->save();
        return redirect('/log_ambu');

    }else{
        return redirect()->back()->with('message','Password should be same');
    }
}
    }
    public function log(Request $request){
        $em=$request->input('email');
        $ps=$request->input('password');
       $login=Ambu::where('email',$em)
       ->where('password',$ps)
       ->count();
        if($login>0)
        {
            
                $name = 'ambulance';
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
    public function ambulist(Request $request){
    
        $pl=$request->input('place');
        $sql=Ambu::where('place',$pl)
        ->where('status','=','1')
        ->get();
        $count=Ambu::where('place',$pl)->where('status','=','1')->count();
        if($count>0){
            return view('/ambulist',['a'=>$sql]);
            die();
        }else{
            return view('/ambulist',['a'=>$sql]);
        }

    }
    public function req_ambu($id){

        echo 'User ID = '. $id. "<br />";
       
}

}
   