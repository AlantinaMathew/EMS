
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>EMERGENO
    </title>
    <link rel="stylesheet" href="style/style3.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
          
        }
       

.header {
  overflow: hidden;
  background-color: #5995fd;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: white;
  text-align: center;
  
  padding: 12px;
  text-decoration: none;
  font-size: 25px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
    padding:0;
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #000;
  color: white;
}

.header a.active {
  background-color:#5995fd;
}

.header-right {
  float: right;
  padding-right: 2em;
}

a{
    text-decoration: none;
    color:black;
}

        /* Float four columns side by side */
        .column6 {
            float: left;
            width: 25%;
            
            padding: 100px 20px;
        }
        .column6:hover {
            float: left;
            width: 25%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            padding: 100px 20px;
        }

        /* Remove extra left and right margins, due to padding */
        .row6 {
            margin: 0 -5px;
            
        }

        /* Clear floats after the columns */
        .row6:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column6 {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
        @media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

.dropdown {
  position: relative;
  display: inline-block;

}
.dropbtn {
  background-color: #04AA6D;
  color: white;
  border-radius: 50%;
  padding: 12px;
  font-size: 14px;
  border: none;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 2px 6px;
  text-decoration: none;
  display: block;
  text-align: left;
  font-size: small;
}

.dropdown-content a :hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

        /* Style the counter cards */
        .card6 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }
 
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
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
<div class="header">
  <a href="#default" class="logo"><span class="logo_name">

<img src="images/lg.png" width="260" height="90" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />

</span></a>

  <div class="header-right">
      <h1>Go Mechanic</h1>
  </div>
</div>


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

