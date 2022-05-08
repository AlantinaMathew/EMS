<?php

namespace App\Http\Controllers;
use App\Models\Fuel;
use App\Models\User;
use App\Models\Req_fuel;
use App\Models\Fuel_loc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class FuelController extends Controller
{
    public function reg(Request $request){
        $em=$request->input('email');
        //$string=implode(",",$request->input('place'));
        
           
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
        $adduser->password=$request->input('password');
        $adduser->save();

        $id=$adduser->id;
        foreach($request->input('place') as $a){
             $addloc=new Fuel_loc();
             $addloc->fid=$id;
             $addloc->place=$a;
             $addloc->save();
        }
        return view('/fuel_login');
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
                    
        }
        
        $find=Req_fuel::where('fid','=',$lf)->where('created_at', '>=', Carbon::now()->subDay())->get();
                    //dd($find);
                if(count($find)>0){
                    $sql=Req_fuel::join('tbl_fuel','tbl_fuel.id','=','tbl_req_fuel.fid')
                    ->join('users','users.id','=','tbl_req_fuel.uid')
                    ->where('tbl_req_fuel.created_at', '>=', Carbon::now()->subDay())
                    ->where('tbl_req_fuel.fid','=',$lf)
                    ->get(['tbl_req_fuel.location','tbl_req_fuel.status','tbl_req_fuel.id','tbl_req_fuel.place','tbl_req_fuel.fuel','users.phone']);
                    //dd($sql);
                    if($sql){

                        return view('/dash_fuel',['petrol'=>$petrol,'disel'=>$disel,'a'=>$sql]);
                }else{
                    $b="failed";
                    $find=[];
                   return view('/dash_fuel',['petrol'=>$petrol,'disel'=>$disel,'a'=>$find,'b'=>$b]);
                } 
                    
                }else{
                    $b="utter failed";
                    $find=[];
                    
                    return view('/dash_fuel',['petrol'=>$petrol,'disel'=>$disel,'a'=>$find,'b'=>$b]);
                }
                
                }
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
    
    
    
    public function fuelBuddy(Request $request){
        $userID=auth()->user()->id;
        
        $fuel=$request->input('fuel');
        
        $place=$request->input('place');
        
        session(['fuel_loc' => $request->input('location')]);
        session(['fuel_place' => $request->input('place')]);
        session(['fuel_type' => $request->input('fuel')]);

        // $sql=Fuel::where('place', 'like',$place)
        //     ->where('petrol_rs', '<>',NULL)
        //     ->get(['id']);
        //     dd($sql);
       
            $find=Req_fuel::where('uid',$userID)
            ->where('tbl_req_fuel.created_at', '>=', Carbon::now()->subDay())->count();
            if($find>0){
                   if($fuel=='Petrol'){
                    $sql=Fuel::join('tbl_req_fuel','tbl_req_fuel.fid','<>','tbl_fuel.id')
                    ->join('fuel_loc','fuel_loc.fid', '=','tbl_fuel.id')
                    ->where('fuel_loc.place', '=',$place)
                   ->where('tbl_fuel.status','=','1')
                   ->where('tbl_fuel.petrol_rs','<>',0.00)
                    ->where('tbl_req_fuel.created_at', '>=', Carbon::now()->subDay())
                    
                    ->get(['tbl_fuel.id','fuel_loc.place','tbl_fuel.petrol_rs','tbl_fuel.phone','tbl_fuel.name']);
                   }else{
                    $sql=Fuel::join('tbl_req_fuel','tbl_req_fuel.fid','<>','tbl_fuel.id')
                    ->join('fuel_loc','fuel_loc.fid', '=','tbl_fuel.id')
                    ->where('fuel_loc.place', '=',$place)
                   ->where('tbl_fuel.status','=','1')
                   ->where('tbl_fuel.disel_rs','<>',0.00)
                    ->where('tbl_req_fuel.created_at', '>=', Carbon::now()->subDay())
                    
                    ->get(['tbl_fuel.id','fuel_loc.place','tbl_fuel.disel_rs','tbl_fuel.phone','tbl_fuel.name']);
                   }

            }else{
                if($fuel=='Petrol'){
                $sql=Fuel::join('fuel_loc','fuel_loc.fid', '=','tbl_fuel.id')
                ->where('fuel_loc.place', '=',$place)
                        ->where('tbl_fuel.petrol_rs', '<>',0.00)
                        ->where('tbl_fuel.status','=','1')->get(['tbl_fuel.id','fuel_loc.place','tbl_fuel.petrol_rs','tbl_fuel.phone','tbl_fuel.name']);
                }else{
                    $sql=Fuel::join('fuel_loc','fuel_loc.fid', '=','tbl_fuel.id')
                   ->where('fuel_loc.place', '=',$place)
                        ->where('tbl_fuel.disel_rs', '<>',0.00)
                        ->where('tbl_fuel.status','=','1')->get(['tbl_fuel.id','fuel_loc.place','tbl_fuel.disel_rs','tbl_fuel.phone','tbl_fuel.name']);
                }
            }
                if($sql)
                    {
                        return view('/fuellist',['a'=>$sql,'fuel'=>$fuel]);
                       
                    }  
                
        
          }



   public function req_fuel($id){
            $fuel=session('fuel_type');
            
            if($fuel=='Petrol'){
            $price1=Fuel::where('id','=',$id)->get(['petrol_rs']);
            foreach($price1 as $a)
            {
                $price= $a->petrol_rs;
            }
            }else{
                $price1=Fuel::where('id','=',$id)->get(['disel_rs']);
                foreach($price1 as $a)
            {
                $price= $a->petrol_rs;
            }  
            }
            
            $userID=auth()->user()->id;
    
            $loc=session('fuel_loc');
            $place=session('fuel_place');
            
            $sql=new Req_fuel();
            $sql->uid=$userID;
            $sql->fid=$id;
            $sql->place=$place;
            $sql->location=$loc;
            $sql->fuel=$fuel;
            $sql->price=$price;
            $sql->status=1;
            $sql->save();
            return $this->req_fuel1();
    
                  
    }
    public function req_fuel1(){
            
        $userID=auth()->user()->id;
    
       
    
    
        $find=Req_fuel::join('tbl_fuel','tbl_req_fuel.fid','=','tbl_fuel.id')
        ->where('tbl_req_fuel.uid','=',$userID)
        ->where('created_at', '>=', Carbon::now()->subDay())
        ->get(['tbl_req_fuel.location','tbl_req_fuel.status','tbl_req_fuel.place','tbl_req_fuel.fuel','tbl_req_fuel.price','tbl_fuel.phone','tbl_fuel.name']);
       
            return view('/req_fuel',['a'=>$find]);
           die();      
    }
 
 
public function req_decline_fuel($id){
    $update= Req_Fuel::where('id','=',$id)->first();
    $update->status=0;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
}
public function req_accept_fuel($id){
    $update= Req_Fuel::where('id','=',$id)->first();
    $update->status=2;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
}
public function req_cmplt_fuel($id){
    $update= Req_Fuel::where('id','=',$id)->first();
    $update->status=3;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
   
}

}
