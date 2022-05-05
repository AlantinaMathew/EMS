<?php
include '../config.php';
session_start();
$uid = $_SESSION['UID'];
//$sql = mysqli_query($con, "SELECT * FROM `tbl_user_details` WHERE `user_id`='$uid'");
// while ($r = mysqli_fetch_array($sql)) {
//     $first = $r['firstname'];
//     $last = $r['lastname'];
// }
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>EMERGENO
    </title>
    <link rel="stylesheet" href="../css/style3.css">
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

<img src="../img/lg.png" width="260" height="90" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />

</span></a>
  <div class="header-right">
    <a href="home.php">Home</a>
    <a href="view_pro.php">Profile</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
    <!-- <div class="sidebar close">
        <div class="logo-details">

            

        </div>
        <ul class="nav-links">
            <li>
                <a href="home.php" style="background:#1d1b31;">
                    <i class='bx bx-grid-alt bx-tada'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="home.php">Dashboard</a></li>
                </ul>
            </li>
            <hr>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-donate-blood bx-tada'></i>

                        <span class="link_name">Find Blood Donor</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Find Blood Donor</a></li>
                    <li><a href="donor_req.php">Request</a></li>
                    <li><a href="search_d.php">Request</a></li>
                    <li><a href="donor_service.php">Request History</a></li>

                </ul>
            </li>
            <hr>

            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxs-ambulance bx-tada'></i>

                        <span class="link_name">Call Ambulance</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Call Ambulance</a></li>
                    <li><a href="ambu_req.php">Request</a></li>
                    <li><a href="ambu_ser.php">Request History</a></li>

                </ul>
            </li>
            <hr>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-gas-pump bx-tada'></i>

                        <span class="link_name">Call FuelBuddy</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Call FuelBuddy</a></li>
                    <li><a href="fuel_req.php">Request</a></li>
                    <li><a href="fuel_ser.php">Request History</a></li>

                </ul>
            </li>
            <hr>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxs-car-mechanic bx-tada'></i>

                        <span class="link_name">Call Ready Repair</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Call Ready Repair</a></li>
                    <li><a href="repair_req.php">Request</a></li>
                    <li><a href="repair_ser.php">Request History</a></li>

                </ul>
            </li>
            <hr>
            <li>

                <a href="view_pro.php">
                    <i class='bx bx-user bx-tada'></i>
                    <span class="link_name ">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="view_pro.php">Profile</a></li>
                </ul>


            </li>
            <hr>
            <li>
                <a href="#">
                    <i class='bx bx-history'></i>
                    <span class="link_name">History</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">History</a></li>
                </ul>
            </li> 
            <hr>
            <li>
                <a href="change_pass.php">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="change_pass.php">Setting</a></li>
                </ul>
            </li>
            <hr>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="logout.php">Log Out</a></li>
                </ul>

            </li>

        </ul>
    </div>-->
    
        <!-- <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                WELCOME <?PHP echo $first;
                        echo " ";
                        echo $last; ?>

                <div class="logout" style="float:right">

                    <i class='bx bxs-user-circle' style='font-size:58px;color:black;'></i>
                </div>
            </div>
        </nav> -->
        
        <div class="outer">
       

            <!-- <div class="row6">


                <div class="column6">
                    <div class="card6">
                        <h1>Profile</h1>


                    </div>
                </div> -->

                <div class="column6">
                
                <a href="search_d.php"><div class="card6">
                        
                        <img src="../img/blood.jpg" width="100%"height="240px">
                         <h1>Find Donor</h1>

                    </div></a>
                </div>

                <div class="column6">
                <a href="search_ambu.php">   <div class="card6">
                    <img src="../img/ambu.jpg" width="100%"height="240px">
                    <h1>Call Ambulance</h1>

                    </div></a>
                </div>
                <div class="column6">
                <a href="search_fuel.php"> <div class="card6">
                    <img src="../img/fuel.jpg" width="100%"height="240px">
                      <h1>Call Fuel Buddies</h1>

                    </div></a>
                </div>

                <div class="column6">
                <a href="search_repair.php"> <div class="card6">
                    <img src="../img/rep.webp" width="100%"height="240px">
                     <h1>Call ReadyRepair</h1>

                    </div></a>
                </div>

                <!-- <div class="column6">
                    <div class="card6">
                        <h1>Request</h1>

                    </div>
                </div> -->
            </div>
        </div> 
    
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