
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
@if (Route::has('login'))
  <div class="header-right">

  @auth
  <a href="/">Home</a>
  <a href="/about">About Us</a>

  <!-- <a href="{{ route('logout') }}"style="background-color: rgb(240, 240, 240);
  border: none;
  color: black;
  padding: 20px;
  text-align: center;
  display: inline-block;
  font-size: 16px;
  margin: 0.5px 2px;
  text-decoration: none;
  text-transform: uppercase;
  border-radius: 50%;"class="dropbtn">{{ Auth::user()->name }}
  
  </a>
  <div class="dropdown-content">
    <a href="#">Profile</a>
    <a href="#">Logout</a>
    
  </div>
  </div> -->
  <!--a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</!--a-->
  <div class="dropdown">
  <button class="dropbtn">{{ Auth::user()->name }}</button>
  <div class="dropdown-content">
    <!-- <a href="#">Profile</a> -->
    <form method="POST" action="{{ route('logout') }}">
                            @csrf
    <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"> {{ __('Log Out') }}</a></form>
    
  </div>
</div>
  @else
    <a href="/">Home</a>
    <a href="/about">About Us</a> 
    <!--a href="contact.php">Contact Us</a>--->
   
    <a href="{{ route('login') }}"style="background-color: red;
  box-shadow: 0 5px 0 darkred;
  color: white;
  margin:5px;
  /* padding: 1em 1.5em; */
  position: relative;
  text-decoration: none;
  text-transform: uppercase;">Login</a>
  @if (Route::has('register'))
  <a href="{{ route('register') }}"style="background-color: black;
  box-shadow: 0 5px 0 darkred;
  color: white;
  margin:5px;
  /* padding: 1em 1.5em; */
  position: relative;
  text-decoration: none;
  text-transform: uppercase;">Register</a>
   @endif
                    @endauth
  </div>
  @endif
</div>
@include('sweetalert::alert')
  @yield('content');
   
  <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");

        });
    </script>
 

</body>

</html>