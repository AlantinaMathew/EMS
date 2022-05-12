<!DOCTYPE html>
<link rel="stylesheet" href="/style/style3.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 14px;
        margin-top: 1em;
        border: 1px solid #5995fd;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #5995fd;
        color: white;
        margin-top: 2em;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #5995fd;

    }

    .c {

        border-radius: 5px;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        align-items: center;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .out {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 8em;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }


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
        padding: 0;
        font-size: 25px;
        font-weight: bold;
    }

    .header a:hover {
        background-color: #000;
        color: white;
    }

    .header a.active {
        background-color: #5995fd;
    }

    .header-right {
        float: right;
        padding-right: 2em;
    }

    a {
        text-decoration: none;
        color: black;
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
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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


    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 14px;
        margin-top: 1em;
        border: 1px solid #5995fd;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #5995fd;
        color: white;
        margin-top: 2em;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #5995fd;

    }

    .c {

        border-radius: 5px;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        align-items: center;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .out {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 8em;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    </style>
  </head>
<body>
<div class="header">
        <a href="#default" class="logo"><span class="logo_name">

                <img src="/images/lg.png" width="260" height="90"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />

            </span></a>
        @if (Route::has('login'))
        <div class="header-right">

            @auth
            <a href="/">Home</a>
            <a href="/about">About Us</a>
            <a href="/search_f">Find FuelBuddy</a>
            <a href="/req_fuel">Request FuelBuddy</a>
            <div class="dropdown">
                <button class="dropbtn">{{ Auth::user()->name }}</button>
                <div class="dropdown-content">
                    <!-- <a href="#">Profile</a> -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"> {{ __('Log Out') }}</a>
                    </form>

                </div>
            </div>
            @endauth
        </div>
        @endif
    </div>

    <div class="out"style="margin-left:6em;">



    <div class="container mt-1 col-9 mx-auto pt-7">

       
        <form method="post" action="/payment">
          @csrf
          <div class="c" style="background:white;justify-content:center;">
            @if(count($a)>0)
            @foreach($a as $tr)
        
            
                <div class="row">
                    <div class="col-25">
                        <label for="City">Name</label>
                    </div>
                    <div class="col-75">{{$tr->name}} </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="City">Phone</label>
                    </div>
                    <div class="col-75">{{$tr->phone}} </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="City">Fuel</label>
                    </div>
                    <div class="col-75">{{$tr->fuel}} </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="City">Price (Per L)</label>
                    </div>
                    <div class="col-75">{{$tr->price}} </div>
                </div>
                
            @endforeach
            @endif
            <div class="row">
                    <div class="col-25">
                        <label for="City">Amount to be pay</label>
                    </div>
                    <div class="col-75"><input type="text"name="amount"style="width:90%"></div>
                </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button><br><br>
          </form>


    
    @if(Session::has('data'))
 
    <div class="container tex-center">
    <form action="/pay" method="POST" class="text-center mx-auto mt-5">
        @csrf
      <script
          src="https://checkout.razorpay.com/v1/checkout.js"
          data-key="rzp_test_6XNw6qGWoVVmvg"
        
    data-amount="{{Session::get('data.amount')}}"
          data-currency="INR"
    data-order_id="{{Session::get('data.order_id')}}"
          data-buttontext="Pay with Razorpay"
          data-name="Fuel"
          data-description="pay amount"
         
          data-theme.color="#528FF0"
      ></script>
      <input type="hidden" custom="Hidden Element" name="hidden">
      </form>

    </div>
    
    @endif
    </div>
        




    </div>

</body>
</html>