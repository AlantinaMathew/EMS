<?php

namespace App\Http\Controllers;
use App\Models\repair;
use App\Models\User;
use App\Models\req_repair;
use App\Models\rep_loc;
use App\Models\rep_service;
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
        foreach($request->input('service') as $b){
            $addser=new Rep_service();
            $addser->rid=$id;
            $addser->service=$b;
            $addser->save();
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
       $logf=Repair::where('email',$em)
       ->where('password',$ps)
       ->get();
        if($login>0)
        {
            
                
               // Session::put('name' , $name);
                session()->put('rep_name',$em);
                session()->save();
                foreach($logf as $a)
                {
                    $lf= $a->id;
                   
                }
                session()->put('rep_id',$lf);
                session()->save();
                //$request->session()->put('loginid', $login[0]->email);
                return $this->dash();
            
        }
        else
        {
            session()->flash('statusn',"Deleted");

            return redirect()->back()->with('status','Username or Password is wrong');
        }
    }

    public function dash(){
        $lf=session('rep_id');

                
                $find=Req_repair::where('rid','=',$lf)->where('created_at', '>=', Carbon::now()->subDay())->get();
                            //dd($find);
            if(count($find)>0){
                $sql=Req_repair::join('tbl_repair','tbl_repair.id','=','tbl_req_rep.rid')
                ->join('users','users.id','=','tbl_req_rep.uid')
                ->where('tbl_req_rep.created_at', '>=', Carbon::now()->subDay())
                ->where('tbl_req_rep.rid','=',$lf)
                ->get(['tbl_req_rep.location','tbl_req_rep.status','tbl_req_rep.crnt_loc','tbl_req_rep.id','tbl_req_rep.place','tbl_req_rep.service','users.phone']);
                //dd($sql);
                if($sql){

                    return view('/dash_rep',['a'=>$sql]);
            }else{
                $b="failed";
                $find=[];
               return view('/dash_rep',['a'=>$find,'b'=>$b]);
            } 
                
            }else{
                $b="utter failed";
                $find=[];
                
                return view('/dash_rep',['a'=>$find,'b'=>$b]);
            }
            
            }

             public function GoMech(Request $request){
             $userID=auth()->user()->id;
                
            $service=$request->input('vehicle');
                
            $place=$request->input('place');
                
            session(['rep_loc' => $request->input('location')]);
               session(['rep_place' => $request->input('place')]);
             session(['rep_service' => $request->input('vehicle')]);
             session(['latitude' => $request->input('lat')]);
             session(['longitude' => $request->input('lng')]);
             session(['crnt' => $request->input('chk')]);
        
            //     // $sql=Fuel::where('place', 'like',$place)
            //     //     ->where('petrol_rs', '<>',NULL)
            //     //     ->get(['id']);
            //     //     dd($sql);
               

                    $find=Req_repair::where('uid',$userID)
                    ->where('tbl_req_rep.created_at', '>=', Carbon::now()->subDay())->count();
                    if($find>0){
                           
                            $sql=Repair::join('tbl_req_rep','tbl_req_rep.rid','<>','tbl_repair.id')
                            ->join('rep_loc','rep_loc.rid', '=','tbl_repair.id')
                            ->join('rep_service','rep_service.rid', '=','tbl_repair.id')
                            ->where('rep_loc.place', '=',$place)
                           ->where('tbl_repair.status','=','1')
                           ->where('rep_service.service','=',$service)
                            ->where('tbl_req_rep.created_at', '>=', Carbon::now()->subDay())
                            
                            ->get(['tbl_repair.id','rep_loc.place','rep_service.service','tbl_repair.phone','tbl_repair.name']);
                  }else{
                      
                        $sql=Repair::join('rep_loc','rep_loc.rid', '=','tbl_repair.id')
                        ->join('rep_service','rep_service.rid', '=','tbl_repair.id')
                        ->where('rep_loc.place', '=',$place)
                        ->where('tbl_repair.status','=','1')
                        ->where('rep_service.service','=',$service)->get(['tbl_repair.id','rep_loc.place','rep_service.service','tbl_repair.phone','tbl_repair.name']);
                        
                    }
                        if($sql)
                            {
                                return view('/replist',['a'=>$sql]);
                               
                            }  
                        
                
                  }
         public function req_rep($id){
           $location= session('rep_loc');
            $place=session('rep_place');
          $service=session('rep_service');
     
            
           
            
            $userID=auth()->user()->id;
    
            $latitude=session('latitude');
            $longitude=session('longitude');
            $c=session('crnt'); 
            
            $sql=new Req_repair();
            $sql->uid=$userID;
            $sql->rid=$id;
            $sql->place=$place;
            $sql->location=$location;
            $sql->longitude=$longitude;
            $sql->latitude= $latitude;
            $sql->crnt_loc=$c;
            $sql->service=$service;
           
            $sql->status=1;
            $sql->save();
            return $this->req_rep1();
    
                  
    }
    public function req_rep1(){
            
        $userID=auth()->user()->id;
    
       
    
    
        $find=Req_repair::join('tbl_repair','tbl_req_rep.rid','=','tbl_repair.id')
        ->where('tbl_req_rep.uid','=',$userID)
        ->where('created_at', '>=', Carbon::now()->subDay())
        ->get(['tbl_req_rep.location','tbl_req_rep.status','tbl_req_rep.place','tbl_req_rep.service','tbl_repair.phone','tbl_repair.name']);
       
            return view('/req_rep',['a'=>$find]);
           die();      
    }
                   
