<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Req_fuel;
use App\Models\User;
use App\Models\Fuel;
use App\Models\Payment;
use Monolog\SignalHandler;
use Razorpay\Api\Api;

use Carbon\Carbon;
use Razorpay\Api\Errors\SignatureVerificationError;
use Session;


class RazorpayPaymentController extends Controller
{
 
  public function index($id){
    $userID=auth()->user()->id;
    $sql=Req_fuel::join('tbl_fuel','tbl_fuel.id','=','tbl_req_fuel.fid')
    ->where('tbl_req_fuel.id','=',$id)
    ->where('tbl_req_fuel.status','=',3)
    ->get(['tbl_fuel.name','tbl_req_fuel.fuel','tbl_req_fuel.price','tbl_req_fuel.fid','tbl_req_fuel.uid','tbl_fuel.phone']);
    
    foreach($sql as $a){
        $uid=$a->uid;
        $fid=$a->fid;
        
    }
    session(['pay_req_id' => $id]);
    session(['pay_req_uid' => $uid]);
    session(['pay_req_fid' => $fid]);

    

        return view('pay',['a'=>$sql]);
    }

    public function success(){
        return view('pay_success');
    }

    //rzp_test_hL4Etd0bXHkmO1
    //Gluvl9s5qfTBfbL1Ar8tCsnG


    public function payment(Request $request){

        $rid=session('pay_req_id');
        $fid=session('pay_req_fid');
        $uid=session('pay_req_uid');
        $amount = $amount = $request->input('amount')*100;
        $am=$request->input('amount');

        $api = new Api('rzp_test_6XNw6qGWoVVmvg', 'CvActqegQswirqEve93xv7NR');
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $amount , 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 

        $user_pay = new Payment();
    
        $user_pay->req_id = $rid;
        $user_pay->uid = $uid;
        $user_pay->fid = $fid;
        $user_pay->amount = $am;
        $user_pay->payment_id = $orderId;
        $user_pay->save();

        $data = array(
            'order_id' => $orderId,
            'amount' => $amount
        );

        //  Session(['order_id'=> $orderId]);
         Session(['amt'=>$amount]);

       
        return redirect()->route('hom',$rid)->with('data', $data);




    }


    public function pay(Request $request){
        $data = $request->all();
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done = true;
        $user->razorpay_id = $data['razorpay_payment_id'];

        $api = new Api('rzp_test_6XNw6qGWoVVmvg', 'CvActqegQswirqEve93xv7NR');
        

        try{
        $attributes = array(
             'razorpay_signature' => $data['razorpay_signature'],
             'razorpay_payment_id' => $data['razorpay_payment_id'],
             'razorpay_order_id' => $data['razorpay_order_id']
        );
        $order = $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    }catch(SignatureVerificationError $e){

        $succes = false;
    }

        
    if($success){
        $user->save();
        return redirect('success');
    }else{

        return redirect()->route('pay_error');
    }

      

       

    }


    public function error(){
        return view('pay_error');
    }

}
