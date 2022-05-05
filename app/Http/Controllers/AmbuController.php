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

       $log=Ambu::where('email',$em)
       ->where('password',$ps)
       ->get(['id']);
        if($login>0)
        {
            session()->put('ambu_id',$log);
            session()->save();
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
        $userID=auth()->user()->id;
        $pl=$request->input('place');
        session(['ambu_loc' => $request->input('location')]);
        $find=Req_ambu::where('uid',$userID)
        ->where('tbl_req_ambu.created_at', '>=', Carbon::now()->subDay())->count();
       if($find>0){
       
        $sql=Ambu::join('tbl_req_ambu','tbl_req_ambu.aid','<>','tbl_ambu.id')
        ->where('tbl_ambu.place','=',$pl)
       ->where('tbl_ambu.status','=','1')
       
        ->where('tbl_req_ambu.created_at', '>=', Carbon::now()->subDay())
        
        ->get(['tbl_ambu.id','tbl_ambu.place','tbl_ambu.vehicle_num','tbl_ambu.phone','tbl_ambu.email']);
}else{
    $sql=Ambu::where('place','=',$pl)
        ->where('status','=','1')->get();}
    if($sql)
        {
            return view('/ambulist',['a'=>$sql]);
           
        }  
      

    }
    public function req_ambu($id){
        
        $userID=auth()->user()->id;

        $loc=session('ambu_loc');
        $sql=new Req_ambu();
        $sql->uid=$userID;
        $sql->aid=$id;
        $sql->location=$loc;
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
    $id=session('ambu_id');
    $find=Req_ambu::where('aid','=',$id)->where('created_at', '>=', Carbon::now()->subDay())->where('status', '=', 1)->count();
    if($find>0){

    }
}



}
   