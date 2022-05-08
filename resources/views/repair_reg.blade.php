@extends('layout')


@section('content')
<head>
    <style>
         .tooltip {
    display: none;
    position: relative;
   
   
   
    
    
    width: 300px;
    color:green;
    text-align: left;
}
.zxc:hover .tooltip {
  
   display: block;
}

    </style>
</head>
<x-guest-layout style="margin-top:-10p;">
    <x-auth-card>
    <x-slot name="logo">
            <!--a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </!a-->
        </x-slot>
          

        <x-auth-session-status class="mb-4" :status="session('message')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST" action="/reg_rep" style="margin-top:0;"onSubmit="return myfunction7()">
            @csrf

            <!-- Name -->
              
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <span id="a1"></span>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <span id="a2"></span>
            </div>
             <!-- PHONE -->
             <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                <span id="a3"></span>
            </div>
            
            <div class="mt-4">
            <div class="zxc"> <span class="tooltip">Press Cntrl to select multiple option </span>
                <x-label for="place" :value="__('Place')" />
                
               
                <select id="place" class="block mt-1 w-full"  name="place[]" :value="old('place')"multiple required >
                
                    <option value="kanjirappaly">kanjirappaly</option>
                    <option value="koovappaly">koovappaly</option>
                    <option value="erumely">erumely</option>
                    <option value="mundakayam">mundakayam</option>
                </select></div>
            </div>
            <div class="mt-4">
            <div class="zxc"> <span class="tooltip">Press Cntrl to select multiple option </span>
                <x-label for="place" :value="__('Service')" />
                
               
                <select id="service" class="block mt-1 w-full"  name="service[]" :value="old('service')"multiple required >
                
                    <option value="Two Wheeler">Two Wheeler</option>
                    <option value="Three Wheeler">Three Wheeler</option>
                    <option value="Four Wheeler">Four Wheeler</option>
                    
                </select></div>
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                                <span id="a5"></span>
                            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                                <span id="a6"></span>
                            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/log_repair">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
<script>
function myfunction7() {
let span = document.getElementsByTagName('span');

let em=document.getElementById('email').value;
let mob=document.getElementById('phone').value;

let pass=document.getElementById('password').value;
let cpass=document.getElementById('password_confirmation').value;
var regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,3}$/;
var mobreg = /^[0-9]{10}$/;
var lic_regex =/^[0-3][0-9]{7}$/;
var vehicle_regex = /^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$/;
var status;
var name_regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,20}$/;
if (name_regex.test(name)) {
            span["a1"].innerText = "";
            // alert("k");
            status = true;
        } else {
           // alert("k1");
            span["a1"].innerText = "Only Letters Allowed";
            span["a1"].style.color = 'red';
            status = false;
        }
if (regex.test(em)) {
    span["a2"].innerText = "";
    //alert("k");
    status= true;
} else {
    //alert("k1");
    span["a2"].innerText = "Enter a valid Email";
    span["a2"].style.color = 'red';
    status=false;
   }
if (mobreg.test(mob)) {
    span["a3"].innerText = "";
    //alert("k");
    status= true;
} else {
    //alert("k1");
    span["a3"].innerText = "Only 10 Digit Numbers Allowed";
    span["a3"].style.color = 'red';
    status=false;
   }

   
// if (lic_regex.test(lic)) {
//     span["a4"].innerText = "";
//    // alert("h99h");
//    status=true;
   
// } else {
//     span["a4"].innerText = "Only 8 Digit Numbers Allowed";
//     span["a4"].style.color = 'red';
//     status= false;
//    }

//    if (vehicle_regex.test(vhcl)) {
//     span["a3"].innerText = "";
//     status= true;
// } else {
//     span["a3"].innerText = "Enter a valid Number Eg:DL 01 C AA 1111";
//     span["a3"].style.color = 'red';
//     status=false;
//    }
   if(pass.length>=8 && pass.length<=12){
    span["a5"].innerText = "";
    status=true;
    
} else {
    span["a5"].innerText = "Password must be atleast 8 and atmost 12 characters long ";
    span["a5"].style.color = 'red';
    status= false;
   }
   if(pass==cpass){
    span["a6"].innerText = "";
    status=true;
    
} else {
    span["a6"].innerText = "Password & Confirm Password must be Same ";
    span["a6"].style.color = 'red';
    status= false;
   }
   if(status==true){
       return true;
   }else{
       return false;
   }
}
</script>
@endsection