public function view_loc($id){
    $find=Req_repair::where('id',$id)->first()
    ->get(['latitude','longitude']);
    return view('/app_rep',['a'=>$find]);
}

    
public function req_decline_rep($id){
    $update= Req_repair::where('id','=',$id)->first();
    $update->status=0;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
}
public function req_accept_rep($id){
    $update= Req_repair::where('id','=',$id)->first();
    $update->status=2;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
}
public function req_cmplt_rep($id){
    $update= Req_repair::where('id','=',$id)->first();
    $update->status=3;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
   
}

public function rep_p_r(){
    $l=session('rep_id');
    $find=Req_repair::join('tbl_repair','tbl_repair.id','=','tbl_req_rep.rid')
    ->join('users','users.id','=','tbl_req_rep.uid')->where('tbl_req_rep.rid','=',$l)->where('tbl_req_rep.status', '=','1')->orderBy('id', 'DESC')
    
    ->get(['tbl_req_rep.location','tbl_req_rep.service','tbl_req_rep.status','tbl_req_rep.crnt_loc','tbl_req_rep.id','tbl_req_rep.place','users.phone']);    
                  
                return view('/dash_rep_p',['a'=>$find]);
               

}

public function rep_d_r(){
    $l=session('rep_id');
    $find=Req_repair::join('tbl_repair','tbl_repair.id','=','tbl_req_rep.rid')
    ->join('users','users.id','=','tbl_req_rep.uid')->where('tbl_req_rep.rid','=',$l)->where('tbl_req_rep.status', '=','0')->orderBy('id', 'DESC')
    
    ->get(['tbl_req_rep.location','tbl_req_rep.service','tbl_req_rep.status','tbl_req_rep.crnt_loc','tbl_req_rep.id','tbl_req_rep.place','users.phone']);    
                  
                return view('/dash_rep_d',['a'=>$find]);
               
}
public function rep_c_r(){
    $l=session('rep_id');
   
    $find=Req_repair::join('tbl_repair','tbl_repair.id','=','tbl_req_rep.rid')
    ->join('users','users.id','=','tbl_req_rep.uid')->where('tbl_req_rep.rid','=',$l)
                  ->where('tbl_req_rep.status', '=','2')->orWhere('tbl_req_rep.status', '=','3')->orWhere('tbl_req_rep.status', '=','4')->orderBy('id', 'DESC')
                  ->get(['tbl_req_rep.location','tbl_req_rep.service','tbl_req_rep.status','tbl_req_rep.crnt_loc','tbl_req_rep.id','tbl_req_rep.place','users.phone']);                //dd($find);
                return view('/dash_rep_c',['a'=>$find]);
               

}
public function rep_logout(){
    session()->forget('rep_id');
    session()->forget('rep_name');
    return view('/fuel_login');
        
}        
}
