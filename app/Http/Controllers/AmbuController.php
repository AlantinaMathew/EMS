<?php

namespace App\Http\Controllers;
use App\Models\req_ambu;
use App\Models\ambu;
use App\Models\user;
use Carbon\Carbon;
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
                return view('/ambu_login');

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

                $log=Ambu::where('email',$em)
                ->where('password',$ps)
                ->get('id');
                    if($login>0)
                    {
                    
                        
                            $name = 'ambulance';
                        // Session::put('name' , $name);
                            session()->put('name',$name);
                            session()->save();
                            foreach($log as $a)
                            {
                                $l= $a->id;
                            }
                            session()->put('ambu_id',$l);
                            session()->save();
                            //$request->session()->put('loginid', $login[0]->email);
                            $find=Req_ambu::where('aid','=',$l)->where('created_at', '>=', Carbon::now()->subDay())->get();
                            //dd($find);
                        if(count($find)>0){
                            $sql=Req_ambu::join('tbl_ambu','tbl_ambu.id','=','tbl_req_ambu.aid')
                            ->join('users','users.id','=','tbl_req_ambu.uid')
                            ->where('tbl_req_ambu.created_at', '>=', Carbon::now()->subDay())
                            ->where('tbl_req_ambu.aid','=',$l)
                            ->get(['tbl_req_ambu.location','tbl_req_ambu.status','tbl_req_ambu.id','tbl_ambu.place','users.phone']);
                            if($sql){
                                return view('/dash_ambu',['a'=>$sql]);
                        }else{
                            
                            $find=[];
                            return view('/dash_ambu',['a'=>$find]);
                        } 
                            
                        }else{
                        
                            $find=[];
                            return view('/dash_ambu',['a'=>$find]);
                        }
                
                        
                            
                        
                    }
                    else
                    {
                        session()->flash('statusn',"Deleted");

                        return redirect()->back()->with('status','Username or Password is wrong');
                    }
                
                }
    public function ambulist(Request $request){
        $userID=auth()->user()->id;
        $pl=$request->input('place');
       
        session(['ambu_loc' => $request->input('location')]);
        session(['latitude' => $request->input('lat')]);
        session(['longitude' => $request->input('lng')]);
        session(['crnt' => $request->input('chk')]);
        $find=Req_ambu::where('uid',$userID)
        ->where('tbl_req_ambu.created_at', '>=', Carbon::now()->subDay())->count();
       if($find>0){
       
        $sql=Ambu::join('tbl_req_ambu','tbl_req_ambu.aid','<>','tbl_ambu.id')
        ->where('tbl_ambu.place','=',$pl)
       ->where('tbl_ambu.status','=','1')
       ->where('tbl_req_ambu.status','<>','2')
        ->where('tbl_req_ambu.created_at', '>=', Carbon::now()->subDay())
        
        ->get(['tbl_ambu.id','tbl_ambu.place','tbl_ambu.vehicle_num','tbl_ambu.phone','tbl_ambu.email']);
       return view('/ambulist',['a'=>$sql]);
            }else{
                $sql=Ambu::where('place','=',$pl)
                    ->where('status','=','1')->get();
                   return view('/ambulist',['a'=>$sql]);  
                }

                }
    public function req_ambu($id){
        
        $userID=auth()->user()->id;

        $loc=session('ambu_loc');
        $latitude=session('latitude');
        $longitude=session('longitude');
        $c=session('crnt'); 
        $sql=new Req_ambu();
        $sql->uid=$userID;
        $sql->aid=$id;
        $sql->location=$loc;
        $sql->longitude=$longitude;
        $sql->latitude= $latitude;
        $sql->crnt_loc=$c;
        $sql->status=1;
        $sql->save();
    

        $find=Req_ambu::join('tbl_ambu','tbl_req_ambu.aid','=','tbl_ambu.id')
        ->where('tbl_req_ambu.uid','=',$userID)
        ->where('created_at', '>=', Carbon::now()->subDay())->get(['tbl_req_ambu.location','tbl_req_ambu.status','tbl_ambu.place','tbl_ambu.vehicle_num','tbl_ambu.phone']);
       
            return view('/req_ambu',['a'=>$find]);
           die();      
}
public function req_ambu1(){
        
    $userID=auth()->user()->id;

   


    $find=Req_ambu::join('tbl_ambu','tbl_req_ambu.aid','=','tbl_ambu.id')
    ->where('tbl_req_ambu.uid','=',$userID)
    ->where('created_at', '>=', Carbon::now()->subDay())->get(['tbl_req_ambu.location','tbl_req_ambu.status','tbl_ambu.place','tbl_ambu.vehicle_num','tbl_ambu.phone']);
   
        return view('/req_ambu',['a'=>$find]);
       die();      
}
public function dash(){
    $l=session('ambu_id');
    $find=Req_ambu::where('aid','=',$l)->where('created_at', '>=', Carbon::now()->subDay())->get();
                //dd($find);
               if(count($find)>0){
                   $sql=Req_ambu::join('tbl_ambu','tbl_ambu.id','=','tbl_req_ambu.aid')
                   ->join('users','users.id','=','tbl_req_ambu.uid')
                   ->where('tbl_req_ambu.created_at', '>=', Carbon::now()->subDay())
                   ->where('tbl_req_ambu.aid','=',$l)
                   ->get(['tbl_req_ambu.location','tbl_req_ambu.status','tbl_req_ambu.id','tbl_ambu.place','users.phone']);
                   if($sql){
                    return view('/dash_ambu',['a'=>$sql]);
            }else{
                $b="failed";
                $find=[];
                return view('/dash_ambu',['a'=>$find,'b'=>$b]);
            } 
                   
               }else{
                $b="utter failed";
                $find=[];
                return view('/dash_ambu',['a'=>$find,'b'=>$b]);
               }
}

public function req_decline_ambu($id){
    $update= Req_ambu::where('id','=',$id)->first();
    $update->status=0;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
}
public function req_accept_ambu($id){
    $update= Req_ambu::where('id','=',$id)->first();
    $update->status=2;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
}
public function req_cmplt_ambu($id){
    $update= Req_ambu::where('id','=',$id)->first();
    $update->status=3;
    $update->updated_at=Carbon::now();
    $update->save();
    return $this->dash();
   
}
}
   