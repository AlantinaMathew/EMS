<?php

namespace App\Http\Controllers;
use App\Models\Fuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class FuelController extends Controller
{
    public function reg(Request $request){
        $em=$request->input('email');
        $string=implode(",",$request->input('place'));
       $log=Fuel::where('email',$em)
       
       ->count();
        if($log>0)
        {
            return redirect()->back()->with('message','user already exist'); 
        }else{
        $psw=$request->input('password');
        $cpsw=$request->input('password_confirmation');
        if($psw==$cpsw){
        $adduser=new Fuel();
        $adduser->name=$request->input('name');
        $adduser->email=$request->input('email');
        $adduser->phone=$request->input('phone');
        $adduser->place=$string;
        $adduser->password=$request->input('password');
        $adduser->save();
        return view('/log_fuel');
    }else{
        return redirect()->back()->with('message','Password should be same');
    }
}
    }
    public function log(Request $request){
        $em=$request->input('email');
        $ps=$request->input('password');
       $login=Fuel::where('email',$em)
       ->where('password',$ps)
       ->count();
       $logf=Fuel::where('email',$em)
       ->where('password',$ps)
       ->get();
        if($login>0)
        {
            
                $name = "FuelBuddy";
               // Session::put('name' , $name);
                session()->put('name',$name);
                session()->save();
                foreach($logf as $a)
                {
                    $lf= $a->id;
                    $petrol=$a->petrol_rs;
                    $disel=$a->disel_rs;
                }
                session()->put('fuel_id',$lf);
                session()->save();
                //$request->session()->put('loginid', $login[0]->email);
                return view('/dash_fuel',['petrol'=>$petrol,'disel'=>$disel]);
            
        }
        else
        {
            session()->flash('statusn',"Deleted");

            return redirect()->back()->with('status','Username or Password is wrong');
        }
    }
    public function dash(){
        $lf=session('fuel_id');
        $logf=Fuel::where('id',$lf)
    
        ->get();
         if($logf)
         {
             
                 
                 foreach($logf as $a)
                 {
                     
                     $petrol=$a->petrol_rs;
                     $disel=$a->disel_rs;
                 }
                
                 //$request->session()->put('loginid', $login[0]->email);
                 return view('/dash_fuel',['petrol'=>$petrol,'disel'=>$disel]);
    }}
    public function petrol(Request $request){
        echo "abhbkjbkjb";
        $lf=session('fuel_id');

        //echo($aa);
        $price=$request->input('petrol');
       $update=Fuel::where('id',$lf)->first();
       $update->petrol_rs=$price;
       $update->save();
     return $this->dash();
    }
    public function disel(Request $request){
        echo "abhbkjbkjb";
        $lf=session('fuel_id');
        $price=$request->input('disel');
       
        $update=Fuel::where('id','=',$lf)->first();
        $update->disel_rs=$price;
        $update->save();
    return $this->dash();
    }
}
