<?php

namespace App\Http\Controllers;
use App\Models\DonorReg;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Stevebauman\Location\Facades\Location;
class MainController extends Controller
{

  
  public static function pswd(Request $request){
    
    $userID=auth()->user()->id;
    $find=  User::where('id',$userID)
    ->get();

    //dd($find);
  echo($find);
    //dd($find);
    // if($find){
    //   // $update=  User::where('id',$userID)->first();
      // $update->password =Hash::make($request->input('password1'));
      // $update->save();
     
      // if($update){
        
      //   return view('/change_password');
      //   die();
      // }else{
       
      //   return redirect()->back()->with('message','Error!!Try again');
      // }
      
  // }else{
    
  //   //$sql=  DonorReg::where('uid','=',$userID)->get();
  //    return redirect()->back()->with('message','Password is Incorrect');
  // }
    
  }

    public function registerdonor(Request $request) {
        //dd($request);
        $request->validate([
          'dob' => ['required'],
          'med' => ['required'],
          'kg' => ['required','numeric'],
          'gender' =>['required'],
          'bloodgrp' => ['required'],
      ]);
      $birthDate=$request->input('dob');
      $age = \Carbon\Carbon::parse($birthDate)->age;
      $medi=$request->input('med');
      $weight=$request->input('kg');
      $interest=$request->input('grole');
      if($age>=18 && $medi=='No' && $weight>='40' && $interest=='Yes'){
        $id = auth()->user()->id;
        $donor = new DonorReg;
        $donor->uid = $id;
        $donor->dob = $request->input('dob');

        $donor->medlyf = $request->input('med');
        $donor->weight = $request->input('kg');
        $donor->gender = $request->input('gender');
        $donor->donor = $request->input('grole');
        $donor->bloodgrp = $request->input('bloodgrp');
        $donor->status = "1";
        $donor->save();
        echo '<script>alert("Mes")</script>';
        return redirect('/');
        
      }
      else{
        if($age<18){
          echo '<script>alert("Not Eligible!!age is below 18")</script>';
          return redirect()->back()->with('message','Not Eligible!!age is below 18');
        }elseif($medi=='Yes'){
          echo '<script>alert("Not Eligible!!You are taking medicine")</script>';
          return redirect()->back()->with('message','Not Eligible!!You are taking medicine');
        }elseif($weight<'40'){
          echo '<script>alert("Not Eligible!!weight is below 40")</script>';
          return redirect()->back()->with('message','Not Eligible!!weight is below 60');
        }elseif($interest=='No'){
          echo '<script>alert("Not Eligible!!coz you are not interested")</script>';
          return redirect()->back()->with('message','Not Eligible!!coz you are not interested');
        }else{
          echo '<script>alert("Error !!Try Again")</script>';
          return redirect()->back()->with('message','Error !!Try Again');
        }
        
        
      }
        
        }
        public function searchdonor(Request $request) {
           $userID=auth()->user()->id;
          $request->validate([
            'place' => ['required'],
            'bloodgrp' => ['required'],
            
        ]);
          $place=$request->input('place');
          $blood=$request->input('bloodgrp');
          $altblood='O Negative';
          //$userID=auth()->user()->id;
          $donor=DonorReg::join('users', 'users.id', '=', 'tbl_donor.uid')
          ->where([['users.place','=', $place],['users.id','<>', $userID],['tbl_donor.status','=','1'],['tbl_donor.bloodgrp','=',$blood]])
          
  
          ->orWhere([['users.place','=', $place],['users.id','<>', $userID],['tbl_donor.status','=','1'],['tbl_donor.bloodgrp','=',$altblood]])
          
          ->get(['tbl_donor.bloodgrp', 'users.place','users.phone']);
          $userID=auth()->user()->id;
          $find=  DonorReg::where('uid','=',$userID)->first();
          //dd($find);
          if($find===null){
            $status = 0;
            //alert("fyfy");
            return view('/donorlist',['a'=>$status,'donor'=>$donor]);
            die();
        }else{
          $status = 1;
         // alert("fyfy");
          return view('/donorlist',['a'=>$status,'donor'=>$donor]);
          die();
        }
          
         // return view('/donorlist',['donor'=>$donor]);
        }
        public static function check_reg_donor(Request $request){
          //$userID=auth()->user()->id;
          $userID=auth()->user()->id;
          $find=  DonorReg::where('uid','=',$userID)->first();
          //dd($find);
          if($find===null){
            $status = 0;
            //alert("fyfy");
            return view('/search_d',['a'=>$status]);
            die();
        }else{
          $status = 1;
         // alert("fyfy");
          return view('/search_d',['a'=>$status]);
          die();
        }
      }
        public static function donor2(Request $request){
          //$userID=auth()->user()->id;
          $userID=auth()->user()->id;
          $find=  DonorReg::where('uid','=',$userID)->first();
          //dd($find);
          if($find===null){
            $status = 0;
            //alert("fyfy");
            return view('/donor_profile',['a'=>$status]);
            die();
        }else{
          $sql=  DonorReg::where('uid','=',$userID)->get();
          $status = 1;
         // alert("fyfy");
          return view('/donor_profile',['a'=>$status,'alldata'=>$sql]);
          die();
        }
          
        }
        public static function donor3(Request $request){
          //$userID=auth()->user()->id;
          $userID=auth()->user()->id;
          $find=  DonorReg::where('uid','=',$userID)->first();
          //dd($find);
          if($find===null){
            $status = 0;
            //alert("fyfy");
            return view('/edit_donor',['a'=>$status]);
            die();
        }else{
          //$sql=  DonorReg::where('uid','=',$userID)->get();
          $status = 1;
         // alert("fyfy");
          return view('/edit_donor',['a'=>$status]);
          die();
        }
          
        }
        public static function donor4(Request $request){
          //$userID=auth()->user()->id;
          $userID=auth()->user()->id;
          if($request->input('med')=="Yes" || $request->input('dc')=="No")
          {
            
           
          $update= DonorReg::where('uid','=',$userID)->first();
          $update->weight=$request->input('weight');
          $update->medlyf=$request->input('med');
          $update->donor=$request->input('dc');
          $update->status=0;
          $update->save();
          }else{
 
            $update= DonorReg::where('uid','=',$userID)->first();
            $update->weight=$request->input('weight');
            $update->medlyf=$request->input('med');
            $update->donor=$request->input('dc');
            $update->status=1;
            $update->save();

          }

 return redirect()->back()->with('message','Successfully Updated');
          
        }

        public static function check_reg_donor1(Request $request){
          $userID=auth()->user()->id;
          $find=  DonorReg::where('uid','=',$userID)->first();
          //dd($find);
          if($find===null){
            $status = 0;
            //alert("fyfy"); 
            return view('/donor_reg',['a'=>$status]);
            die();
        }else{
          $status = 1;
         // alert("fyfy");
          return view('/donor_reg',['a'=>$status]);
          die();
        }
          
        }
        public static function check_reg_donor2(Request $request){
          $userID=auth()->user()->id;
          //$alldata=User::all();
          $find=  DonorReg::where('uid','=',$userID)->first();
          //dd($find);
          if($find===null){
            $status = 0;
            //alert("fyfy"); 
            return view('/view_donor',['allarray'=>$find,'a'=>$status]);
            die();
        }else{
          $status = 1;
         // alert("fyfy");
          return view('/view_donor',['allarray'=>$find,'a'=>$status]);
          die();
        }
          
        }
        
        
        
}